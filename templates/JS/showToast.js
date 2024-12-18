function showToast(type, message) {
    var toastContainer = document.getElementById('toast-container');
    
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.classList.add('toast-container');
        document.body.appendChild(toastContainer);
    }

    var toast = document.createElement('div');
    toast.className = 'toast show toast-top'; 
    if (type === 'success') {
        toast.classList.add('toast-success');
    } else if (type === 'error') {
        toast.classList.add('toast-error');
    }

    var toastBody = document.createElement('div');
    toastBody.className = 'toast-body';
    toastBody.textContent = message;
    toast.appendChild(toastBody);
    toastContainer.appendChild(toast);

    setTimeout(function() {
        toast.classList.add('hide'); 
        setTimeout(function() {
            toast.parentNode.removeChild(toast); 
        }, 300); 
    }, 5000); 
}
