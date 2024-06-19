import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import $ from 'jquery';
window.$ = window.jQuery = $;

function showEditForm(userId) {
    document.getElementById('edit-form-' + userId).classList.remove('hidden');
}

function hideEditForm(userId) {
    document.getElementById('edit-form-' + userId).classList.add('hidden');
}

function deleteUser(userId) {
    if (confirm('Czy na pewno chcesz usunąć tego użytkownika?')) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: `/admin/user/${userId}`,
            type: 'DELETE',
            dataType: 'json',
            success: function(data) {
                alert('Użytkownik został pomyślnie usunięty.');
                window.location.reload();
            },
            error: function(error) {
                console.error('Błąd:', error);
                alert('Wystąpił problem podczas usuwania użytkownika.');
            }
        });
    }
}

window.showEditForm = showEditForm;
window.hideEditForm = hideEditForm;
window.deleteUser = deleteUser;