$(function() {
    console.log('1234354');
    $('.confirm-delete').on('click', function (event) {
        event.preventDefault();
        var button = this; // ou event.currentTarget
        // Plugin Sweet Alert
        swal({
           title: 'Êtes-vous sûr.e de vouloir supprimer la brasserie ?',
           text: 'vous ne pourrez plus goûter les bières de cette brasserie.',
           icon: 'warning',
           buttons: true,
           dangerMode: true,
        }).then(function (hasConfirm) { // Il veut supprimer la brasserie
           if (hasConfirm) {
               window.location = $(button).attr('href');
           };
        });
      });
    });