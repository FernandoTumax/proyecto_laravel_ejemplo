function createURL(slug){
    slug = slug.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    slug = slug.replace(/^\s+|\s+$/gm, '');
    slug = slug.replace(/\s+/g, '-');
    const input = document.getElementById('url');
    input.value = slug;

    document.getElementById("text-url").innerHTML = slug;
}