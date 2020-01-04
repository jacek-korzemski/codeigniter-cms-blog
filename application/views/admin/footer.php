</div>
<script>
    let menuItems = document.querySelectorAll('.menu-panel a');
    for (i = 0; i < menuItems.length; i++) {
        let currentUri = location.pathname.substr(1);
        if (menuItems[i].getAttribute('href') == currentUri) {
            menuItems[i].setAttribute('style', 'text-decoration: underline;');
        }
    }
</script>
</body>
</html>