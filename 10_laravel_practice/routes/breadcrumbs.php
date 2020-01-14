<?php

Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->push('Register', route('register'));
});

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('books.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Books', route('books.index'));
});

Breadcrumbs::for('books.create', function ($trail) {
    $trail->parent('books.index');
    $trail->push('Create', route('books.create'));
});

Breadcrumbs::for('books.show', function ($trail, $books) {
    $trail->parent('books.index');
    $trail->push($books->title, route('books.show', $books));
});

Breadcrumbs::for('books.edit', function ($trail, $books) {
    $trail->parent('books.show', $books);
    $trail->push('Edit', route('books.edit', $books));
});

Breadcrumbs::for('comments.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Comments', route('comments.index'));
});

Breadcrumbs::for('comments.show', function ($trail, $comment) {
    $trail->parent('comments.index');
    $trail->push($comment->title, route('comments.show', $comment));
});

Breadcrumbs::for('posts.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Posts', route('posts.index'));
});

Breadcrumbs::for('vue', function ($trail) {
    $trail->parent('home');
    $trail->push('Vue', route('vue'));
});
