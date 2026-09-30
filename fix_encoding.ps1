Get-ChildItem -Path c:\xampp\htdocs\naseem -Filter *.php -Recurse | ForEach-Object {
    $bytes = [System.IO.File]::ReadAllBytes($_.FullName)
    $text = [System.Text.Encoding]::UTF8.GetString($bytes)
    
    $original = $text
    $text = $text.Replace([char]226+[char]128+[char]148, '—')
    $text = $text.Replace([char]226+[char]128+[char]147, '–')
    $text = $text.Replace([char]226+[char]128+[char]153, '’')
    $text = $text.Replace([char]226+[char]128+[char]152, '‘')
    $text = $text.Replace([char]226+[char]128+[char]156, '“')
    $text = $text.Replace([char]226+[char]128+[char]157, '”')
    $text = $text.Replace('Y"?', '📍')

    if ($original -cne $text) {
        [System.IO.File]::WriteAllText($_.FullName, $text, [System.Text.Encoding]::UTF8)
        Write-Host "Fixed: $($_.Name)"
    }
}
