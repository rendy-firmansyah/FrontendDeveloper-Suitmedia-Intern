<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    let prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
      let currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
        // document.getElementById("navbar").style.background = "rgba(255, 255, 255, 0.9)";
      } else {
        document.getElementById("navbar").style.top = "-100px";
      }
      prevScrollpos = currentScrollPos;
    }

    function handlePerPageChange(select) {
        const perPage = select.value;
        const url = new URL(window.location.href);
        const page = url.searchParams.get('page');
        url.searchParams.set('perPage', perPage);

        if (page) {
            url.searchParams.set('page', page);
        }

        window.location.href = url.href; 
    }
    $(document).ready(function () {
        var scrollTop = 0;

        $(window).scroll(function () {
            var scrollValue = $(this).scrollTop();

            if (scrollValue > scrollTop) {
                $('.hero-image').css('transform', 'translateY(' + (-scrollValue / 2) + 'px)');
                $('.hero-text').css('transform', 'translateY(' + (scrollValue / 4) + 'px)');
            } else {
                $('.hero-image').css('transform', 'translateY(' + (-scrollValue / 2) + 'px)');
                $('.hero-text').css('transform', 'translateY(' + (scrollValue / 4) + 'px)');
            }

            scrollTop = scrollValue;
        });
    });
</script>