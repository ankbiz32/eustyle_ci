<style>
    .wrapper.error{
        text-align:center;
        padding:8rem 0;
    }
    .h1{
        font-size:60px;
        font-weight:800;
        color:#555;
    }
    .h3{
        font-size:40px;
        font-weight:600;
        margin:1rem 0 2rem;
        color:#555;
    }
    a.track{
        cursor:pointer;
        padding:1.5rem 3rem;
        background-color:#FF9C0C;
        color:white;
        font-size:20px;
        font-weight:600;
        display:inline-block;
        transition:0.2s;
        border-radius:10px;
    }
    a.track:hover{
        opacity:0.8;
    }

</style>

<section>
    <div class="wrapper error">
        <h1 class="h1">404</h1>
        <h3 class="h3"> Looks like you are lost ! </h3>
        <a class="js-tilt track text-white" onclick="window.history.back()">←&nbsp; Let's get you back on track</a>
    </div>
</section>