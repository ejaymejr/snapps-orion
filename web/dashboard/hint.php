<!DOCTYPE html>
<html>
<?php include_once 'header.php' ?>
<body class="metro">
    <header class="bg-dark" data-load="header.html"></header>
    <div class="container">
                <h1>
                    <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                    Hint<small class="on-right">plugin</small>
                </h1>

                <p>
                    Metro UI CSS provides plugin to the ability to create tooltips for any elements. Positioned as a replacement attribute title. This method required plugin <code>metro-hint.js</code>
                </p>

                <div class="example">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        <span data-hint="Hint|Hint test. It was popularised in the 1960s with the release" data-hint-position="top" class="fg-red">Top hint</span> has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has <span data-hint="Hint|Hint test. It was popularised in the 1960s with the release" data-hint-position="bottom" class="fg-red">bottom hint</span> not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of
                        <span data-hint="Hint|Hint test. It was popularised in the 1960s with the release" data-hint-position="left" class="fg-red">Left hint</span> sheets containing Lorem Ipsum
                        <span data-hint="Hint|Hint test. It was popularised in the 1960s with the release" data-hint-position="right" class="fg-red">Right hint</span>, and more recently with desktop publishing
                        software like Aldus PageMaker including versions of.
                    </p>
                </div>

                <div class="example">
                    <div class="grid fluid">
                        <div class="row">
                            <div class="span3">
                                <div class="text-center padding10 border" data-hint="Title|This is a hint for element. Hint can be written as html.">Hint on bottom</div>
                            </div>
                            <div class="span3">
                                <div class="text-center padding10 border" data-hint-position="top" data-hint="Title|This is a hint for element. Hint can be written as html.">Hint on top</div>
                            </div>
                            <div class="span3">
                                <div class="text-center padding10 border" data-hint-position="right" data-hint="Title|This is a hint for element. Hint can be written as html.">Hint on right</div>
                            </div>
                            <div class="span3">
                                <div class="text-center padding10 border" data-hint-position="left" data-hint="Title|This is a hint for element. Hint can be written as html.">Hint on left</div>
                            </div>
                        </div>
                    </div>
                </div>
                <p>
                    To create hint for element you must add <code>data-hint</code> attribute to element.
                    Default position for hint - bottom on element.
                    To change hint position you can add attribute <code>data-hint-position</code> to element with the following possible values: <code>top</code>, <code>bottom</code>, <code>left</code> or <code>right</code>.
                </p>

<pre class="prettyprint linenums">
&lt;a href="#"
    data-hint="Title|This is a hint for Me"
    data-hint-position="top | bottom | left | right"&gt;
        Hover me...
&lt;/a&gt;
</pre>

                <div class="example">
                    <h3>In table</h3>
                    <table class="table border">
                        <tr>
                            <td data-hint="To change hint position you can add attribute <code>data-hint-position</code>" data-hint-position="top">Test 1</td>
                            <td data-hint="To change hint position you can add attribute <code>data-hint-position</code>" data-hint-position="bottom">Test 2</td>
                            <td data-hint="To change hint position you can add attribute <code>data-hint-position</code>" data-hint-position="right">Test 3</td>
                            <td data-hint="To change hint position you can add attribute <code>data-hint-position</code>" data-hint-position="left">Test 4</td>
                        </tr>
                    </table>
                </div>


    </div>
    <script src="js/hitua.js"></script>

</body>
</html>