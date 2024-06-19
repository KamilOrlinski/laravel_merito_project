import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function showEditForm(userId) {
    document.getElementById('edit-form-' + userId).classList.remove('hidden');
}

function hideEditForm(userId) {
    document.getElementById('edit-form-' + userId).classList.add('hidden');
}

function deleteUser(userId) {
    if (confirm('Czy na pewno chcesz usunąć tego użytkownika?')) {
        $.ajax({
            url: `/admin/user/${userId}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ustawienie tokena CSRF
            },
            success: function(data) {
                // Obsługa sukcesu, np. aktualizacja interfejsu użytkownika
                alert('Użytkownik został pomyślnie usunięty.');
                // Tutaj możesz na przykład odświeżyć listę użytkowników lub zaktualizować widok
                window.location.reload(); // Odświeża stronę po usunięciu użytkownika
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Błąd:', textStatus, errorThrown);
                alert('Wystąpił problem podczas usuwania użytkownika.');
            }
        });
    }
}

window.showEditForm = showEditForm;
window.hideEditForm = hideEditForm;
window.deleteUser = deleteUser;
