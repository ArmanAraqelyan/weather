const LocationAPI = {
    onFailure: (err) => {
        console.error(err.message)
    },
    getCountryLocationData: function (countryId, onSuccess, onFailure = this.onFailure) {
        $.ajax({
            type: 'GET',
            url: `/country/${countryId}`,
            success: onSuccess,
            error: onFailure
        })
    },
    getStateLocationData: function (stateId, onSuccess, onFailure = this.onFailure) {
        $.ajax({
            type: 'GET',
            url: `/state/${stateId}`,
            success: onSuccess,
            error: onFailure
        })
    },
}

export default LocationAPI;
