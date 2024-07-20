function searchGoogleScholar() {
    var query = document.getElementById('search-input').value;
    if (query.trim() !== '') {
        window.location.href = 'https://scholar.google.com/scholar?q=' + encodeURIComponent(query);
    }
}