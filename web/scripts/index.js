const searchBox = document.querySelector('.search-box');

searchBox.addEventListener('keydown', (event) => {
    const cancelBtn = document.getElementById('btn-cancel');
    if (searchBox.value.length > 0) {
        cancelBtn.style.display = "block";
    } else {
        cancelBtn.style.display = "none";
    }
});

function clearSearchBox() {
    document.querySelector('.search-box').value = '';
}

async function handleSubmit(event) {
    event.preventDefault();
    const inputValue = document.querySelector('.search-box').value;
    const searchQuery = inputValue.trim();

    document.querySelector('.search-container').style.height = "65vh";

    const searchResults = document.querySelector('.search-results');
    searchResults.innerHTML = '';

    const spinner = document.querySelector('.loading-indicator');
    spinner.classList.remove('hidden');

    try {
        const results = await searchWikipedia(searchQuery);

        if (results.query.searchinfo.totalhits === 0) {
            alert(`No results found for ${searchQuery}. Try different keywords.`);
            return;
        }
        displayResults(results);
    } catch (err) {
        console.log(err);
        alert('Failed to search Wikipedia.');
    } finally {
        spinner.classList.add('hidden');
    }
}

async function searchWikipedia(searchQuery) {
    const modifiedSearchQuery = searchQuery + " natural disasters ";
    const endpoint = `https://en.wikipedia.org/w/api.php?action=query&list=search&prop=info&inprop=url&utf8=&format=json&origin=*&srlimit=20&srsearch=${modifiedSearchQuery}`;
    const response = await fetch(endpoint);
    if (!response.ok) {
        throw Error(response.statusText);
    }
    const json = await response.json();
    return json;
}

function displayResults(results) {
    const searchResults = document.querySelector('.search-results');
    const inputValue = document.querySelector('.search-box').value;
    document.querySelector('.found-results-text').textContent = `Search results for "${inputValue}":`;

    results.query.search.forEach(result => {
        const url = `https://en.wikipedia.org/?curid=${result.pageid}`;

        searchResults.insertAdjacentHTML(
            'beforeend',
            `<div class="result-item">
                <h3 class="result-title">
                    <a href="${url}" target="_blank" rel="noopener">${result.title}</a>
                </h3>
                <a href="${url}" class="result-link" target="_blank" rel="noopener">${url}</a>
                <span class="result-snippet">${result.snippet}</span>
            </div>`
        );
    });
}

const form = document.querySelector('.search-form');
form.addEventListener('submit', handleSubmit);
