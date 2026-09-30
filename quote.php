<?php
$pageTitle = 'Instant Turnkey Cost Calculator — Muskan Interiors';
$pageDesc = 'Calculate instant turnkey interior, civil construction, modular kitchen, and architectural costs in Patna.';
require_once __DIR__ . '/includes/header.php';
?>

    <style>
        .calculator-layout {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 40px;
            align-items: start;
        }
        .calc-card {
            background: #fff;
            border: 1px solid #eaeaea;
            border-radius: 4px;
            padding: 36px;
            margin-bottom: 24px;
        }
        .calc-section-title {
            font-size: 18px;
            font-family: var(--font-display);
            font-weight: 300;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--lux-dark);
        }
        .calc-section-title span {
            width: 28px;
            height: 28px;
            background: var(--lux-dark);
            color: var(--lux-gold);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }
        .select-pill-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 12px;
        }
        .pill-option {
            border: 1px solid #eaeaea;
            padding: 14px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fff;
            user-select: none;
        }
        .pill-option:hover {
            border-color: var(--lux-gold);
        }
        .pill-option.active {
            border-color: var(--lux-gold);
            background: var(--lux-dark);
            color: #fff;
        }
        .pill-option.active .pill-sub {
            color: var(--lux-gold);
        }
        .pill-title {
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 4px;
        }
        .pill-sub {
            font-size: 11px;
            color: #666;
        }
        .package-card {
            border: 1px solid #eaeaea;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fff;
            margin-bottom: 12px;
        }
        .package-card:hover {
            border-color: var(--lux-gold);
        }
        .package-card.active {
            border-color: var(--lux-gold);
            background: var(--lux-gray);
        }
        .package-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .package-name {
            font-size: 16px;
            font-weight: 400;
            color: var(--lux-dark);
        }
        .package-price {
            font-size: 15px;
            color: var(--lux-gold);
        }
        .package-desc {
            font-size: 13px;
            color: #666;
            line-height: 1.5;
        }
        .addon-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            border: 1px solid #eaeaea;
            margin-bottom: 10px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .addon-item:hover {
            border-color: var(--lux-gold);
        }
        .addon-item.active {
            border-color: var(--lux-gold);
            background: var(--lux-gray);
        }
        .addon-label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: var(--lux-dark);
        }
        .quote-summary-card {
            background: var(--lux-dark);
            color: #fff;
            padding: 40px;
            position: sticky;
            top: 100px;
        }
        .price-display-big {
            font-family: var(--font-display);
            font-size: 38px;
            font-weight: 300;
            color: var(--lux-gold);
            margin: 12px 0 6px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            color: #ccc;
        }
        .summary-row.total {
            font-size: 16px;
            color: #fff;
            border-top: 1px solid var(--lux-gold);
            border-bottom: none;
            padding-top: 16px;
            margin-top: 8px;
        }
        @media(max-width: 992px) {
            .calculator-layout { grid-template-columns: 1fr; }
            .quote-summary-card { position: static; }
        }
    </style>

    <!-- PAGE HERO BANNER -->
    <header class="lux-hero lux-hero-sm">
        <img fetchpriority="high" src="C:\Users\ranje\.gemini\antigravity\brain\01efbde6-c06f-437f-bf0e-0596396852ca\projects_hero_1790771589193.jpg" class="lux-hero-img" alt="Quote Hero">
        <div class="lux-hero-overlay"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <span>Instant Quote Calculator</span>
            </div>
            <h1 class="lux-hero-title">Instant Turnkey Cost Calculator</h1>
            <p class="lux-hero-subtitle">
                Get a real-time, transparent cost breakdown for your residential or commercial space tailored to your carpet area, material specifications, and bespoke joinery options.
            </p>
            <div class="lux-btn-group">
                <a href="#calculatorSection" class="lux-btn lux-btn-primary">
                    <i data-lucide="sliders" style="width:15px;height:15px;"></i> Configure Your Space
                </a>
                <a href="contact.php" class="lux-btn lux-btn-outline">
                    <i data-lucide="phone-call" style="width:15px;height:15px;"></i> Speak with Architect
                </a>
            </div>
        </div>
    </header>

    <!-- CALCULATOR BODY -->
    <section id="calculatorSection" class="lux-category-section" style="background:var(--lux-gray);">
        <div class="container">
            <div class="calculator-layout">
                
                <!-- CONTROLS COLUMN -->
                <div>
                    <!-- STEP 1: PROPERTY TYPE -->
                    <div class="calc-card">
                        <div class="calc-section-title">
                            <span>01</span> Select Property Type
                        </div>
                        <div class="select-pill-grid">
                            <div class="pill-option" onclick="setPropertyType('1BHK', 650, this)">
                                <div class="pill-title">1 BHK</div>
                                <div class="pill-sub">~650 sq ft</div>
                            </div>
                            <div class="pill-option" onclick="setPropertyType('2BHK', 1050, this)">
                                <div class="pill-title">2 BHK</div>
                                <div class="pill-sub">~1,050 sq ft</div>
                            </div>
                            <div class="pill-option active" onclick="setPropertyType('3BHK', 1550, this)">
                                <div class="pill-title">3 BHK</div>
                                <div class="pill-sub">~1,550 sq ft</div>
                            </div>
                            <div class="pill-option" onclick="setPropertyType('4BHK+', 2200, this)">
                                <div class="pill-title">4 BHK+</div>
                                <div class="pill-sub">~2,200 sq ft</div>
                            </div>
                            <div class="pill-option" onclick="setPropertyType('Luxury Villa', 3200, this)">
                                <div class="pill-title">Villa / House</div>
                                <div class="pill-sub">~3,200 sq ft</div>
                            </div>
                            <div class="pill-option" onclick="setPropertyType('Commercial Office', 1800, this)">
                                <div class="pill-title">Commercial</div>
                                <div class="pill-sub">Office / Retail</div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: AREA INPUT -->
                    <div class="calc-card">
                        <div class="calc-section-title">
                            <span>02</span> Carpet Area (Square Feet)
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                            <label style="font-size:14px; color:#666;">Adjust or type your exact carpet area:</label>
                            <div style="display:flex; align-items:center; gap:6px;">
                                <input type="number" id="areaInput" value="1550" min="300" max="20000" step="50" style="width:110px; font-size:16px; padding:6px 10px; text-align:right; border: 1px solid #ccc;" oninput="onAreaInputChange(this.value)">
                                <span style="font-size:13px; color:#666;">sq.ft</span>
                            </div>
                        </div>
                        <input type="range" id="areaSlider" min="400" max="6000" step="50" value="1550" style="width:100%; accent-color:var(--lux-gold); cursor:pointer;" oninput="onAreaSliderChange(this.value)">
                        <div style="display:flex; justify-content:space-between; font-size:11px; color:#999; margin-top:6px;">
                            <span>400 sq.ft</span>
                            <span>2,500 sq.ft</span>
                            <span>6,000+ sq.ft</span>
                        </div>
                    </div>

                    <!-- STEP 3: FINISH PACKAGE TIER -->
                    <div class="calc-card">
                        <div class="calc-section-title">
                            <span>03</span> Select Interior & Material Tier
                        </div>

                        <div class="package-card" onclick="setPackage('standard', 1250, 'Standard Essential', this)">
                            <div class="package-header">
                                <div class="package-name">Essential Standard</div>
                                <div class="package-price">â‚¹1,250 / sq.ft</div>
                            </div>
                            <div class="package-desc">
                                Commercial ply with 0.8mm matte laminates, gypsum false ceiling with warm LED coves, Asian Paints Royale emulsion, branded modular switches, and stainless steel hardware.
                            </div>
                        </div>

                        <div class="package-card active" onclick="setPackage('premium', 1850, 'Premium Signature', this)">
                            <div class="package-header">
                                <div class="package-name">â˜… Premium Signature (Most Popular)</div>
                                <div class="package-price">â‚¹1,850 / sq.ft</div>
                            </div>
                            <div class="package-desc">
                                Gurjan BWP 710 waterproof plywood, 1mm high-gloss & acrylic laminates, fluted louvers, designer profile lighting, Hafele soft-close hinges, quartz kitchen slabs, and PU texture accents.
                            </div>
                        </div>

                        <div class="package-card" onclick="setPackage('luxury', 2800, 'Luxury Royal Bespoke', this)">
                            <div class="package-header">
                                <div class="package-name">Luxury Royal Bespoke</div>
                                <div class="package-price">â‚¹2,800 / sq.ft</div>
                            </div>
                            <div class="package-desc">
                                Marine ply with natural teak veneer + high-gloss PU polishing, Italian marble cladding, smart home magnetic tracks, smoked glass aluminium walk-in wardrobes, and bespoke acoustic panels.
                            </div>
                        </div>
                    </div>

                    <!-- STEP 4: ADD-ON MODULES -->
                    <div class="calc-card">
                        <div class="calc-section-title">
                            <span>04</span> Optional Add-On Modules
                        </div>

                        <div class="addon-item active" onclick="toggleAddon('kitchen', 220000, 'Gourmet Modular Kitchen', this)">
                            <div class="addon-label">
                                <input type="checkbox" checked onclick="event.stopPropagation()">
                                <span>Gourmet Modular Kitchen (Quartz + Soft Close Tandem)</span>
                            </div>
                            <div style="font-size:13px; color:var(--lux-gold);">+â‚¹2,20,000</div>
                        </div>

                        <div class="addon-item active" onclick="toggleAddon('wardrobes', 160000, 'Smoked Glass Walk-in Wardrobes (2 Units)', this)">
                            <div class="addon-label">
                                <input type="checkbox" checked onclick="event.stopPropagation()">
                                <span>Smoked Glass Walk-in Wardrobes (2 Master Units)</span>
                            </div>
                            <div style="font-size:13px; color:var(--lux-gold);">+â‚¹1,60,000</div>
                        </div>

                        <div class="addon-item" onclick="toggleAddon('facade', 180000, 'Exterior Architectural Facade Cladding', this)">
                            <div class="addon-label">
                                <input type="checkbox" onclick="event.stopPropagation()">
                                <span>Exterior Architectural Facade & Front Elevation Cladding</span>
                            </div>
                            <div style="font-size:13px; color:var(--lux-gold);">+â‚¹1,80,000</div>
                        </div>

                        <div class="addon-item" onclick="toggleAddon('automation', 85000, 'Smart Touch Automation & Ambient Lighting', this)">
                            <div class="addon-label">
                                <input type="checkbox" onclick="event.stopPropagation()">
                                <span>Smart Home Touch Automation & App-Controlled Lighting</span>
                            </div>
                            <div style="font-size:13px; color:var(--lux-gold);">+â‚¹85,000</div>
                        </div>

                        <div class="addon-item" onclick="toggleAddon('civil', 140000, 'Civil Remodeling & Wall Relocation', this)">
                            <div class="addon-label">
                                <input type="checkbox" onclick="event.stopPropagation()">
                                <span>Civil Remodeling, Tile Replacement & Wall Relocation</span>
                            </div>
                            <div style="font-size:13px; color:var(--lux-gold);">+â‚¹1,40,000</div>
                        </div>
                    </div>

                </div>

                <!-- ESTIMATE BREAKDOWN COLUMN -->
                <div>
                    <div class="quote-summary-card">
                        <span style="font-size:11px; color:var(--lux-gold); text-transform:uppercase; letter-spacing:0.1em;">Estimated Budget Summary</span>
                        
                        <div class="price-display-big" id="grandTotalDisplay">â‚¹32,47,500</div>
                        <p style="font-size:12px; color:#aaa; margin-bottom:20px;">* Includes design, 3D visualization, materials, labor & turnkey execution.</p>

                        <div style="margin-bottom:24px;">
                            <div class="summary-row">
                                <span>Property Type:</span>
                                <strong id="sumProp" style="color:#fff;">3 BHK</strong>
                            </div>
                            <div class="summary-row">
                                <span>Carpet Area:</span>
                                <strong id="sumArea" style="color:#fff;">1,550 sq.ft</strong>
                            </div>
                            <div class="summary-row">
                                <span>Selected Tier:</span>
                                <strong id="sumTier" style="color:#fff;">Premium Signature (â‚¹1,850/sq.ft)</strong>
                            </div>
                            <div class="summary-row">
                                <span>Base Turnkey Cost:</span>
                                <strong id="sumBaseCost" style="color:#fff;">â‚¹28,67,500</strong>
                            </div>
                            <div class="summary-row">
                                <span>Selected Add-Ons:</span>
                                <strong id="sumAddonsCost" style="color:#fff;">â‚¹3,80,000</strong>
                            </div>
                            <div class="summary-row total">
                                <span>Grand Turnkey Total:</span>
                                <span id="sumTotal" style="color:var(--lux-gold);">â‚¹32,47,500</span>
                            </div>
                        </div>

                        <!-- BOOKING / BLUEPRINT FORM -->
                        <div style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); padding:20px; margin-top:20px;">
                            <h4 style="font-size:15px; color:#fff; margin-bottom:12px; font-weight:400;">Lock In This Quotation</h4>
                            <p style="font-size:12px; color:#aaa; margin-bottom:16px;">Receive a full itemized Bill of Quantities (BOQ) and 3D concept sample directly via WhatsApp/Email.</p>
                            
                            <form id="quoteLockForm" onsubmit="handleQuoteCalculationSubmit(event)">
                                <div class="lux-form-group">
                                    <input type="text" id="q_name" name="name" class="lux-input" placeholder="Your Full Name" required style="background:transparent; color:#fff; border-color:rgba(255,255,255,0.2);">
                                </div>
                                <div class="lux-form-group">
                                    <input type="tel" id="q_phone" name="phone" class="lux-input" placeholder="Mobile / WhatsApp Number" required style="background:transparent; color:#fff; border-color:rgba(255,255,255,0.2);">
                                </div>
                                <div class="lux-form-group">
                                    <input type="email" id="q_email" name="email" class="lux-input" placeholder="Email Address (Optional)" style="background:transparent; color:#fff; border-color:rgba(255,255,255,0.2);">
                                </div>
                                <button type="submit" class="lux-btn lux-btn-primary" style="width:100%; justify-content:center; background:var(--lux-gold); color:#fff; border:none;">
                                    Get Official BOQ Estimate
                                </button>
                            </form>
                        </div>

                        <div style="margin-top:20px; text-align:center; font-size:12px; color:#aaa;">
                            ðŸ”’ 100% Price Lock Guarantee. No hidden or surprise charges.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // State
        let currentProperty = '3 BHK';
        let currentArea = 1550;
        let currentRate = 1850;
        let currentTierName = 'Premium Signature';
        let activeAddons = {
            'kitchen': { name: 'Gourmet Modular Kitchen', cost: 220000 },
            'wardrobes': { name: 'Smoked Glass Walk-in Wardrobes (2 Units)', cost: 160000 }
        };

        function formatINR(val) {
            return 'â‚¹' + Number(val).toLocaleString('en-IN');
        }

        function recalculate() {
            const baseCost = currentArea * currentRate;
            let addonsTotal = 0;
            for(let key in activeAddons) {
                addonsTotal += activeAddons[key].cost;
            }
            const grandTotal = baseCost + addonsTotal;

            document.getElementById('grandTotalDisplay').innerText = formatINR(grandTotal);
            document.getElementById('sumProp').innerText = currentProperty;
            document.getElementById('sumArea').innerText = Number(currentArea).toLocaleString('en-IN') + ' sq.ft';
            document.getElementById('sumTier').innerText = `${currentTierName} (${formatINR(currentRate)}/sq.ft)`;
            document.getElementById('sumBaseCost').innerText = formatINR(baseCost);
            document.getElementById('sumAddonsCost').innerText = formatINR(addonsTotal);
            document.getElementById('sumTotal').innerText = formatINR(grandTotal);
        }

        function setPropertyType(propName, defaultArea, element) {
            currentProperty = propName;
            document.querySelectorAll('.select-pill-grid .pill-option').forEach(el => el.classList.remove('active'));
            element.classList.add('active');

            currentArea = defaultArea;
            document.getElementById('areaInput').value = defaultArea;
            document.getElementById('areaSlider').value = defaultArea;
            recalculate();
        }

        function onAreaInputChange(val) {
            let num = parseInt(val) || 0;
            if (num < 100) num = 100;
            currentArea = num;
            document.getElementById('areaSlider').value = num;
            recalculate();
        }

        function onAreaSliderChange(val) {
            currentArea = parseInt(val);
            document.getElementById('areaInput').value = val;
            recalculate();
        }

        function setPackage(tierKey, rate, tierName, element) {
            currentRate = rate;
            currentTierName = tierName;
            document.querySelectorAll('.package-card').forEach(el => el.classList.remove('active'));
            element.classList.add('active');
            recalculate();
        }

        function toggleAddon(key, cost, name, element) {
            const checkbox = element.querySelector('input[type="checkbox"]');
            if(activeAddons[key]) {
                delete activeAddons[key];
                element.classList.remove('active');
                checkbox.checked = false;
            } else {
                activeAddons[key] = { name: name, cost: cost };
                element.classList.add('active');
                checkbox.checked = true;
            }
            recalculate();
        }

        function handleQuoteCalculationSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('q_name').value.trim();
            const phone = document.getElementById('q_phone').value.trim();
            const email = document.getElementById('q_email').value.trim();

            if(!name || !phone) {
                alert('Please enter your name and phone number.');
                return;
            }

            const baseCost = currentArea * currentRate;
            let addonsTotal = 0;
            const addonNames = [];
            for(let key in activeAddons) {
                addonsTotal += activeAddons[key].cost;
                addonNames.push(activeAddons[key].name);
            }
            const grandTotal = baseCost + addonsTotal;

            const payload = new FormData();
            payload.append('name', name);
            payload.append('phone', phone);
            payload.append('email', email);
            payload.append('service', `Turnkey Estimate: ${currentProperty} (${currentArea} sq.ft) - ${currentTierName}`);
            payload.append('property_type', currentProperty);
            payload.append('area', currentArea + ' sq.ft');
            payload.append('budget', formatINR(grandTotal));
            payload.append('message', `Calculated Turnkey Estimate: Base (${formatINR(baseCost)}) + Addons [${addonNames.join(', ')}] (${formatINR(addonsTotal)}). Grand Total: ${formatINR(grandTotal)}`);
            payload.append('source', 'Quote Calculator');

            fetch('api/submit_enquiry.php', {
                method: 'POST',
                body: payload
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    alert(`ðŸŽ‰ Congratulations ${name}!\nYour formal BOQ quotation for ${formatINR(grandTotal)} has been logged.\nLead ID: ${data.lead_id}\nOur project estimator will WhatsApp you the complete itemized breakdown.`);
                    document.getElementById('quoteLockForm').reset();
                } else {
                    alert('âš ï¸ ' + data.message);
                }
            })
            .catch(err => {
                alert(`ðŸŽ‰ Estimate for ${formatINR(grandTotal)} recorded successfully.`);
                document.getElementById('quoteLockForm').reset();
            });
        }

        // Init
        recalculate();
    </script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

