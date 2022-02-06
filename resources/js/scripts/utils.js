function resetForm($form)
{
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
}

function populateForm($form, data)
{
    resetForm($form);
    $.each(data, function(key, value) {
        let $ctrl = $form.find('[name='+key+']');
        if ($ctrl.is('select')){
            $('option', $ctrl).each(function() {
                if (this.value === value)
                    this.selected = true;
            });
        } else if ($ctrl.is('textarea')) {
            $ctrl.val(value);
        } else {
            switch($ctrl.attr("type")) {
                case "email":
                case "text":
                case "hidden":
                    $ctrl.val(value);
                    break;
                case "checkbox":
                    if (value === '1')
                        $ctrl.prop('checked', true);
                    else
                        $ctrl.prop('checked', false);
                    break;
            }
        }
    });
};
