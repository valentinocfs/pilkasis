<script>
    $('.logout').click(function() {
        var user_nama = $(this).attr('user-nama');
        swal({
                title: "Yakin ?",
                text: "Keluar dari akun " + user_nama + " ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/logout";
                } else {
                    swal("Anda tidak jadi logout.");
                }
            });
    });
</script>