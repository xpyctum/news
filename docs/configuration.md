Configuration
=============

## Base 

``` php
    'bootstrap' => [..., 'roboapp\news\Bootstrap', ...],
    'modules' => [
        ...
        'news' => [
            'class' => 'roboapp\news\Module',
            
            'redactorOptions' => [
                'clientOptions' => [
                    'minHeight' => 400,
                    'imageUpload' => Url::to(['storage/file/upload']),
                    'plugins' => ['fullscreen']
                ]
            ]
        ]
        ...
    ],
```

## Overwrite model

If you need to extend base News model then you can overwrite it:

``` php
    'bootstrap' => [
        ..., '
        [
            'class' => 'roboapp\news\Bootstrap', 
            'modelClass' => YouPage::class
        ]
        ...
    ],
```

or 

``` php
    Yii::$container->set(roboapp\news\models\News::class, function(){
        ...
    })
```
## Overwrite views

If you need to extend base views then you can overwrite it:

``` php
'components' => [
    'view' => [
        'theme' => [
            'pathMap' => [
                '@roboapp/news/views' => '@app/path/to/yours/view'
            ],
        ],
    ],
],
```

In the above pathMap means that every view in @roboapp/news/views will be first searched under @app/path/to/yours/view and if a view exists in the theme directory it will be used instead of the original view.

## Overwrite controller

If you need to extend base controller then you can overwrite it:

``` php
    'modules' => [
        ...
        'news' => [
            'class' => 'roboapp\news\Module',
            'controllerMap' =>  [
                'admin' => 'namespace\for\yours\AdminController'
            ]
        ]
        ...
    ],
```