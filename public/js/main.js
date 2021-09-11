  $('#chk').on('change', function(){
        $('input[class=id]').not(this).prop('checked', this.checked);
      });

  $('#validerbulletin').on('change', function(){
        $('input[class=valider_bulletin]').not(this).prop('checked', this.checked);
      });

 $('#bulletin_id').on('change', function(){
        $('input[class=bulletin_id]').not(this).prop('checked', this.checked);
      });