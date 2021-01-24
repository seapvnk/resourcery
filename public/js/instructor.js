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

    $('.btn-delete-section').click(function(e) {
      e.preventDefault();

      Swal.fire({
          title: 'Deseja mesmo excluir essa seção?',
          showCancelButton: true,
          confirmButtonText: `Excluir`,
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire('Excluindo seção!', '', 'success')
            $(`#section-delete-${$(this).attr('section-id')}`).submit()
          }
      })
      
  })
  
  $('.btn-delete-content').click(function(e) {
      e.preventDefault();

      Swal.fire({
          title: 'Deseja mesmo excluir esse conteúdo?',
          showCancelButton: true,
          confirmButtonText: `Excluir`,
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire('Excluindo conteúdo!', '', 'success')
            $(`#content-delete-${$(this).attr('content-id')}`).submit()
          }
      })
      
  })

})
