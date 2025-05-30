<div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 2%;border: 1px solid #becdff;">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Title</label>
            {{Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => 'Meta Title'])}}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Keyword </label>
            {{Form::text('meta_keyword', old('meta_keyword'), ['class' => 'form-control', 'placeholder' => 'Meta Keyword'])}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Description</label>
            {{Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => 'Meta Description','rows' => 5])}}
        </div>
    </div>
</div>
