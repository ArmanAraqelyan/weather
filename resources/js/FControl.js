const FControl = {
    appendSelectOptions: function ($el, options, type) {
        $el.html(this.getSelectOptionsHTML(options, type));
    },
    getSelectOptionsHTML: function (options, type) {
         let html = `<option value="0" data-id="0" disabled selected>Please select your ${type === 'states' ? 'state' : 'city' }</option>`
         options.forEach( value =>
            html += `<option value=${value.id} data-location='{"latitude":${value.latitude}, "longitude":${value.longitude}}'>${value.name}</option>`
         )
         return html;
    },
    hide: function ($el) {
        $el.parent('div').hide()
    },
    show: function ($el) {
        $el.parent('div').show()
    }
}

export default FControl;
