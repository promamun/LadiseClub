

'use strict';

(function () {
  //  For Datatable
  // --------------------------------------------------------------------
  var dt_projects_table = $('.datatables-aboutUs');
  var assetsPath = document.querySelector('meta[name="assetPath"]').getAttribute('content');
  if (dt_projects_table.length) {
    var dt_project = dt_projects_table.DataTable({
      ajax: {
        url: '/api/about-us-list',
        type: 'GET',
        dataType: 'json',
        dataSrc: 'data' // If your API returns data within a specific key, specify it here
      },
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'image',
          render: function (data, type, full, meta) {
            var $team = full['image'],
              $output;
            $output = '<div class="d-flex align-items-center avatar-group">';
            $output +=
                '<div class="avatar avatar-xl">' +
                '<img src="' +
                assetsPath +
                'aboutUs/' +
                $team +
                '" alt="Avatar" class="rounded-circle pull-up">' +
                '</div>';
            $output += '</div>';
            return $output;
          }
        },
        { data: '',
          render: function (data, type, full, meta) {
            var editUrl = assetsPath + 'admin/about-us/edit/' + full.id; // Assuming full.id contains the member's ID
            var deleteUrl = assetsPath + 'admin/about-us/delete/' + full.id; // Assuming full.id contains the member's ID
            return (
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="'+ editUrl +'" class="dropdown-item">Edit</a>' +
              '<div class="dropdown-divider"></div>' +
              '<a href="javascript:;" data-delete-url="'+deleteUrl+'" class="dropdown-item text-danger delete-record">Delete</a>' +
              '</div>' +
              '</div>'
            );
          }
       }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          searchable: false,
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          searchable: false,
          responsivePriority: 3,
          checkboxes: true,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [5, 10, 25, 50, 75, 100],
      buttons: [
        {
          text: '<i class="ti ti-plus me-sm-1"></i><span class="d-none d-sm-inline-block">Add New About Us</span>',
          className: 'create-new btn btn-primary waves-effect waves-light'
        }
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of "' + data['name'] + '" About Us';
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
    $('div.head-label').html('<h5 class="card-title mb-0">About Us</h5>');
  }
  // Add aboutUs listener to the button to navigate to the URL
  $('.create-new').on('click', function() {
    var addUrl = assetsPath+'admin/about-us/add';
    window.location.href = addUrl;
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);

})();
$(document).on('click', '.delete-record', function() {
  var deleteUrl = $(this).data('delete-url');
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
     // Perform the AJAX request
     $.ajax({
      url: deleteUrl, // Use the deleteUrl variable here
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Handle the success response here, if needed
        // For example, you can show a success message using Swal.fire
        Swal.fire({
          title: 'Deleted!',
          text: response.success,
          icon: 'success',
          showCancelButton: false,
          showOKButton: false,
        }).then((result=>{
          window.location.reload();
        }));
      },
      error: function(xhr, status, error) {
        // Handle any errors that occur during the AJAX request
        // For example, you can show an error message using Swal.fire
        Swal.fire('Error!', error.response.data, 'error');
      }
    });
    }
  });
});
