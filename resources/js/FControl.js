const FControl = {
    appendSelectOptions: function ($el, data, type) {
        let opt = data.map(value => {
            return $('<option>').val(value.id).text(value.name).attr({
                'data-location': `{"latitude":${value.latitude}, "longitude":${value.longitude}}`
            })
        });
        $el.html(opt, type);
        $el.prepend($('<option>').text('Please select your zone').attr({
            'disabled': true,
            'selected': true
        }))
    },
    hide: function ($el) {
        $el.parent('div').hide()
    },
    show: function ($el) {
        $el.parent('div').show()
    }
}

export default FControl;
