@include('Admin.includes.scripts.dataTableHelper')

<script type="text/javascript">

    var table = $('#datatable').DataTable({
        bLengthChange: false,
        searching: true,
        responsive: true,
        'processing': true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="spinner"></div>',
            'sSearch' : 'بحث :',
            "paginate": {
                "next": "التالي",
                "previous": "السابق"
            },
            "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
        },
        serverSide: true,

        order: [[0, 'desc']],

        buttons: ['copy', 'excel', 'pdf'],

        ajax: "{{ route('Contacts.allData')}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'phone1', name: 'phone1'},
            {data: 'phone2', name: 'phone2'},
            {data: 'team_email', name: 'team_email'},
            {data: 'help_email', name: 'help_email'},
            {data: 'address', name: 'address'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#formSubmit').submit(function (e) {
        e.preventDefault();
        saveOrUpdate( "{{ route('Contacts.update') }}");
    });


    function editFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadEdit_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/Contacts/edit/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadEdit_' + id).css({'display': 'none'});

                $('#save').text('تعديل');

                $('#titleOfModel').text(' تعديل المعلومات');

                $('#formSubmit')[0].reset();

                $('#formModel').modal();

                $('#lat').val(data.lat);
                $('#lng').val(data.lng);
                $('#phone1').val(data.phone1);
                $('#phone2').val(data.phone2);
                $('#team_email').val(data.team_email);
                $('#help_email').val(data.help_email);
                $('#address').val(data.address);
                $('#id').val(data.id);
            }
        });
    }

</script>

