<script src="<?= BASEURL ?>/public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#iconPass').on('click', function() {
        const type = $('#password')
        if (type.attr('type') === 'password') {
            type.attr('type', 'text')
            $('#iconPass').removeClass('bi bi-eye-slash')
            $('#iconPass').addClass('bi bi-eye')
        } else {
            type.attr('type', 'password')
            $('#iconPass').removeClass('bi bi-eye')
            $('#iconPass').addClass('bi bi-eye-slash')
        }
    })
    $('#iconPassre').on('click', function() {
        const type = $('#retype_password')
        if (type.attr('type') === 'password') {
            type.attr('type', 'text')
            $('#iconPassre').removeClass('bi bi-eye-slash')
            $('#iconPassre').addClass('bi bi-eye')
        } else {
            type.attr('type', 'password')
            $('#iconPassre').removeClass('bi bi-eye')
            $('#iconPassre').addClass('bi bi-eye-slash')
        }
    })

    $('#myTable').DataTable({
        responsive: true
    });
</script>

<!-- find harga -->
<script type="text/javascript">
    $('#bahan_bakar').change(function() {
        const data = $('#bahan_bakar').val()
        $.ajax({
            url: '<?= BASEURL ?>/pembelian/findHarga/' + data,
            data: {
                id: data
            },
            dataType: 'json',
            method: 'get',
            success: function(data) {
                $('#harga').val(parseInt(data.harga))
            }
        })
    })
</script>

<!-- operation jumlah_uang -->
<script type="text/javascript">
    $('#jumlah_uang').on('keyup', function() {
        let harga = $('#harga').val();
        if ($('#jumlah_uang').val() === harga) {
            const data = $('#bahan_bakar').val()
            $.ajax({
                url: '<?= BASEURL ?>/pembelian/findHarga/' + data,
                data: {
                    id: data
                },
                dataType: 'json',
                method: 'get',
                success: function(data) {
                    $('#liter').val(data.liter)
                }
            })
        } else if (parseInt($('#jumlah_uang').val()) > parseInt(harga)) {
            let operation = parseInt($('#jumlah_uang').val()) / parseInt(harga)
            const parseString = operation.toString()
            $('#liter').val(parseString.substring(0, 4))
        } else {
            $('#liter').val(0)
        }
    })
</script>


<!-- session flash message -->
<?php if (isset($_SESSION['flash'])) : ?>
    <script type="text/javascript">
        Swal.fire({
            title: '<?= $_SESSION['flash']['pesan'] ?>',
            text: '<?= $_SESSION['flash']['message'] ?>',
            icon: '<?= $_SESSION['flash']['type'] ?>',
            confirmButtonColor: '#3085d6',
        })
    </script>
    <?php unset($_SESSION['flash']) ?>
<?php endif; ?>


<!-- delete confirmation -->
<script type="text/javascript">
    $('#delete').click(function(e) {
        e.preventDefault()
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })
</script>


<!-- logout confirmation -->
<script type="text/javascript">
    $('#logout').click(function(e) {
        e.preventDefault()
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Are you sure?',
            text: "You will logout from pertamini digital!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'logout'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })
</script>
</body>

</html>