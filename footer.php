    </main>

    <footer>
        <p>&copy; <span id="currentYear"></span> ShopFlow. Built with PHP (No DB).</p>
    </footer>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const htmlEl = document.documentElement;
        const savedTheme = localStorage.getItem('theme') || 'light';
        htmlEl.setAttribute('data-theme', savedTheme);
        themeToggle.textContent = savedTheme === 'light' ? '🌙' : '☀️';

        themeToggle.addEventListener('click', () => {
            const current = htmlEl.getAttribute('data-theme');
            const next = current === 'light' ? 'dark' : 'light';
            htmlEl.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            themeToggle.textContent = next === 'light' ? '🌙' : '☀️';
        });

        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</body>
</html>