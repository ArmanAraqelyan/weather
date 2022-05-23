const WeatherAPI = {
    onFailure: (err) => {
        console.error(err.message)
    },
    getTemperature: function (params, onSuccess, onFailure = this.onFailure) {
        $.ajax({
            type: 'POST',
            url: '/weather',
            data: params,
            success: onSuccess,
            error: onFailure
        })
    },
}

export default WeatherAPI;
