<style>
    /* Sidebar panel styles */
    .sidebar-panel {
        position: fixed;
        top: 0;
        right: 0;
        height: 100%;
        width: 300px; /* Set the width of the panel */
        background-color: #f8f9fa;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        overflow-y: auto;
        z-index: 1050; /* Ensure it's on top of other elements */
        transform: translateX(100%); /* Initially hidden off-screen */
        transition: transform 0.3s ease-in-out; /* Smooth slide-in effect */
    }

    /* Show the sidebar panel when it's collapsed */
    .collapse.show .sidebar-panel {
        transform: translateX(0); /* Slide in from the right */
    }

    /* Close button styles */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        background: none;
        border: none;
        color: #333;
        cursor: pointer;
    }
    .close-btn:hover {
        color: #000;
    }
</style>


<div class="card card-body sidebar-panel">

    <button type="button" class="close-btn" onclick="closeSidebar()">&times;</button>


    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
</div>


<script>
    function closeSidebar() {
        $('#collapseExample').collapse('hide'); // Hide the panel
    }
</script>
