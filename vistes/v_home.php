
<html>

<body>
    <!-- Slideshow container -->
    <div id="slideshow-container">
        <h>ALGUNES DE LES NOSTRES RESTAURACIONS!</h>
        <div class = "slidess">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <img src="../img/restaurar1.png" style="width:30%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <img src="../img/restaurar2.png" style="width:30%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="../img/restaurarb1.png" style="width:30%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 4</div>
                <img src="../img/restaurarb2.png" style="width:30%">
            </div>
        </div>
        <p>Vés a ABOUT US per saber més de nosaltres!</p>
    </div>
    <br>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 1000); // Change image every 1 secondd
        }
    </script>

</body>
</html>
