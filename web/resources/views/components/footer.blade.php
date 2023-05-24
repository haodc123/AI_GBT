
    <!-- Scripts -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.scrolly.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
        <script src="/js/skel.min.js"></script>
        <script src="/js/util.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/rcrop.min.js"></script>

        <script>
        $(document).ready(function() {
            var s_grade;
            var s_subject;
            function goInput(e, input_type) {
                e.preventDefault();
                s_grade = $('#s_grade').find(":selected").val();
                s_subject = $('#s_subject').find(":selected").val();
                if (s_grade == 0) {
                    alert('Bạn cần chọn lớp!');
                    return;
                }
                window.location.href = "exc/"+input_type+"/"+s_grade+"/"+s_subject;
            }
            $('a.input-camera').click(function(e) {
                goInput(e, 'camera');
            });
            $('a.input-type').click(function(e) {
                goInput(e, 'type');
            });
        });
        </script>

    </body>
</html>