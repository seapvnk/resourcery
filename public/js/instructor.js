Zepto(() => {

    $('.btn-delete-course').click(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Deseja mesmo excluir esse curso?',
            showCancelButton: true,
            confirmButtonText: `Excluir`,
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire('Excluindo curso!', '', 'success')
              $(`#course-delete-${$(this).attr('course-id')}`).submit()
            }
        })
    })

})
