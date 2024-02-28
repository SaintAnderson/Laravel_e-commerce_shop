<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{--<script src="/assets/plg/jQuery/jquery-3.5.0.slim.min.js"></script>--}}
<script src="/assets/plg/form/jquery.form.js"></script>
<script src="/assets/plg/form/jquery.maskedinput.min.js"></script>
<script src="/assets/plg/range/ion.rangeSlider.min.js"></script>
<script src="/assets/plg/Slider/slick.min.js"></script>

@vite('resources/js/app.js')

<script type="application/javascript">
    $(function() {
        $(document).on('click', '.change', function () {
            let id = $(this).data('id');
            let url = '/compare/add/';
            ajaxRequest(url, id);

            location.reload();
        });

        $(document).on('click', '.delete', function () {
            let id = $(this).data('id');
            let url = '/compare/remove'
            ajaxRequest(url, id);

            location.reload();
        });
    });

    function ajaxRequest(url, id) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id},
        });
    }
</script>
