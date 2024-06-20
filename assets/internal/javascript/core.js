//---utils

const confirmAction = async (message = 'Are you sure you want to continue?') => {
    return Swal.fire({
        title: message,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        customClass: {
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            return true;
        } else {
            return false;
        }
    })
}





// --- DOC READY
$(function () {
    $('[data-action="register"]').on('click', async (e) => {

        const initiatorElement = e.originalEvent.target

        if (!await confirmAction()) {
            return false;
        }

        //---collect data
        const target = $(initiatorElement).closest('form');
        const email = $('input[type="email"]', target).val();
        const pass = $('input[type="password"]', target).val();

        if (!email || !pass) {
            alert('email or pass can not be blank!');
            return false;
        }

        $.ajax({
            url: window.location.hostname,
            type: 'POST',
            data: {
                'test': 10
            },
            dataType: 'json',
            beforeSend: function () {
                $(initiatorElement).addClass('disabled').prop('disabled', true);
            },
            success: function (data) {
                alert('Data: ' + data);
            },
            error: function (request, error) {
                alert("Request: " + JSON.stringify(request));
            },
            complete: function () {
                $(initiatorElement).removeClass('disabled').prop('disabled', false);
            }
        });

    });

    $('[data-action="login"]').on('click', () => {
        console.log('login');
    });
});