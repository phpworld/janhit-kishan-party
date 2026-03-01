</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-dismiss alerts
    document.querySelectorAll('.alert').forEach(function(el) {
        setTimeout(function() {
            el.style.transition = 'opacity .4s';
            el.style.opacity = '0';
            setTimeout(function() { el.remove(); }, 400);
        }, 3500);
    });
</script>
</body>
</html>
