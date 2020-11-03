<footer class="footer">
    <div class="footer-wrap">
        <div class="w-100 clearfix">
        <span class="d-block text-center">
            Copyright © 
            <span id="tahun"></span>
            . All rights reserved.
        </span>
    </div>
</footer>

<script>
    var currentYear = new Date().getFullYear();
    document.getElementById("tahun").innerHTML = currentYear;
</script>