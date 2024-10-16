// filter.js

function redirectToCategory(select) {
    const slug = select.value;
    if (slug) {
        window.location.href = `/chefs/${slug}`;
    } else {
        window.location.href = '/chefs'; // Redirect to all chefs if no category selected
    }
}
