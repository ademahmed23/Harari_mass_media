<!-- start post Reaction -->
<div>
    <div class="row">
        <div class="post-reaction">
            <h4 class="title-reactions mt-3 mb-3">What's Your Reaction ?</h4>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::LIKE}}"
                              data-post="{{$postId}}">&#128512;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[2]) ? count($countEmoji[2]) : 0}}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::DISLIKE}}"
                              data-post="{{$postId}}">&#128528;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[2]) ? count($countEmoji[2]) : 0}}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::FUNNY}}"
                              data-post="{{$postId}}">&#128514;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[3]) ? count($countEmoji[3]) : 0}}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::LOVE}}"
                              data-post="{{$postId}}">&#128536;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[4]) ? count($countEmoji[4]) : 0}}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::ANGRY}}"
                              data-post="{{$postId}}">&#128545;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[5]) ? count($countEmoji[5]) : 0}}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::SAD}}"
                              data-post="{{$postId}}">&#128557;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[6]) ? count($countEmoji[6]) : 0}}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{\App\Models\PostReactionEmoji::WOW}}"
                              data-post="{{$postId}}">&#128563;</span>
                        <label class="post-reaction-count">{{isset($countEmoji[7]) ? count($countEmoji[7]) : 0}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end post Reaction -->
