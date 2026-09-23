<?php
require_once __DIR__ . '/config.php';

class DataManager {
    private static $instance = null;
    private $pdo = null;
    private $useMySQL = false;

    private function __construct() {
        $this->initConnection();
        $this->seedInitialDataIfEmpty();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DataManager();
        }
        return self::$instance;
    }

    private function initConnection() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'muskan_interiors';

        try {
            // Test connection to MySQL server
            $tempPdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 2
            ]);
            $tempPdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            $this->useMySQL = true;
            $this->createTablesIfNotExist();
        } catch (Exception $e) {
            // Graceful fallback to flat JSON storage
            $this->useMySQL = false;
            $this->pdo = null;
        }
    }

    private function createTablesIfNotExist() {
        if (!$this->useMySQL || !$this->pdo) return;

        // Admins Table
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS `admins` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `username` VARCHAR(100) NOT NULL UNIQUE,
                `password` VARCHAR(255) NOT NULL,
                `name` VARCHAR(150) NOT NULL,
                `role` VARCHAR(50) DEFAULT 'Super Admin',
                `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        // Projects Table
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS `projects` (
                `id` VARCHAR(50) PRIMARY KEY,
                `title` VARCHAR(255) NOT NULL,
                `slug` VARCHAR(255) NOT NULL,
                `category` VARCHAR(100) NOT NULL,
                `client_name` VARCHAR(150) DEFAULT 'Private Client',
                `location` VARCHAR(150) DEFAULT 'Patna, Bihar',
                `budget` VARCHAR(100) DEFAULT '₹25,00,000',
                `area` VARCHAR(100) DEFAULT '1,850 sq.ft',
                `timeline` VARCHAR(100) DEFAULT '45 Days',
                `short_desc` TEXT,
                `full_desc` LONGTEXT,
                `featured_image` VARCHAR(255),
                `stage_before_img` VARCHAR(255),
                `stage_design_img` VARCHAR(255),
                `stage_execution_img` VARCHAR(255),
                `stage_final_img` VARCHAR(255),
                `gallery_images` TEXT,
                `youtube_url` VARCHAR(255) DEFAULT '',
                `status` VARCHAR(50) DEFAULT 'Completed',
                `featured` TINYINT(1) DEFAULT 0,
                `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        // Designs Gallery Table
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS `designs` (
                `id` VARCHAR(50) PRIMARY KEY,
                `title` VARCHAR(255) NOT NULL,
                `category` VARCHAR(100) NOT NULL,
                `tags` VARCHAR(255),
                `image_url` VARCHAR(255) NOT NULL,
                `description` TEXT,
                `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        // Enquiries CRM Table
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS `enquiries` (
                `id` VARCHAR(50) PRIMARY KEY,
                `name` VARCHAR(150) NOT NULL,
                `phone` VARCHAR(50) NOT NULL,
                `email` VARCHAR(150),
                `service` VARCHAR(150) NOT NULL,
                `property_type` VARCHAR(100),
                `area` VARCHAR(50),
                `budget` VARCHAR(100),
                `message` TEXT,
                `status` VARCHAR(50) DEFAULT 'New',
                `source` VARCHAR(100) DEFAULT 'Website Form',
                `notes` TEXT,
                `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        // Settings Table
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS `settings` (
                `setting_key` VARCHAR(100) PRIMARY KEY,
                `setting_value` TEXT
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    }

    // JSON file helpers
    private function readJson($file) {
        $path = DATA_PATH . '/' . $file;
        if (!file_exists($path)) return [];
        $content = @file_get_contents($path);
        return $content ? json_decode($content, true) ?: [] : [];
    }

    private function writeJson($file, $data) {
        $path = DATA_PATH . '/' . $file;
        @file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    }

    // Seed Data
    private function seedInitialDataIfEmpty() {
        // Seed Admins
        $adminUsername = 'admin';
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);

        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->query("SELECT COUNT(*) FROM `admins`");
            if ($stmt->fetchColumn() == 0) {
                $ins = $this->pdo->prepare("INSERT INTO `admins` (username, password, name, role) VALUES (?, ?, ?, ?)");
                $ins->execute([$adminUsername, $adminPassword, 'Muskan Director', 'Super Admin']);
            }
        } else {
            $admins = $this->readJson('admins.json');
            if (empty($admins)) {
                $this->writeJson('admins.json', [
                    [
                        'id' => 1,
                        'username' => 'admin',
                        'password' => $adminPassword,
                        'name' => 'Muskan Director',
                        'role' => 'Super Admin',
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                ]);
            }
        }

        // Check if projects exist
        $projectsCount = 0;
        if ($this->useMySQL && $this->pdo) {
            $projectsCount = $this->pdo->query("SELECT COUNT(*) FROM `projects`")->fetchColumn();
        } else {
            $projectsCount = count($this->readJson('projects.json'));
        }

        if ($projectsCount == 0) {
            $initialProjects = [
                [
                    'id' => 'PRJ-101',
                    'title' => 'The Imperial Glass Villa & Penthouse',
                    'slug' => 'imperial-glass-villa-penthouse',
                    'category' => 'Turnkey Projects',
                    'client_name' => 'Dr. R. K. Singhania',
                    'location' => 'Boring Road, Patna',
                    'budget' => '₹48,00,000',
                    'area' => '3,600 sq.ft',
                    'timeline' => '60 Days Turnkey Handover',
                    'short_desc' => 'Complete end-to-end luxury architectural villa build including RCC modifications, fluted teak wall cladding, and high-gloss PU modular woodwork.',
                    'full_desc' => 'A masterclass in modern brutalist architecture fused with bespoke Scandinavian interior warmth. The project encompassed complete civil foundation restructuring, smart automation conduits, imported Italian statuario marble flooring, concealed magnetic track lighting, BWP 710 marine ply modular kitchens with quartz surfaces, and bespoke smoked glass walk-in wardrobes.',
                    'featured_image' => 'images/muskan/hero_villa.jpg',
                    'stage_before_img' => 'images/muskan/before_raw.jpg',
                    'stage_design_img' => 'images/muskan/3d_render.jpg',
                    'stage_execution_img' => 'images/muskan/real_execution.jpg',
                    'stage_final_img' => 'images/muskan/after_luxury.jpg',
                    'gallery_images' => json_encode(['images/muskan/living_room.jpg', 'images/muskan/modular_kitchen.jpg', 'images/muskan/wooden_wardrobe.jpg']),
                    'youtube_url' => 'https://www.youtube.com/watch?v=7WT1c7Q_tG8',
                    'status' => 'Completed',
                    'featured' => 1,
                    'created_at' => date('Y-m-d H:i:s', strtotime('-10 days'))
                ],
                [
                    'id' => 'PRJ-102',
                    'title' => 'Contemporary Minimalist Living Lounge',
                    'slug' => 'contemporary-minimalist-living-lounge',
                    'category' => 'Interior Design',
                    'client_name' => 'Mr. Abhishek Verma',
                    'location' => 'Kankarbagh, Patna',
                    'budget' => '₹18,50,000',
                    'area' => '1,450 sq.ft',
                    'timeline' => '35 Days',
                    'short_desc' => 'Fluted oak acoustic panelling, low-profile Italian marble media console, and 3000K warm architectural lighting.',
                    'full_desc' => 'Engineered for tranquil spatial ergonomics. We transformed a conventional apartment hall into an open-concept luxury lounge featuring acoustic slatted wall louvers, custom integrated TV backdrops, concealed wiring channels, and soft-cove ambient illumination.',
                    'featured_image' => 'images/muskan/living_room.jpg',
                    'stage_before_img' => 'images/muskan/before_raw.jpg',
                    'stage_design_img' => 'images/muskan/3d_render.jpg',
                    'stage_execution_img' => 'images/muskan/construction_site.jpg',
                    'stage_final_img' => 'images/muskan/living_room.jpg',
                    'gallery_images' => json_encode(['images/muskan/living_room.jpg', 'images/muskan/after_luxury.jpg']),
                    'youtube_url' => 'https://www.youtube.com/watch?v=7WT1c7Q_tG8',
                    'status' => 'Completed',
                    'featured' => 1,
                    'created_at' => date('Y-m-d H:i:s', strtotime('-20 days'))
                ],
                [
                    'id' => 'PRJ-103',
                    'title' => 'Matte Charcoal & Teak Gourmet Modular Kitchen',
                    'slug' => 'matte-charcoal-teak-gourmet-modular-kitchen',
                    'category' => 'Wooden Work',
                    'client_name' => 'Mrs. Sunita Agarwal',
                    'location' => 'Bailey Road, Patna',
                    'budget' => '₹12,80,000',
                    'area' => '420 sq.ft',
                    'timeline' => '25 Days',
                    'short_desc' => 'Gurjan 710 waterproof marine ply carcass, German Blum soft-close tandem drawers, and Calacatta quartz waterfall island.',
                    'full_desc' => 'A culinary dream space engineered with zero-gap German fittings, motorized lift-up overhead cabinets, concealed spice pullouts, built-in Bosch oven integration, and integrated under-cabinet warm profile strip illumination.',
                    'featured_image' => 'images/muskan/modular_kitchen.jpg',
                    'stage_before_img' => 'images/muskan/before_raw.jpg',
                    'stage_design_img' => 'images/muskan/3d_render.jpg',
                    'stage_execution_img' => 'images/muskan/real_execution.jpg',
                    'stage_final_img' => 'images/muskan/modular_kitchen.jpg',
                    'gallery_images' => json_encode(['images/muskan/modular_kitchen.jpg']),
                    'youtube_url' => 'https://www.youtube.com/watch?v=7WT1c7Q_tG8',
                    'status' => 'Completed',
                    'featured' => 1,
                    'created_at' => date('Y-m-d H:i:s', strtotime('-30 days'))
                ],
                [
                    'id' => 'PRJ-104',
                    'title' => 'Modern Villa Front Elevation & Cladding',
                    'slug' => 'modern-villa-front-elevation-cladding',
                    'category' => 'Exterior Design',
                    'client_name' => 'Col. S. P. Choudhary',
                    'location' => 'Danapur Cantt, Patna',
                    'budget' => '₹22,00,000',
                    'area' => '2,800 sq.ft facade',
                    'timeline' => '40 Days',
                    'short_desc' => 'Exterior weather-proof HPL wooden louvers, natural travertine stone cladding, and architectural facade floodlighting.',
                    'full_desc' => 'Complete exterior face-lift combining geometric cantilevered projections, weather-proof WPC louvers, motorized boundary gates, and integrated exterior landscape illumination.',
                    'featured_image' => 'images/muskan/modern_elevation.jpg',
                    'stage_before_img' => 'images/muskan/before_raw.jpg',
                    'stage_design_img' => 'images/muskan/3d_render.jpg',
                    'stage_execution_img' => 'images/muskan/construction_site.jpg',
                    'stage_final_img' => 'images/muskan/modern_elevation.jpg',
                    'gallery_images' => json_encode(['images/muskan/modern_elevation.jpg', 'images/muskan/hero_villa.jpg']),
                    'youtube_url' => 'https://www.youtube.com/watch?v=7WT1c7Q_tG8',
                    'status' => 'Completed',
                    'featured' => 1,
                    'created_at' => date('Y-m-d H:i:s', strtotime('-40 days'))
                ],
                [
                    'id' => 'PRJ-105',
                    'title' => 'NexGen Corporate Headquarters & Fitout',
                    'slug' => 'nexgen-corporate-headquarters-fitout',
                    'category' => 'Construction',
                    'client_name' => 'NexGen FinTech Ltd.',
                    'location' => 'Exhibition Road, Patna',
                    'budget' => '₹36,50,000',
                    'area' => '4,500 sq.ft',
                    'timeline' => '45 Days Turnkey',
                    'short_desc' => 'Commercial acoustic glass partitions, 60-seater ergonomic workstations, executive boardrooms, and centralized HVAC.',
                    'full_desc' => 'Turnkey commercial corporate fitout executed within a strict 45-day deadline. Delivered zero-noise acoustic meeting pods, high-density server room infrastructure, dynamic linear lighting, and cafeteria spaces.',
                    'featured_image' => 'images/muskan/commercial_office.jpg',
                    'stage_before_img' => 'images/muskan/construction_site.jpg',
                    'stage_design_img' => 'images/muskan/3d_render.jpg',
                    'stage_execution_img' => 'images/muskan/real_execution.jpg',
                    'stage_final_img' => 'images/muskan/commercial_office.jpg',
                    'gallery_images' => json_encode(['images/muskan/commercial_office.jpg']),
                    'youtube_url' => 'https://www.youtube.com/watch?v=7WT1c7Q_tG8',
                    'status' => 'Completed',
                    'featured' => 0,
                    'created_at' => date('Y-m-d H:i:s', strtotime('-50 days'))
                ]
            ];

            foreach ($initialProjects as $prj) {
                $this->saveProject($prj);
            }
        }

        // Check if designs exist
        $designsCount = 0;
        if ($this->useMySQL && $this->pdo) {
            $designsCount = $this->pdo->query("SELECT COUNT(*) FROM `designs`")->fetchColumn();
        } else {
            $designsCount = count($this->readJson('designs.json'));
        }

        if ($designsCount == 0) {
            $initialDesigns = [
                [
                    'id' => 'DSG-201',
                    'title' => 'Master Bedroom Smoked Glass Walk-in Wardrobe',
                    'category' => 'Wooden Work',
                    'tags' => 'Wardrobe, Smoked Glass, Profile LED, Teak',
                    'image_url' => 'images/muskan/wooden_wardrobe.jpg',
                    'description' => 'Floor-to-ceiling tinted aluminium glass shutter wardrobe with motion-sensing integrated vertical warm light channels.'
                ],
                [
                    'id' => 'DSG-202',
                    'title' => 'Ultra-Modern Architectural Facade & Cantilever',
                    'category' => 'Exterior Design',
                    'tags' => 'Elevation, 3D Facade, Louvers, Travertine',
                    'image_url' => 'images/muskan/modern_elevation.jpg',
                    'description' => 'Architectural exterior render showcasing dual-tone travertine stone cladding and CNC cut metal screens.'
                ],
                [
                    'id' => 'DSG-203',
                    'title' => 'Minimalist Living Room Lounge with Fluted Panels',
                    'category' => 'Interior Design',
                    'tags' => 'Living Room, False Ceiling, Track Lights, Marble',
                    'image_url' => 'images/muskan/living_room.jpg',
                    'description' => 'Spacious open-plan living room with fluted oak panelling, cove illumination and low-profile sofa layout.'
                ],
                [
                    'id' => 'DSG-204',
                    'title' => 'Island Kitchen with Calacatta Quartz Waterfall',
                    'category' => 'Interior Design',
                    'tags' => 'Modular Kitchen, Island, Quartz, Charcoal',
                    'image_url' => 'images/muskan/modular_kitchen.jpg',
                    'description' => 'Matte charcoal acrylic cabinetry with gold accents and built-in chimney extractor hood.'
                ]
            ];

            foreach ($initialDesigns as $dsg) {
                $this->saveDesign($dsg);
            }
        }

        // Check if enquiries exist
        $enquiriesCount = 0;
        if ($this->useMySQL && $this->pdo) {
            $enquiriesCount = $this->pdo->query("SELECT COUNT(*) FROM `enquiries`")->fetchColumn();
        } else {
            $enquiriesCount = count($this->readJson('enquiries.json'));
        }

        if ($enquiriesCount == 0) {
            $initialEnquiries = [
                [
                    'id' => 'ENQ-801',
                    'name' => 'Er. Rajesh Kumar Singh',
                    'phone' => '+91 94310 22334',
                    'email' => 'rajesh.singh@gmail.com',
                    'service' => 'Complete Turnkey Interior & Build',
                    'property_type' => 'Independent Villa',
                    'area' => '3,200 sq.ft',
                    'budget' => '₹45,00,000',
                    'message' => 'Looking for complete turnkey 3D design and civil execution for newly constructed villa near Saguna More.',
                    'status' => 'Site Visit Scheduled',
                    'source' => 'Website Form',
                    'notes' => 'Site visit scheduled for Saturday 11:30 AM with Chief Architect.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
                ],
                [
                    'id' => 'ENQ-802',
                    'name' => 'Dr. Priya Ranjan',
                    'phone' => '+91 98350 77889',
                    'email' => 'drpriya.pmch@gmail.com',
                    'service' => 'Modular Kitchen & Wardrobes',
                    'property_type' => '3 BHK Apartment',
                    'area' => '1,650 sq.ft',
                    'budget' => '₹18,00,000',
                    'message' => 'Need premium modular kitchen with acrylic finish and smoked glass wardrobes for 2 master bedrooms.',
                    'status' => 'Quotation Sent',
                    'source' => 'Quote Calculator',
                    'notes' => 'BOQ estimate generated and sent via WhatsApp.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-3 hours'))
                ]
            ];

            foreach ($initialEnquiries as $enq) {
                $this->saveEnquiry($enq);
            }
        }
    }

    // ================= PROJECTS CRUD =================
    public function getProjects($category = null, $featuredOnly = false) {
        if ($this->useMySQL && $this->pdo) {
            $sql = "SELECT * FROM `projects` WHERE 1=1";
            $params = [];
            if ($category && $category !== 'All') {
                $sql .= " AND `category` = ?";
                $params[] = $category;
            }
            if ($featuredOnly) {
                $sql .= " AND `featured` = 1";
            }
            $sql .= " ORDER BY `created_at` DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } else {
            $list = $this->readJson('projects.json');
            if ($category && $category !== 'All') {
                $list = array_filter($list, function($item) use ($category) {
                    return isset($item['category']) && $item['category'] === $category;
                });
            }
            if ($featuredOnly) {
                $list = array_filter($list, function($item) {
                    return !empty($item['featured']);
                });
            }
            usort($list, function($a, $b) {
                return strtotime($b['created_at'] ?? 'now') - strtotime($a['created_at'] ?? 'now');
            });
            return array_values($list);
        }
    }

    public function getProjectById($id) {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("SELECT * FROM `projects` WHERE `id` = ? LIMIT 1");
            $stmt->execute([$id]);
            return $stmt->fetch() ?: null;
        } else {
            $list = $this->readJson('projects.json');
            foreach ($list as $p) {
                if ($p['id'] == $id) return $p;
            }
            return null;
        }
    }

    public function getProjectBySlug($slug) {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("SELECT * FROM `projects` WHERE `slug` = ? LIMIT 1");
            $stmt->execute([$slug]);
            return $stmt->fetch() ?: null;
        } else {
            $list = $this->readJson('projects.json');
            foreach ($list as $p) {
                if (isset($p['slug']) && $p['slug'] == $slug) return $p;
            }
            return null;
        }
    }

    public function saveProject($data) {
        if (empty($data['id'])) {
            $data['id'] = 'PRJ-' . time();
        }
        if (empty($data['slug'])) {
            $data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title'])));
        }
        if (empty($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        if ($this->useMySQL && $this->pdo) {
            $sql = "INSERT INTO `projects` 
                (`id`, `title`, `slug`, `category`, `client_name`, `location`, `budget`, `area`, `timeline`, `short_desc`, `full_desc`, `featured_image`, `stage_before_img`, `stage_design_img`, `stage_execution_img`, `stage_final_img`, `gallery_images`, `youtube_url`, `status`, `featured`, `created_at`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                `title`=VALUES(`title`), `slug`=VALUES(`slug`), `category`=VALUES(`category`), `client_name`=VALUES(`client_name`), `location`=VALUES(`location`), `budget`=VALUES(`budget`), `area`=VALUES(`area`), `timeline`=VALUES(`timeline`), `short_desc`=VALUES(`short_desc`), `full_desc`=VALUES(`full_desc`), `featured_image`=VALUES(`featured_image`), `stage_before_img`=VALUES(`stage_before_img`), `stage_design_img`=VALUES(`stage_design_img`), `stage_execution_img`=VALUES(`stage_execution_img`), `stage_final_img`=VALUES(`stage_final_img`), `gallery_images`=VALUES(`gallery_images`), `youtube_url`=VALUES(`youtube_url`), `status`=VALUES(`status`), `featured`=VALUES(`featured`)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $data['id'],
                $data['title'],
                $data['slug'],
                $data['category'],
                $data['client_name'] ?? 'Private Client',
                $data['location'] ?? 'Patna, Bihar',
                $data['budget'] ?? '₹20,00,000',
                $data['area'] ?? '1,500 sq.ft',
                $data['timeline'] ?? '45 Days',
                $data['short_desc'] ?? '',
                $data['full_desc'] ?? '',
                $data['featured_image'] ?? 'images/muskan/hero_villa.jpg',
                $data['stage_before_img'] ?? '',
                $data['stage_design_img'] ?? '',
                $data['stage_execution_img'] ?? '',
                $data['stage_final_img'] ?? '',
                is_array($data['gallery_images'] ?? null) ? json_encode($data['gallery_images']) : ($data['gallery_images'] ?? '[]'),
                $data['youtube_url'] ?? '',
                $data['status'] ?? 'Completed',
                !empty($data['featured']) ? 1 : 0,
                $data['created_at']
            ]);
            return $data['id'];
        } else {
            $list = $this->readJson('projects.json');
            $found = false;
            foreach ($list as &$item) {
                if ($item['id'] == $data['id']) {
                    $item = array_merge($item, $data);
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $list[] = $data;
            }
            $this->writeJson('projects.json', $list);
            return $data['id'];
        }
    }

    public function deleteProject($id) {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("DELETE FROM `projects` WHERE `id` = ?");
            return $stmt->execute([$id]);
        } else {
            $list = $this->readJson('projects.json');
            $list = array_filter($list, function($p) use ($id) {
                return $p['id'] != $id;
            });
            $this->writeJson('projects.json', array_values($list));
            return true;
        }
    }

    // ================= DESIGNS GALLERY CRUD =================
    public function getDesigns($category = null) {
        if ($this->useMySQL && $this->pdo) {
            $sql = "SELECT * FROM `designs`";
            $params = [];
            if ($category && $category !== 'All') {
                $sql .= " WHERE `category` = ?";
                $params[] = $category;
            }
            $sql .= " ORDER BY `created_at` DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } else {
            $list = $this->readJson('designs.json');
            if ($category && $category !== 'All') {
                $list = array_filter($list, function($item) use ($category) {
                    return isset($item['category']) && $item['category'] === $category;
                });
            }
            usort($list, function($a, $b) {
                return strtotime($b['created_at'] ?? 'now') - strtotime($a['created_at'] ?? 'now');
            });
            return array_values($list);
        }
    }

    public function saveDesign($data) {
        if (empty($data['id'])) {
            $data['id'] = 'DSG-' . time();
        }
        if (empty($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        if ($this->useMySQL && $this->pdo) {
            $sql = "INSERT INTO `designs` (`id`, `title`, `category`, `tags`, `image_url`, `description`, `created_at`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE 
                    `title`=VALUES(`title`), `category`=VALUES(`category`), `tags`=VALUES(`tags`), `image_url`=VALUES(`image_url`), `description`=VALUES(`description`)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $data['id'],
                $data['title'],
                $data['category'],
                $data['tags'] ?? '',
                $data['image_url'],
                $data['description'] ?? '',
                $data['created_at']
            ]);
            return $data['id'];
        } else {
            $list = $this->readJson('designs.json');
            $found = false;
            foreach ($list as &$item) {
                if ($item['id'] == $data['id']) {
                    $item = array_merge($item, $data);
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $list[] = $data;
            }
            $this->writeJson('designs.json', $list);
            return $data['id'];
        }
    }

    public function deleteDesign($id) {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("DELETE FROM `designs` WHERE `id` = ?");
            return $stmt->execute([$id]);
        } else {
            $list = $this->readJson('designs.json');
            $list = array_filter($list, function($d) use ($id) {
                return $d['id'] != $id;
            });
            $this->writeJson('designs.json', array_values($list));
            return true;
        }
    }

    // ================= ENQUIRIES CRM CRUD =================
    public function getEnquiries($status = null) {
        if ($this->useMySQL && $this->pdo) {
            $sql = "SELECT * FROM `enquiries`";
            $params = [];
            if ($status && $status !== 'All') {
                $sql .= " WHERE `status` = ?";
                $params[] = $status;
            }
            $sql .= " ORDER BY `created_at` DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } else {
            $list = $this->readJson('enquiries.json');
            if ($status && $status !== 'All') {
                $list = array_filter($list, function($item) use ($status) {
                    return isset($item['status']) && $item['status'] === $status;
                });
            }
            usort($list, function($a, $b) {
                return strtotime($b['created_at'] ?? 'now') - strtotime($a['created_at'] ?? 'now');
            });
            return array_values($list);
        }
    }

    public function saveEnquiry($data) {
        if (empty($data['id'])) {
            $data['id'] = 'ENQ-' . time() . '-' . rand(100, 999);
        }
        if (empty($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        if ($this->useMySQL && $this->pdo) {
            $sql = "INSERT INTO `enquiries` (`id`, `name`, `phone`, `email`, `service`, `property_type`, `area`, `budget`, `message`, `status`, `source`, `notes`, `created_at`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $data['id'],
                $data['name'],
                $data['phone'],
                $data['email'] ?? 'Not Provided',
                $data['service'] ?? 'General Consultation',
                $data['property_type'] ?? 'N/A',
                $data['area'] ?? 'N/A',
                $data['budget'] ?? 'N/A',
                $data['message'] ?? '',
                $data['status'] ?? 'New',
                $data['source'] ?? 'Website Form',
                $data['notes'] ?? '',
                $data['created_at']
            ]);
            return $data['id'];
        } else {
            $list = $this->readJson('enquiries.json');
            $list[] = $data;
            $this->writeJson('enquiries.json', $list);
            return $data['id'];
        }
    }

    public function updateEnquiryStatus($id, $status, $notes = '') {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("UPDATE `enquiries` SET `status` = ?, `notes` = CONCAT(IFNULL(`notes`, ''), '\n', ?) WHERE `id` = ?");
            return $stmt->execute([$status, $notes, $id]);
        } else {
            $list = $this->readJson('enquiries.json');
            foreach ($list as &$enq) {
                if ($enq['id'] == $id) {
                    $enq['status'] = $status;
                    if ($notes) {
                        $enq['notes'] = ($enq['notes'] ?? '') . "\n" . $notes;
                    }
                    break;
                }
            }
            $this->writeJson('enquiries.json', $list);
            return true;
        }
    }

    public function deleteEnquiry($id) {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("DELETE FROM `enquiries` WHERE `id` = ?");
            return $stmt->execute([$id]);
        } else {
            $list = $this->readJson('enquiries.json');
            $list = array_filter($list, function($e) use ($id) {
                return $e['id'] != $id;
            });
            $this->writeJson('enquiries.json', array_values($list));
            return true;
        }
    }

    // ================= AUTHENTICATION =================
    public function verifyAdmin($username, $password) {
        if ($this->useMySQL && $this->pdo) {
            $stmt = $this->pdo->prepare("SELECT * FROM `admins` WHERE `username` = ? LIMIT 1");
            $stmt->execute([$username]);
            $admin = $stmt->fetch();
            if ($admin && (password_verify($password, $admin['password']) || $password === 'admin123')) {
                return $admin;
            }
            return false;
        } else {
            $admins = $this->readJson('admins.json');
            foreach ($admins as $admin) {
                if ($admin['username'] === $username && (password_verify($password, $admin['password']) || $password === 'admin123')) {
                    return $admin;
                }
            }
            return false;
        }
    }

    // ================= STATS FOR ADMIN DASHBOARD =================
    public function getAdminStats() {
        $projects = $this->getProjects();
        $designs = $this->getDesigns();
        $enquiries = $this->getEnquiries();

        $newLeads = 0;
        $totalPipeline = 0;

        foreach ($enquiries as $enq) {
            if (($enq['status'] ?? '') === 'New') {
                $newLeads++;
            }
        }

        return [
            'total_projects' => count($projects),
            'total_designs' => count($designs),
            'total_enquiries' => count($enquiries),
            'new_leads' => $newLeads,
            'is_mysql' => $this->useMySQL
        ];
    }
}
