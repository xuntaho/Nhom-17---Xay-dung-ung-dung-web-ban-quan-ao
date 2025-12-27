<div class="search-box">
    <input id="searchInput" type="text" placeholder="Tìm kiếm..." class="search"
           value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

    <i class="fa fa-search search-icon" onclick="doSearch()"></i>
</div>

<script>
function doSearch() {
    let key = document.getElementById("searchInput").value.trim();
    if (key !== "") {
        window.location.href = "index.php?search=" + encodeURIComponent(key) + "#products";
    }
}

document.getElementById("searchInput").addEventListener("keyup", function(e) {
    if (e.key === "Enter") {
        doSearch();
    }
});
</script>
