        </div> <!-- End admin-content -->
    </div> <!-- End admin-main -->

    <script>
        // Init Lucide Icons
        lucide.createIcons();

        // Image Preview Handler Helper
        function previewImage(input, previewElementId) {
            const preview = document.getElementById(previewElementId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
