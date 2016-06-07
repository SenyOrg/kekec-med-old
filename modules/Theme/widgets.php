<?php

use \Illuminate\Support\HtmlString as HtmlString;

/**
 * IText
 */
\Form::macro('itext', function($label = '', $name,  $value= null, $attributes = ['placeholder' => '']) {
    return new HtmlString(view('macros.form.text', compact('name', 'label', 'value', 'attributes'))->render());
});

/**
 * IText
 */
\Form::macro('idate', function($label = '', $name,  $value= null, $attributes = ['placeholder' => '']) {
    return new \Illuminate\Support\HtmlString(view('macros.form.date', compact('name', 'label', 'value', 'attributes'))->render());
});

/**
 * IText
 */
\Form::macro('iphone', function($label = '', $name,  $value= null, $attributes = ['placeholder' => '']) {
    return new \Illuminate\Support\HtmlString(view('macros.form.phone', compact('name', 'label', 'value', 'attributes'))->render());
});

/**
 * IMobile
 */
\Form::macro('imobile', function($label = '', $name,  $value= null, $attributes = ['placeholder' => '']) {
    return new \Illuminate\Support\HtmlString(view('macros.form.mobile', compact('name', 'label', 'value', 'attributes'))->render());
});

/**
 * IEmail
 */
\Form::macro('iemail', function($label = '', $name,  $value= null, $attributes = ['placeholder' => '']) {
    return new \Illuminate\Support\HtmlString(view('macros.form.email', compact('name', 'label', 'value', 'attributes'))->render());
});

/**
 * IFile
 */
\Form::macro('ifile', function($label = '', $name, $value= null, $attributes = ['placeholder' => '']) {
    return new \Illuminate\Support\HtmlString(view('macros.form.file', compact('name', 'label', 'value', 'attributes'))->render());
});

/**
 * ISelectbox
 */
\Form::macro('iselectbox', function($label = '', $name, $values=[], $attributes = ['placeholder' => '']) {
    $values = array_prepend($values, '', -1);
    return new \Illuminate\Support\HtmlString(view('macros.form.selectbox', compact('name', 'label', 'values', 'attributes'))->render());
});

\Form::macro('iselect2', function($label = '', $name, $values=[], $attributes = ['placeholder' => '']) {
    if (!is_array($values)) {
        $values = $values::lists('title', 'id')->toArray();
    }
    $values = array_prepend($values, '', -1);
    return new \Illuminate\Support\HtmlString(view('macros.form.select2', compact('name', 'label', 'values', 'attributes'))->render());
});


class TagCreator {

    public function create($tag, $contents, $attributes = array())
    {
        $attributes = HTML::attributes($attributes);

        return "<{$tag}{$attributes}>{$contents}</{$tag}>";
    }

}

class HTMLWidget {

    protected $tag;

    public function __construct(TagCreator $tag)
    {
        $this->tag = $tag;
    }

    public function p($contents, $attributes = array())
    {
        return $this->tag->create('p', $contents, $attributes);
    }

    public function div($contents, $attributes = array())
    {
        return $this->tag->create('div', $contents, $attributes);
    }
}

class BootstrapWidget {
    
}


Widget::register('p', 'HTMLWidget@p');

Widget::register('div', 'HTMLWidget@div');
