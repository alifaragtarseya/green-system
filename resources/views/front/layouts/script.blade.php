<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.meanmenu.js"></script>
    <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.appear.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.lazy.min.js"></script>
    <script>
        $(function($) {
            $("img.lazy").Lazy();
        });
    </script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script>
        function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
    </script>
<script>
    // $('.owl-carousel').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     dots: false,
    //     nav: true,
    //     autoplay: true,
    //     autoplayTimeout:2000,
    //     smartSpeed: 3000,
    //     responsiveClass: true,
    //     responsive: {
    //         0: {
    //             items: 1,
    //         },
    //         600: {
    //             items: 3,
    //         },
    //         1000: {
    //             items: 5,
    //         }
    //     }
    // })
</script>
