

        <x-app-layout>
        <x-slot name="header">
            <h2 class="">
                Creating or Editing a Post
            </h2>
        </x-slot>


        <form>
          <fieldset>
            <fieldset class="form-group">
              <input type="text" name="title" class="" placeholder="Article Title" />
            </fieldset>
            <fieldset class="form-group">
              <input type="text" name="subject" class="" placeholder="What's this article about?" />
            </fieldset>
            <fieldset class="form-group">
              <textarea
                class="form-control"
                rows="8"
                placeholder="Write your article (in markdown)"
              ></textarea>
            </fieldset>
            <fieldset class="form-group">
              <input type="text" name="tag" class="form-control" placeholder="Enter tags" />
              <div class="tag-list">
                <span class="tag-default tag-pill"> <i class="ion-close-round"></i> tag </span>
              </div>
            </fieldset>

            <x-primary-button class="mt-4">
              Publish Article
            </x-primary-button>
          </fieldset>
        </form>

        </x-app-layout>
