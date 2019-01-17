<a  class="btn btn-app" id="saveSetBtn" title="Wieder hoch scrollen?"><i class="material-icons fa-save-my">save</i></a>
<style>
    #saveSetBtn {
        position: fixed; /* Fixed/sticky position */
        bottom: 10%;
        right: 5%;
        z-index: 99; /* Make sure it does not overlap */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        background: #0CEA42;
        border: transparent;

    }

    #saveSetBtn:hover {
        background-color: #017a41; /* Add a dark-grey background on hover */
    }
    .material-icons.fa-save-my{
        position: relative;
        color: white;
        top: -3%;
    }
</style>