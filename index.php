<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Randle</title>
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/randle.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Fredericka+the+Great" />
</head>
<body>
<div class="row">
    <div class="span4">
        &nbsp;
    </div>
    <div class="span8">
        <h1>Randle</h1>
        <ul class="pills">
            <li class="active"><a href="#about">About</a></li>
            <li><a href="#random">Random</a></li>
            <li><a href="#pattern">Pattern</a></li>
            <li><a href="#code">Code</a></li>
        </ul><!--tabs-->
        <div class="pill-content">
            <div class="tab-pane active" id='about'>
                <h2>About</h2>
                <p>Randle is a small, simple app meant to ease the creation of random (and pseudo-random) passwords and
                strings.</p>
                <ul>
                    <li>Create strings with pattern recognition</li>
                    <li>Allows literal characters to be inserted into patterns</li>
                    <li>Specify the types of characters allowed: lowercase letters, uppercase letters, numbers, and symbols</li>
                    <li>In full random mode, determine the minimum and maximun number of characters allowed.</li>
                    <li>Coming Soon: ability to limit to specific letters, numbers, and symbols.</li>
                </ul>
                <p>Developed by <a href="http://gingerboydev.com/">Bradley Staples</a> with
                <a href="http://twitter.github.com/bootstrap/">Twitter's Bootstrap toolkit</a>.</p>
            </div><!--about-->
            <div class="pill-pane" id='random'>
                <h2>Random Generation</h2>
                <form id="randomform">
                    <div class="clearfix">
                        <label for="minrandom" class="label">Min # of characters</label>
                        <div class="input">
                            <input type="text" class="mini" name="min" id="minrandom" value="6" />
                        </div><!--input-->
                        <p>Must be 1 or larger.</p>
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="maxrandom" class="label">Max # of characters</label>
                        <div class="input">
                            <input type="text" class="mini" name="max" id="maxrandom" value="8" />
                        </div><!--input-->
                        <p>Must be 1 or larger.</p>
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="upperCaseOn" class="label">Uppercase Letters</label>
                        <div class="input">
                            <select class="mini" name="upperCaseOn" id="upperCaseOn">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="lowerCase" class="label">Lowercase Letters</label>
                        <div class="input">
                            <select class="mini" name="lowerCaseOn" id="lowerCase">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="numbersOn" class="label">Numeric Digits</label>
                        <div class="input">
                            <select class="mini" name="numbersOn" id="numbersOn">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="symbolsOn" class="label">Common Symbols</label>
                        <div class="input">
                            <select class="mini" name="symbolsOn" id="symbolsOn">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div><!--input-->
                        <p>Symbols include: <strong>~ ! @ # $ % ^ & * ( ) - = + ?</strong></p>
                    </div><!--clearfix-->
                    <input type="button" id="randonbutton" class="btn primary" value="Generate" />
                     <input type="hidden" name="method" value="length" />
                    <div id="randomresult"></div>
                </form>
            </div><!--random-->
            <div class="pill-pane" id='pattern'>
                <h2>Pattern Generation</h2>
                <form id="patternform">
                    <p>You can manually enter text in the Pattern Entry field or use the provided buttons for controlled
                        placement of random characters. Text entered manually in the Pattern Entry field are treated
                        as literal characters.</p>
                    <div class="clearfix">
                        <label for="patternfield" class="label">Pattern Entry</label>
                        <div class="input">
                            <div class="xlarge" id="patternfield" contenteditable="true"></div>
                            <input type="hidden" name="template" />
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="addLower" class="label">Random LowerCase</label>
                        <div class="input">
                            <input type="button" class="mini btn" id="addLower" value="Add" />
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="addUpper" class="label">Random Uppercase</label>
                        <div class="input">
                            <input type="button" class="mini btn" id="addUpper" value="Add" />
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="addNumber" class="label">Random Number</label>
                        <div class="input">
                            <input type="button" class="mini btn" id="addNumber" value="Add" />
                        </div><!--input-->
                    </div><!--clearfix-->
                    <div class="clearfix">
                        <label for="addSymbol" class="label">Random Symbol</label>
                        <div class="input">
                            <input type="button" class="mini btn" id="addSymbol" value="Add" />
                        </div><!--input-->
                    </div><!--clearfix-->
					<div class="clearfix">
                        <label for="addRandom" class="label">Random Character</label>
                        <div class="input">
                            <input type="button" class="mini btn" id="addRandom" value="Add" />
                        </div><!--input-->
                    </div><!--clearfix-->
                    <input type="button" id="patternbutton" class="btn primary" value="Generate" />
                    <div id="patternresult"></div>
                     <input type="hidden" name="method" value="pattern" />
                </form>

            </div><!--pattern-->
            <div class="tab-pane" id='code'>
                <h2>Code</h2>
            </div><!--code-->
        </div><!--tabcontent-->
    </div><!--span8-->
    <div class="span4">
        &nbsp;
    </div>
</div><!--row-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/bootstrap-tabs.js"></script>
<script src="js/jquery.lettering.js"></script>
<script src="js/randle.js"></script>
</body>
</html>