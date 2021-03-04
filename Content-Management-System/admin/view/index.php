<?php require adminView('static/header') ?>

<div class="box-container">
    <div class="box" id="div-0">
        <h3>Title was here!</h3>
        <div class="box-content">
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
</div>

<div class="box-container container-25">
    <div class="box" id="div-1">
        <h3>
            Quick Draft
        </h3>
        <div class="box-content">
            <form action="" class="form">
                <ul>
                    <li>
                        <input type="text" id="input" placeholder="Title">
                    </li>
                    <li>
                        <textarea name="" id="" cols="30" rows="5" placeholder="Whats on your mind?"></textarea>
                    </li>
                    <li>
                        <button type="submit">Submit</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<div class="box-container container-50">
    <div class="box" id="div-2">
        <h3>
            Activity
        </h3>
        <div class="box-content">
            Write Something
        </div>
    </div>
</div>

<div class="box-container container-25">
    <div class="box" id="div-3">
        <h3>
            Quick Draft
        </h3>
        <div class="box-content">
            <form action="" class="form">
                <ul>
                    <li>
                        <label for="title" class="title">Title</label>
                        <input type="text" id="title">
                    </li>
                    <li>
                        <label for="message" class="title">Whats on your mind?</label>
                        <textarea name="" id="message" cols="30" rows="5"></textarea>
                    </li>
                    <li>
                        <button type="submit">Submit</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<?php require adminView('static/footer') ?>