/*
 * SimpleViewer-Pro v2.1.3
 * http://simpleviewer.net/simpleviewer/pro
 *
 * © 2011 SimpleViewer Inc. All rights reserved.
 *
 */
var SV = SV ? SV : {};
SV.simpleviewer = {};
var simpleviewer = SV.simpleviewer;
(function (u, w) {
    var x = u.document;
    var y = (function () {
        var h = function (a, b) {
                return new h.fn.init(a, b, rootjQuery)
            },
            _jQuery = simpleviewer.jQuery,
            _$ = simpleviewer.$,
            rootjQuery, quickExpr = /^(?:[^<]*(<[\w\W]+>)[^>]*$|#([\w\-]+)$)/,
            rnotwhite = /\S/,
            trimLeft = /^\s+/,
            trimRight = /\s+$/,
            rdigit = /\d/,
            rsingleTag = /^<(\w+)\s*\/?>(?:<\/\1>)?$/,
            rvalidchars = /^[\],:{}\s]*$/,
            rvalidescape = /\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,
            rvalidtokens = /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
            rvalidbraces = /(?:^|:|,)(?:\s*\[)+/g,
            rwebkit = /(webkit)[ \/]([\w.]+)/,
            ropera = /(opera)(?:.*version)?[ \/]([\w.]+)/,
            rmsie = /(msie) ([\w.]+)/,
            rmozilla = /(mozilla)(?:.*? rv:([\w.]+))?/,
            userAgent = navigator.userAgent,
            browserMatch, readyList, DOMContentLoaded, toString = Object.prototype.toString,
            hasOwn = Object.prototype.hasOwnProperty,
            push = Array.prototype.push,
            slice = Array.prototype.slice,
            trim = String.prototype.trim,
            indexOf = Array.prototype.indexOf,
            class2type = {};
        h.fn = h.prototype = {
            constructor: h,
            init: function (a, b, c) {
                var d, elem, ret, doc;
                if (!a) {
                    return this
                }
                if (a.nodeType) {
                    this.context = this[0] = a;
                    this.length = 1;
                    return this
                }
                if (a === "body" && !b && x.body) {
                    this.context = x;
                    this[0] = x.body;
                    this.selector = "body";
                    this.length = 1;
                    return this
                }
                if (typeof a === "string") {
                    d = quickExpr.exec(a);
                    if (d && (d[1] || !b)) {
                        if (d[1]) {
                            b = b instanceof h ? b[0] : b;
                            doc = (b ? b.ownerDocument || b : x);
                            ret = rsingleTag.exec(a);
                            if (ret) {
                                if (h.isPlainObject(b)) {
                                    a = [x.createElement(ret[1])];
                                    h.fn.attr.call(a, b, true)
                                } else {
                                    a = [doc.createElement(ret[1])]
                                }
                            } else {
                                ret = h.buildFragment([d[1]], [doc]);
                                a = (ret.cacheable ? h.clone(ret.fragment) : ret.fragment).childNodes
                            }
                            return h.merge(this, a)
                        } else {
                            elem = x.getElementById(d[2]);
                            if (elem && elem.parentNode) {
                                if (elem.id !== d[2]) {
                                    return c.find(a)
                                }
                                this.length = 1;
                                this[0] = elem
                            }
                            this.context = x;
                            this.selector = a;
                            return this
                        }
                    } else if (!b || b.jquery) {
                        return (b || c).find(a)
                    } else {
                        return this.constructor(b).find(a)
                    }
                } else if (h.isFunction(a)) {
                    return c.ready(a)
                }
                if (a.selector !== w) {
                    this.selector = a.selector;
                    this.context = a.context
                }
                return h.makeArray(a, this)
            },
            selector: "",
            jquery: "1.5.2",
            length: 0,
            size: function () {
                return this.length
            },
            toArray: function () {
                return slice.call(this, 0)
            },
            get: function (a) {
                return a == null ? this.toArray() : (a < 0 ? this[this.length + a] : this[a])
            },
            pushStack: function (a, b, c) {
                var d = this.constructor();
                if (h.isArray(a)) {
                    push.apply(d, a)
                } else {
                    h.merge(d, a)
                }
                d.prevObject = this;
                d.context = this.context;
                if (b === "find") {
                    d.selector = this.selector + (this.selector ? " " : "") + c
                } else if (b) {
                    d.selector = this.selector + "." + b + "(" + c + ")"
                }
                return d
            },
            each: function (a, b) {
                return h.each(this, a, b)
            },
            ready: function (a) {
                h.bindReady();
                readyList.done(a);
                return this
            },
            eq: function (i) {
                return i === -1 ? this.slice(i) : this.slice(i, +i + 1)
            },
            first: function () {
                return this.eq(0)
            },
            last: function () {
                return this.eq(-1)
            },
            slice: function () {
                return this.pushStack(slice.apply(this, arguments), "slice", slice.call(arguments).join(","))
            },
            map: function (b) {
                return this.pushStack(h.map(this, function (a, i) {
                    return b.call(a, i, a)
                }))
            },
            end: function () {
                return this.prevObject || this.constructor(null)
            },
            push: push,
            sort: [].sort,
            splice: [].splice
        };
        h.fn.init.prototype = h.fn;
        h.extend = h.fn.extend = function () {
            var a, name, src, copy, copyIsArray, clone, target = arguments[0] || {},
                i = 1,
                length = arguments.length,
                deep = false;
            if (typeof target === "boolean") {
                deep = target;
                target = arguments[1] || {};
                i = 2
            }
            if (typeof target !== "object" && !h.isFunction(target)) {
                target = {}
            }
            if (length === i) {
                target = this;
                --i
            }
            for (; i < length; i++) {
                if ((a = arguments[i]) != null) {
                    for (name in a) {
                        src = target[name];
                        copy = a[name];
                        if (target === copy) {
                            continue
                        }
                        if (deep && copy && (h.isPlainObject(copy) || (copyIsArray = h.isArray(copy)))) {
                            if (copyIsArray) {
                                copyIsArray = false;
                                clone = src && h.isArray(src) ? src : []
                            } else {
                                clone = src && h.isPlainObject(src) ? src : {}
                            }
                            target[name] = h.extend(deep, clone, copy)
                        } else if (copy !== w) {
                            target[name] = copy
                        }
                    }
                }
            }
            return target
        };
        h.extend({
            noConflict: function (a) {
                simpleviewer.$ = _$;
                if (a) {
                    simpleviewer.jQuery = _jQuery
                }
                return h
            },
            isReady: false,
            readyWait: 1,
            ready: function (a) {
                if (a === true) {
                    h.readyWait--
                }
                if (!h.readyWait || (a !== true && !h.isReady)) {
                    if (!x.body) {
                        return setTimeout(h.ready, 1)
                    }
                    h.isReady = true;
                    if (a !== true && --h.readyWait > 0) {
                        return
                    }
                    readyList.resolveWith(x, [h]);
                    if (h.fn.trigger) {
                        h(x).trigger("ready").unbind("ready")
                    }
                }
            },
            bindReady: function () {
                if (readyList) {
                    return
                }
                readyList = h._Deferred();
                if (x.readyState === "complete") {
                    return setTimeout(h.ready, 1)
                }
                if (x.addEventListener) {
                    x.addEventListener("DOMContentLoaded", DOMContentLoaded, false);
                    u.addEventListener("load", h.ready, false)
                } else if (x.attachEvent) {
                    x.attachEvent("onreadystatechange", DOMContentLoaded);
                    u.attachEvent("onload", h.ready);
                    var a = false;
                    try {
                        a = u.frameElement == null
                    } catch (e) {}
                    if (x.documentElement.doScroll && a) {
                        doScrollCheck()
                    }
                }
            },
            isFunction: function (a) {
                return h.type(a) === "function"
            },
            isArray: Array.isArray ||
            function (a) {
                return h.type(a) === "array"
            },
            isWindow: function (a) {
                return a && typeof a === "object" && "setInterval" in a
            },
            isNaN: function (a) {
                return a == null || !rdigit.test(a) || isNaN(a)
            },
            type: function (a) {
                return a == null ? String(a) : class2type[toString.call(a)] || "object"
            },
            isPlainObject: function (a) {
                if (!a || h.type(a) !== "object" || a.nodeType || h.isWindow(a)) {
                    return false
                }
                if (a.constructor && !hasOwn.call(a, "constructor") && !hasOwn.call(a.constructor.prototype, "isPrototypeOf")) {
                    return false
                }
                var b;
                for (b in a) {}
                return b === w || hasOwn.call(a, b)
            },
            isEmptyObject: function (a) {
                for (var b in a) {
                    return false
                }
                return true
            },
            error: function (a) {
                throw a;
            },
            parseJSON: function (a) {
                if (typeof a !== "string" || !a) {
                    return null
                }
                a = h.trim(a);
                if (rvalidchars.test(a.replace(rvalidescape, "@").replace(rvalidtokens, "]").replace(rvalidbraces, ""))) {
                    return u.JSON && u.JSON.parse ? u.JSON.parse(a) : (new Function("return " + a))()
                } else {
                    h.error("Invalid JSON: " + a)
                }
            },
            parseXML: function (a, b, c) {
                if (u.DOMParser) {
                    c = new DOMParser();
                    b = c.parseFromString(a, "text/xml")
                } else {
                    b = new ActiveXObject("Microsoft.XMLDOM");
                    b.async = "false";
                    b.loadXML(a)
                }
                c = b.documentElement;
                if (!c || !c.nodeName || c.nodeName === "parsererror") {
                    h.error("Invalid XML: " + a)
                }
                return b
            },
            noop: function () {},
            globalEval: function (a) {
                if (a && rnotwhite.test(a)) {
                    var b = x.head || x.getElementsByTagName("head")[0] || x.documentElement,
                        script = x.createElement("script");
                    if (h.support.scriptEval()) {
                        script.appendChild(x.createTextNode(a))
                    } else {
                        script.text = a
                    }
                    b.insertBefore(script, b.firstChild);
                    b.removeChild(script)
                }
            },
            nodeName: function (a, b) {
                return a.nodeName && a.nodeName.toUpperCase() === b.toUpperCase()
            },
            each: function (a, b, c) {
                var d, i = 0,
                    length = a.length,
                    isObj = length === w || h.isFunction(a);
                if (c) {
                    if (isObj) {
                        for (d in a) {
                            if (b.apply(a[d], c) === false) {
                                break
                            }
                        }
                    } else {
                        for (; i < length;) {
                            if (b.apply(a[i++], c) === false) {
                                break
                            }
                        }
                    }
                } else {
                    if (isObj) {
                        for (d in a) {
                            if (b.call(a[d], d, a[d]) === false) {
                                break
                            }
                        }
                    } else {
                        for (var e = a[0]; i < length && b.call(e, i, e) !== false; e = a[++i]) {}
                    }
                }
                return a
            },
            trim: trim ?
            function (a) {
                return a == null ? "" : trim.call(a)
            } : function (a) {
                return a == null ? "" : a.toString().replace(trimLeft, "").replace(trimRight, "")
            },
            makeArray: function (a, b) {
                var c = b || [];
                if (a != null) {
                    var d = h.type(a);
                    if (a.length == null || d === "string" || d === "function" || d === "regexp" || h.isWindow(a)) {
                        push.call(c, a)
                    } else {
                        h.merge(c, a)
                    }
                }
                return c
            },
            inArray: function (a, b) {
                if (b.indexOf) {
                    return b.indexOf(a)
                }
                for (var i = 0, length = b.length; i < length; i++) {
                    if (b[i] === a) {
                        return i
                    }
                }
                return -1
            },
            merge: function (a, b) {
                var i = a.length,
                    j = 0;
                if (typeof b.length === "number") {
                    for (var l = b.length; j < l; j++) {
                        a[i++] = b[j]
                    }
                } else {
                    while (b[j] !== w) {
                        a[i++] = b[j++]
                    }
                }
                a.length = i;
                return a
            },
            grep: function (a, b, c) {
                var d = [],
                    retVal;
                c = !! c;
                for (var i = 0, length = a.length; i < length; i++) {
                    retVal = !! b(a[i], i);
                    if (c !== retVal) {
                        d.push(a[i])
                    }
                }
                return d
            },
            map: function (a, b, c) {
                var d = [],
                    value;
                for (var i = 0, length = a.length; i < length; i++) {
                    value = b(a[i], i, c);
                    if (value != null) {
                        d[d.length] = value
                    }
                }
                return d.concat.apply([], d)
            },
            guid: 1,
            proxy: function (a, b, c) {
                if (arguments.length === 2) {
                    if (typeof b === "string") {
                        c = a;
                        a = c[b];
                        b = w
                    } else if (b && !h.isFunction(b)) {
                        c = b;
                        b = w
                    }
                }
                if (!b && a) {
                    b = function () {
                        return a.apply(c || this, arguments)
                    }
                }
                if (a) {
                    b.guid = a.guid = a.guid || b.guid || h.guid++
                }
                return b
            },
            access: function (a, b, c, d, e, f) {
                var g = a.length;
                if (typeof b === "object") {
                    for (var k in b) {
                        h.access(a, k, b[k], d, e, c)
                    }
                    return a
                }
                if (c !== w) {
                    d = !f && d && h.isFunction(c);
                    for (var i = 0; i < g; i++) {
                        e(a[i], b, d ? c.call(a[i], i, e(a[i], b)) : c, f)
                    }
                    return a
                }
                return g ? e(a[0], b) : w
            },
            now: function () {
                return (new Date()).getTime()
            },
            uaMatch: function (a) {
                a = a.toLowerCase();
                var b = rwebkit.exec(a) || ropera.exec(a) || rmsie.exec(a) || a.indexOf("compatible") < 0 && rmozilla.exec(a) || [];
                return {
                    browser: b[1] || "",
                    version: b[2] || "0"
                }
            },
            sub: function () {
                function jQuerySubclass(a, b) {
                    return new jQuerySubclass.fn.init(a, b)
                }
                h.extend(true, jQuerySubclass, this);
                jQuerySubclass.superclass = this;
                jQuerySubclass.fn = jQuerySubclass.prototype = this();
                jQuerySubclass.fn.constructor = jQuerySubclass;
                jQuerySubclass.subclass = this.subclass;
                jQuerySubclass.fn.init = function init(a, b) {
                    if (b && b instanceof h && !(b instanceof jQuerySubclass)) {
                        b = jQuerySubclass(b)
                    }
                    return h.fn.init.call(this, a, b, c)
                };
                jQuerySubclass.fn.init.prototype = jQuerySubclass.fn;
                var c = jQuerySubclass(x);
                return jQuerySubclass
            },
            browser: {}
        });
        h.each("Boolean Number String Function Array Date RegExp Object".split(" "), function (i, a) {
            class2type["[object " + a + "]"] = a.toLowerCase()
        });
        browserMatch = h.uaMatch(userAgent);
        if (browserMatch.browser) {
            h.browser[browserMatch.browser] = true;
            h.browser.version = browserMatch.version
        }
        if (h.browser.webkit) {
            h.browser.safari = true
        }
        if (indexOf) {
            h.inArray = function (a, b) {
                return indexOf.call(b, a)
            }
        }
        if (rnotwhite.test("\xA0")) {
            trimLeft = /^[\s\xA0]+/;
            trimRight = /[\s\xA0]+$/
        }
        rootjQuery = h(x);
        if (x.addEventListener) {
            DOMContentLoaded = function () {
                x.removeEventListener("DOMContentLoaded", DOMContentLoaded, false);
                h.ready()
            }
        } else if (x.attachEvent) {
            DOMContentLoaded = function () {
                if (x.readyState === "complete") {
                    x.detachEvent("onreadystatechange", DOMContentLoaded);
                    h.ready()
                }
            }
        }
        function doScrollCheck() {
            if (h.isReady) {
                return
            }
            try {
                x.documentElement.doScroll("left")
            } catch (e) {
                setTimeout(doScrollCheck, 1);
                return
            }
            h.ready()
        }
        return h
    })();
    var z = "then done fail isResolved isRejected promise".split(" "),
        sliceDeferred = [].slice;
    y.extend({
        _Deferred: function () {
            var c = [],
                fired, firing, cancelled, deferred = {
                    done: function () {
                        if (!cancelled) {
                            var a = arguments,
                                i, length, elem, type, _fired;
                            if (fired) {
                                _fired = fired;
                                fired = 0
                            }
                            for (i = 0, length = a.length; i < length; i++) {
                                elem = a[i];
                                type = y.type(elem);
                                if (type === "array") {
                                    deferred.done.apply(deferred, elem)
                                } else if (type === "function") {
                                    c.push(elem)
                                }
                            }
                            if (_fired) {
                                deferred.resolveWith(_fired[0], _fired[1])
                            }
                        }
                        return this
                    },
                    resolveWith: function (a, b) {
                        if (!cancelled && !fired && !firing) {
                            b = b || [];
                            firing = 1;
                            try {
                                while (c[0]) {
                                    c.shift().apply(a, b)
                                }
                            } finally {
                                fired = [a, b];
                                firing = 0
                            }
                        }
                        return this
                    },
                    resolve: function () {
                        deferred.resolveWith(this, arguments);
                        return this
                    },
                    isResolved: function () {
                        return !!(firing || fired)
                    },
                    cancel: function () {
                        cancelled = 1;
                        c = [];
                        return this
                    }
                };
            return deferred
        },
        Deferred: function (c) {
            var d = y._Deferred(),
                failDeferred = y._Deferred(),
                promise;
            y.extend(d, {
                then: function (a, b) {
                    d.done(a).fail(b);
                    return this
                },
                fail: failDeferred.done,
                rejectWith: failDeferred.resolveWith,
                reject: failDeferred.resolve,
                isRejected: failDeferred.isResolved,
                promise: function (a) {
                    if (a == null) {
                        if (promise) {
                            return promise
                        }
                        promise = a = {}
                    }
                    var i = z.length;
                    while (i--) {
                        a[z[i]] = d[z[i]]
                    }
                    return a
                }
            });
            d.done(failDeferred.cancel).fail(d.cancel);
            delete d.cancel;
            if (c) {
                c.call(d, d)
            }
            return d
        },
        when: function (b) {
            var c = arguments,
                i = 0,
                length = c.length,
                count = length,
                deferred = length <= 1 && b && y.isFunction(b.promise) ? b : y.Deferred();

            function resolveFunc(i) {
                return function (a) {
                    c[i] = arguments.length > 1 ? sliceDeferred.call(arguments, 0) : a;
                    if (!(--count)) {
                        deferred.resolveWith(deferred, sliceDeferred.call(c, 0))
                    }
                }
            }
            if (length > 1) {
                for (; i < length; i++) {
                    if (c[i] && y.isFunction(c[i].promise)) {
                        c[i].promise().then(resolveFunc(i), deferred.reject)
                    } else {
                        --count
                    }
                }
                if (!count) {
                    deferred.resolveWith(deferred, c)
                }
            } else if (deferred !== b) {
                deferred.resolveWith(deferred, length ? [b] : [])
            }
            return deferred.promise()
        }
    });
    (function () {
        y.support = {};
        var d = x.createElement("div");
        d.style.display = "none";
        d.innerHTML = "   <link/><table></table><a href='/a' style='color:red;float:left;opacity:.55;'>a</a><input type='checkbox'/>";
        var f = d.getElementsByTagName("*"),
            a = d.getElementsByTagName("a")[0],
            select = x.createElement("select"),
            opt = select.appendChild(x.createElement("option")),
            input = d.getElementsByTagName("input")[0];
        if (!f || !f.length || !a) {
            return
        }
        y.support = {
            leadingWhitespace: d.firstChild.nodeType === 3,
            tbody: !d.getElementsByTagName("tbody").length,
            htmlSerialize: !! d.getElementsByTagName("link").length,
            style: /red/.test(a.getAttribute("style")),
            hrefNormalized: a.getAttribute("href") === "/a",
            opacity: /^0.55$/.test(a.style.opacity),
            cssFloat: !! a.style.cssFloat,
            checkOn: input.value === "on",
            optSelected: opt.selected,
            deleteExpando: true,
            optDisabled: false,
            checkClone: false,
            noCloneEvent: true,
            noCloneChecked: true,
            boxModel: null,
            inlineBlockNeedsLayout: false,
            shrinkWrapBlocks: false,
            reliableHiddenOffsets: true,
            reliableMarginRight: true
        };
        input.checked = true;
        y.support.noCloneChecked = input.cloneNode(true).checked;
        select.disabled = true;
        y.support.optDisabled = !opt.disabled;
        var g = null;
        y.support.scriptEval = function () {
            if (g === null) {
                var a = x.documentElement,
                    script = x.createElement("script"),
                    id = "script" + y.now();
                try {
                    script.appendChild(x.createTextNode("window." + id + "=1;"))
                } catch (e) {}
                a.insertBefore(script, a.firstChild);
                if (u[id]) {
                    g = true;
                    delete u[id]
                } else {
                    g = false
                }
                a.removeChild(script)
            }
            return g
        };
        try {
            delete d.test
        } catch (e) {
            y.support.deleteExpando = false
        }
        if (!d.addEventListener && d.attachEvent && d.fireEvent) {
            d.attachEvent("onclick", function click() {
                y.support.noCloneEvent = false;
                d.detachEvent("onclick", click)
            });
            d.cloneNode(true).fireEvent("onclick")
        }
        d = x.createElement("div");
        d.innerHTML = "<input type='radio' name='radiotest' checked='checked'/>";
        var h = x.createDocumentFragment();
        h.appendChild(d.firstChild);
        y.support.checkClone = h.cloneNode(true).cloneNode(true).lastChild.checked;
        y(function () {
            var a = x.createElement("div"),
                body = x.getElementsByTagName("body")[0];
            if (!body) {
                return
            }
            a.style.width = a.style.paddingLeft = "1px";
            body.appendChild(a);
            y.boxModel = y.support.boxModel = a.offsetWidth === 2;
            if ("zoom" in a.style) {
                a.style.display = "inline";
                a.style.zoom = 1;
                y.support.inlineBlockNeedsLayout = a.offsetWidth === 2;
                a.style.display = "";
                a.innerHTML = "<div style='width:4px;'></div>";
                y.support.shrinkWrapBlocks = a.offsetWidth !== 2
            }
            a.innerHTML = "<table><tr><td style='padding:0;border:0;display:none'></td><td>t</td></tr></table>";
            var b = a.getElementsByTagName("td");
            y.support.reliableHiddenOffsets = b[0].offsetHeight === 0;
            b[0].style.display = "";
            b[1].style.display = "none";
            y.support.reliableHiddenOffsets = y.support.reliableHiddenOffsets && b[0].offsetHeight === 0;
            a.innerHTML = "";
            if (x.defaultView && x.defaultView.getComputedStyle) {
                a.style.width = "1px";
                a.style.marginRight = "0";
                y.support.reliableMarginRight = (parseInt(x.defaultView.getComputedStyle(a, null).marginRight, 10) || 0) === 0
            }
            body.removeChild(a).style.display = "none";
            a = b = null
        });
        var i = function (a) {
                var b = x.createElement("div");
                a = "on" + a;
                if (!b.attachEvent) {
                    return true
                }
                var c = (a in b);
                if (!c) {
                    b.setAttribute(a, "return;");
                    c = typeof b[a] === "function"
                }
                return c
            };
        y.support.submitBubbles = i("submit");
        y.support.changeBubbles = i("change");
        d = f = a = null
    })();
    var A = /^(?:\{.*\}|\[.*\])$/;
    y.extend({
        cache: {},
        uuid: 0,
        expando: "jQuery" + (y.fn.jquery + Math.random()).replace(/\D/g, ""),
        noData: {
            "embed": true,
            "object": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
            "applet": true
        },
        hasData: function (a) {
            a = a.nodeType ? y.cache[a[y.expando]] : a[y.expando];
            return !!a && !isEmptyDataObject(a)
        },
        data: function (a, b, c, d) {
            if (!y.acceptData(a)) {
                return
            }
            var e = y.expando,
                getByName = typeof b === "string",
                thisCache, isNode = a.nodeType,
                cache = isNode ? y.cache : a,
                id = isNode ? a[y.expando] : a[y.expando] && y.expando;
            if ((!id || (d && id && !cache[id][e])) && getByName && c === w) {
                return
            }
            if (!id) {
                if (isNode) {
                    a[y.expando] = id = ++y.uuid
                } else {
                    id = y.expando
                }
            }
            if (!cache[id]) {
                cache[id] = {};
                if (!isNode) {
                    cache[id].toJSON = y.noop
                }
            }
            if (typeof b === "object" || typeof b === "function") {
                if (d) {
                    cache[id][e] = y.extend(cache[id][e], b)
                } else {
                    cache[id] = y.extend(cache[id], b)
                }
            }
            thisCache = cache[id];
            if (d) {
                if (!thisCache[e]) {
                    thisCache[e] = {}
                }
                thisCache = thisCache[e]
            }
            if (c !== w) {
                thisCache[b] = c
            }
            if (b === "events" && !thisCache[b]) {
                return thisCache[e] && thisCache[e].events
            }
            return getByName ? thisCache[b] : thisCache
        },
        removeData: function (a, b, c) {
            if (!y.acceptData(a)) {
                return
            }
            var d = y.expando,
                isNode = a.nodeType,
                cache = isNode ? y.cache : a,
                id = isNode ? a[y.expando] : y.expando;
            if (!cache[id]) {
                return
            }
            if (b) {
                var e = c ? cache[id][d] : cache[id];
                if (e) {
                    delete e[b];
                    if (!isEmptyDataObject(e)) {
                        return
                    }
                }
            }
            if (c) {
                delete cache[id][d];
                if (!isEmptyDataObject(cache[id])) {
                    return
                }
            }
            var f = cache[id][d];
            if (y.support.deleteExpando || cache != u) {
                delete cache[id]
            } else {
                cache[id] = null
            }
            if (f) {
                cache[id] = {};
                if (!isNode) {
                    cache[id].toJSON = y.noop
                }
                cache[id][d] = f
            } else if (isNode) {
                if (y.support.deleteExpando) {
                    delete a[y.expando]
                } else if (a.removeAttribute) {
                    a.removeAttribute(y.expando)
                } else {
                    a[y.expando] = null
                }
            }
        },
        _data: function (a, b, c) {
            return y.data(a, b, c, true)
        },
        acceptData: function (a) {
            if (a.nodeName) {
                var b = y.noData[a.nodeName.toLowerCase()];
                if (b) {
                    return !(b === true || a.getAttribute("classid") !== b)
                }
            }
            return true
        }
    });
    y.fn.extend({
        data: function (b, c) {
            var d = null;
            if (typeof b === "undefined") {
                if (this.length) {
                    d = y.data(this[0]);
                    if (this[0].nodeType === 1) {
                        var e = this[0].attributes,
                            name;
                        for (var i = 0, l = e.length; i < l; i++) {
                            name = e[i].name;
                            if (name.indexOf("data-") === 0) {
                                name = name.substr(5);
                                dataAttr(this[0], name, d[name])
                            }
                        }
                    }
                }
                return d
            } else if (typeof b === "object") {
                return this.each(function () {
                    y.data(this, b)
                })
            }
            var f = b.split(".");
            f[1] = f[1] ? "." + f[1] : "";
            if (c === w) {
                d = this.triggerHandler("getData" + f[1] + "!", [f[0]]);
                if (d === w && this.length) {
                    d = y.data(this[0], b);
                    d = dataAttr(this[0], b, d)
                }
                return d === w && f[1] ? this.data(f[0]) : d
            } else {
                return this.each(function () {
                    var a = y(this),
                        args = [f[0], c];
                    a.triggerHandler("setData" + f[1] + "!", args);
                    y.data(this, b, c);
                    a.triggerHandler("changeData" + f[1] + "!", args)
                })
            }
        },
        removeData: function (a) {
            return this.each(function () {
                y.removeData(this, a)
            })
        }
    });

    function dataAttr(a, b, c) {
        if (c === w && a.nodeType === 1) {
            c = a.getAttribute("data-" + b);
            if (typeof c === "string") {
                try {
                    c = c === "true" ? true : c === "false" ? false : c === "null" ? null : !y.isNaN(c) ? parseFloat(c) : A.test(c) ? y.parseJSON(c) : c
                } catch (e) {}
                y.data(a, b, c)
            } else {
                c = w
            }
        }
        return c
    }
    function isEmptyDataObject(a) {
        for (var b in a) {
            if (b !== "toJSON") {
                return false
            }
        }
        return true
    }
    y.extend({
        queue: function (a, b, c) {
            if (!a) {
                return
            }
            b = (b || "fx") + "queue";
            var q = y._data(a, b);
            if (!c) {
                return q || []
            }
            if (!q || y.isArray(c)) {
                q = y._data(a, b, y.makeArray(c))
            } else {
                q.push(c)
            }
            return q
        },
        dequeue: function (a, b) {
            b = b || "fx";
            var c = y.queue(a, b),
                fn = c.shift();
            if (fn === "inprogress") {
                fn = c.shift()
            }
            if (fn) {
                if (b === "fx") {
                    c.unshift("inprogress")
                }
                fn.call(a, function () {
                    y.dequeue(a, b)
                })
            }
            if (!c.length) {
                y.removeData(a, b + "queue", true)
            }
        }
    });
    y.fn.extend({
        queue: function (b, c) {
            if (typeof b !== "string") {
                c = b;
                b = "fx"
            }
            if (c === w) {
                return y.queue(this[0], b)
            }
            return this.each(function (i) {
                var a = y.queue(this, b, c);
                if (b === "fx" && a[0] !== "inprogress") {
                    y.dequeue(this, b)
                }
            })
        },
        dequeue: function (a) {
            return this.each(function () {
                y.dequeue(this, a)
            })
        },
        delay: function (b, c) {
            b = y.fx ? y.fx.speeds[b] || b : b;
            c = c || "fx";
            return this.queue(c, function () {
                var a = this;
                setTimeout(function () {
                    y.dequeue(a, c)
                }, b)
            })
        },
        clearQueue: function (a) {
            return this.queue(a || "fx", [])
        }
    });
    var B = /[\n\t\r]/g,
        rspaces = /\s+/,
        rreturn = /\r/g,
        rspecialurl = /^(?:href|src|style)$/,
        rtype = /^(?:button|input)$/i,
        rfocusable = /^(?:button|input|object|select|textarea)$/i,
        rclickable = /^a(?:rea)?$/i,
        rradiocheck = /^(?:radio|checkbox)$/i;
    y.props = {
        "for": "htmlFor",
        "class": "className",
        readonly: "readOnly",
        maxlength: "maxLength",
        cellspacing: "cellSpacing",
        rowspan: "rowSpan",
        colspan: "colSpan",
        tabindex: "tabIndex",
        usemap: "useMap",
        frameborder: "frameBorder"
    };
    y.fn.extend({
        attr: function (a, b) {
            return y.access(this, a, b, true, y.attr)
        },
        removeAttr: function (a, b) {
            return this.each(function () {
                y.attr(this, a, "");
                if (this.nodeType === 1) {
                    this.removeAttribute(a)
                }
            })
        },
        addClass: function (b) {
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    var a = y(this);
                    a.addClass(b.call(this, i, a.attr("class")))
                })
            }
            if (b && typeof b === "string") {
                var d = (b || "").split(rspaces);
                for (var i = 0, l = this.length; i < l; i++) {
                    var e = this[i];
                    if (e.nodeType === 1) {
                        if (!e.className) {
                            e.className = b
                        } else {
                            var f = " " + e.className + " ",
                                setClass = e.className;
                            for (var c = 0, cl = d.length; c < cl; c++) {
                                if (f.indexOf(" " + d[c] + " ") < 0) {
                                    setClass += " " + d[c]
                                }
                            }
                            e.className = y.trim(setClass)
                        }
                    }
                }
            }
            return this
        },
        removeClass: function (b) {
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    var a = y(this);
                    a.removeClass(b.call(this, i, a.attr("class")))
                })
            }
            if ((b && typeof b === "string") || b === w) {
                var d = (b || "").split(rspaces);
                for (var i = 0, l = this.length; i < l; i++) {
                    var e = this[i];
                    if (e.nodeType === 1 && e.className) {
                        if (b) {
                            var f = (" " + e.className + " ").replace(B, " ");
                            for (var c = 0, cl = d.length; c < cl; c++) {
                                f = f.replace(" " + d[c] + " ", " ")
                            }
                            e.className = y.trim(f)
                        } else {
                            e.className = ""
                        }
                    }
                }
            }
            return this
        },
        toggleClass: function (b, c) {
            var d = typeof b,
                isBool = typeof c === "boolean";
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    var a = y(this);
                    a.toggleClass(b.call(this, i, a.attr("class"), c), c)
                })
            }
            return this.each(function () {
                if (d === "string") {
                    var a, i = 0,
                        self = y(this),
                        state = c,
                        classNames = b.split(rspaces);
                    while ((a = classNames[i++])) {
                        state = isBool ? state : !self.hasClass(a);
                        self[state ? "addClass" : "removeClass"](a)
                    }
                } else if (d === "undefined" || d === "boolean") {
                    if (this.className) {
                        y._data(this, "__className__", this.className)
                    }
                    this.className = this.className || b === false ? "" : y._data(this, "__className__") || ""
                }
            })
        },
        hasClass: function (a) {
            var b = " " + a + " ";
            for (var i = 0, l = this.length; i < l; i++) {
                if ((" " + this[i].className + " ").replace(B, " ").indexOf(b) > -1) {
                    return true
                }
            }
            return false
        },
        val: function (d) {
            if (!arguments.length) {
                var e = this[0];
                if (e) {
                    if (y.nodeName(e, "option")) {
                        var f = e.attributes.value;
                        return !f || f.specified ? e.value : e.text
                    }
                    if (y.nodeName(e, "select")) {
                        var g = e.selectedIndex,
                            values = [],
                            options = e.options,
                            one = e.type === "select-one";
                        if (g < 0) {
                            return null
                        }
                        for (var i = one ? g : 0, max = one ? g + 1 : options.length; i < max; i++) {
                            var h = options[i];
                            if (h.selected && (y.support.optDisabled ? !h.disabled : h.getAttribute("disabled") === null) && (!h.parentNode.disabled || !y.nodeName(h.parentNode, "optgroup"))) {
                                d = y(h).val();
                                if (one) {
                                    return d
                                }
                                values.push(d)
                            }
                        }
                        if (one && !values.length && options.length) {
                            return y(options[g]).val()
                        }
                        return values
                    }
                    if (rradiocheck.test(e.type) && !y.support.checkOn) {
                        return e.getAttribute("value") === null ? "on" : e.value
                    }
                    return (e.value || "").replace(rreturn, "")
                }
                return w
            }
            var j = y.isFunction(d);
            return this.each(function (i) {
                var b = y(this),
                    f = d;
                if (this.nodeType !== 1) {
                    return
                }
                if (j) {
                    f = d.call(this, i, b.val())
                }
                if (f == null) {
                    f = ""
                } else if (typeof f === "number") {
                    f += ""
                } else if (y.isArray(f)) {
                    f = y.map(f, function (a) {
                        return a == null ? "" : a + ""
                    })
                }
                if (y.isArray(f) && rradiocheck.test(this.type)) {
                    this.checked = y.inArray(b.val(), f) >= 0
                } else if (y.nodeName(this, "select")) {
                    var c = y.makeArray(f);
                    y("option", this).each(function () {
                        this.selected = y.inArray(y(this).val(), c) >= 0
                    });
                    if (!c.length) {
                        this.selectedIndex = -1
                    }
                } else {
                    this.value = f
                }
            })
        }
    });
    y.extend({
        attrFn: {
            val: true,
            css: true,
            html: true,
            text: true,
            data: true,
            width: true,
            height: true,
            offset: true
        },
        attr: function (a, b, c, d) {
            if (!a || a.nodeType === 3 || a.nodeType === 8 || a.nodeType === 2) {
                return w
            }
            if (d && b in y.attrFn) {
                return y(a)[b](c)
            }
            var e = a.nodeType !== 1 || !y.isXMLDoc(a),
                set = c !== w;
            b = e && y.props[b] || b;
            if (a.nodeType === 1) {
                var f = rspecialurl.test(b);
                if (b === "selected" && !y.support.optSelected) {
                    var g = a.parentNode;
                    if (g) {
                        g.selectedIndex;
                        if (g.parentNode) {
                            g.parentNode.selectedIndex
                        }
                    }
                }
                if ((b in a || a[b] !== w) && e && !f) {
                    if (set) {
                        if (b === "type" && rtype.test(a.nodeName) && a.parentNode) {
                            y.error("type property can't be changed")
                        }
                        if (c === null) {
                            if (a.nodeType === 1) {
                                a.removeAttribute(b)
                            }
                        } else {
                            a[b] = c
                        }
                    }
                    if (y.nodeName(a, "form") && a.getAttributeNode(b)) {
                        return a.getAttributeNode(b).nodeValue
                    }
                    if (b === "tabIndex") {
                        var h = a.getAttributeNode("tabIndex");
                        return h && h.specified ? h.value : rfocusable.test(a.nodeName) || rclickable.test(a.nodeName) && a.href ? 0 : w
                    }
                    return a[b]
                }
                if (!y.support.style && e && b === "style") {
                    if (set) {
                        a.style.cssText = "" + c
                    }
                    return a.style.cssText
                }
                if (set) {
                    a.setAttribute(b, "" + c)
                }
                if (!a.attributes[b] && (a.hasAttribute && !a.hasAttribute(b))) {
                    return w
                }
                var i = !y.support.hrefNormalized && e && f ? a.getAttribute(b, 2) : a.getAttribute(b);
                return i === null ? w : i
            }
            if (set) {
                a[b] = c
            }
            return a[b]
        }
    });
    var C = /\.(.*)$/,
        rformElems = /^(?:textarea|input|select)$/i,
        rperiod = /\./g,
        rspace = / /g,
        rescape = /[^\w\s.|`]/g,
        fcleanup = function (a) {
            return a.replace(rescape, "\\$&")
        };
    y.event = {
        add: function (a, b, c, d) {
            if (a.nodeType === 3 || a.nodeType === 8) {
                return
            }
            try {
                if (y.isWindow(a) && (a !== u && !a.frameElement)) {
                    a = u
                }
            } catch (e) {}
            if (c === false) {
                c = returnFalse
            } else if (!c) {
                return
            }
            var f, handleObj;
            if (c.handler) {
                f = c;
                c = f.handler
            }
            if (!c.guid) {
                c.guid = y.guid++
            }
            var g = y._data(a);
            if (!g) {
                return
            }
            var h = g.events,
                eventHandle = g.handle;
            if (!h) {
                g.events = h = {}
            }
            if (!eventHandle) {
                g.handle = eventHandle = function (e) {
                    return typeof y !== "undefined" && y.event.triggered !== e.type ? y.event.handle.apply(eventHandle.elem, arguments) : w
                }
            }
            eventHandle.elem = a;
            b = b.split(" ");
            var j, i = 0,
                namespaces;
            while ((j = b[i++])) {
                handleObj = f ? y.extend({}, f) : {
                    handler: c,
                    data: d
                };
                if (j.indexOf(".") > -1) {
                    namespaces = j.split(".");
                    j = namespaces.shift();
                    handleObj.namespace = namespaces.slice(0).sort().join(".")
                } else {
                    namespaces = [];
                    handleObj.namespace = ""
                }
                handleObj.type = j;
                if (!handleObj.guid) {
                    handleObj.guid = c.guid
                }
                var k = h[j],
                    special = y.event.special[j] || {};
                if (!k) {
                    k = h[j] = [];
                    if (!special.setup || special.setup.call(a, d, namespaces, eventHandle) === false) {
                        if (a.addEventListener) {
                            a.addEventListener(j, eventHandle, false)
                        } else if (a.attachEvent) {
                            a.attachEvent("on" + j, eventHandle)
                        }
                    }
                }
                if (special.add) {
                    special.add.call(a, handleObj);
                    if (!handleObj.handler.guid) {
                        handleObj.handler.guid = c.guid
                    }
                }
                k.push(handleObj);
                y.event.global[j] = true
            }
            a = null
        },
        global: {},
        remove: function (a, b, c, d) {
            if (a.nodeType === 3 || a.nodeType === 8) {
                return
            }
            if (c === false) {
                c = returnFalse
            }
            var e, type, fn, j, i = 0,
                all, namespaces, namespace, special, eventType, handleObj, origType, elemData = y.hasData(a) && y._data(a),
                events = elemData && elemData.events;
            if (!elemData || !events) {
                return
            }
            if (b && b.type) {
                c = b.handler;
                b = b.type
            }
            if (!b || typeof b === "string" && b.charAt(0) === ".") {
                b = b || "";
                for (type in events) {
                    y.event.remove(a, type + b)
                }
                return
            }
            b = b.split(" ");
            while ((type = b[i++])) {
                origType = type;
                handleObj = null;
                all = type.indexOf(".") < 0;
                namespaces = [];
                if (!all) {
                    namespaces = type.split(".");
                    type = namespaces.shift();
                    namespace = new RegExp("(^|\\.)" + y.map(namespaces.slice(0).sort(), fcleanup).join("\\.(?:.*\\.)?") + "(\\.|$)")
                }
                eventType = events[type];
                if (!eventType) {
                    continue
                }
                if (!c) {
                    for (j = 0; j < eventType.length; j++) {
                        handleObj = eventType[j];
                        if (all || namespace.test(handleObj.namespace)) {
                            y.event.remove(a, origType, handleObj.handler, j);
                            eventType.splice(j--, 1)
                        }
                    }
                    continue
                }
                special = y.event.special[type] || {};
                for (j = d || 0; j < eventType.length; j++) {
                    handleObj = eventType[j];
                    if (c.guid === handleObj.guid) {
                        if (all || namespace.test(handleObj.namespace)) {
                            if (d == null) {
                                eventType.splice(j--, 1)
                            }
                            if (special.remove) {
                                special.remove.call(a, handleObj)
                            }
                        }
                        if (d != null) {
                            break
                        }
                    }
                }
                if (eventType.length === 0 || d != null && eventType.length === 1) {
                    if (!special.teardown || special.teardown.call(a, namespaces) === false) {
                        y.removeEvent(a, type, elemData.handle)
                    }
                    e = null;
                    delete events[type]
                }
            }
            if (y.isEmptyObject(events)) {
                var f = elemData.handle;
                if (f) {
                    f.elem = null
                }
                delete elemData.events;
                delete elemData.handle;
                if (y.isEmptyObject(elemData)) {
                    y.removeData(a, w, true)
                }
            }
        },
        trigger: function (b, c, d) {
            var e = b.type || b,
                bubbling = arguments[3];
            if (!bubbling) {
                b = typeof b === "object" ? b[y.expando] ? b : y.extend(y.Event(e), b) : y.Event(e);
                if (e.indexOf("!") >= 0) {
                    b.type = e = e.slice(0, -1);
                    b.exclusive = true
                }
                if (!d) {
                    b.stopPropagation();
                    if (y.event.global[e]) {
                        y.each(y.cache, function () {
                            var a = y.expando,
                                internalCache = this[a];
                            if (internalCache && internalCache.events && internalCache.events[e]) {
                                y.event.trigger(b, c, internalCache.handle.elem)
                            }
                        })
                    }
                }
                if (!d || d.nodeType === 3 || d.nodeType === 8) {
                    return w
                }
                b.result = w;
                b.target = d;
                c = y.makeArray(c);
                c.unshift(b)
            }
            b.currentTarget = d;
            var f = y._data(d, "handle");
            if (f) {
                f.apply(d, c)
            }
            var g = d.parentNode || d.ownerDocument;
            try {
                if (!(d && d.nodeName && y.noData[d.nodeName.toLowerCase()])) {
                    if (d["on" + e] && d["on" + e].apply(d, c) === false) {
                        b.result = false;
                        b.preventDefault()
                    }
                }
            } catch (inlineError) {}
            if (!b.isPropagationStopped() && g) {
                y.event.trigger(b, c, g, true)
            } else if (!b.isDefaultPrevented()) {
                var h, target = b.target,
                    targetType = e.replace(C, ""),
                    isClick = y.nodeName(target, "a") && targetType === "click",
                    special = y.event.special[targetType] || {};
                if ((!special._default || special._default.call(d, b) === false) && !isClick && !(target && target.nodeName && y.noData[target.nodeName.toLowerCase()])) {
                    try {
                        if (target[targetType]) {
                            h = target["on" + targetType];
                            if (h) {
                                target["on" + targetType] = null
                            }
                            y.event.triggered = b.type;
                            target[targetType]()
                        }
                    } catch (triggerError) {}
                    if (h) {
                        target["on" + targetType] = h
                    }
                    y.event.triggered = w
                }
            }
        },
        handle: function (a) {
            var b, handlers, namespaces, namespace_re, events, namespace_sort = [],
                args = y.makeArray(arguments);
            a = args[0] = y.event.fix(a || u.event);
            a.currentTarget = this;
            b = a.type.indexOf(".") < 0 && !a.exclusive;
            if (!b) {
                namespaces = a.type.split(".");
                a.type = namespaces.shift();
                namespace_sort = namespaces.slice(0).sort();
                namespace_re = new RegExp("(^|\\.)" + namespace_sort.join("\\.(?:.*\\.)?") + "(\\.|$)")
            }
            a.namespace = a.namespace || namespace_sort.join(".");
            events = y._data(this, "events");
            handlers = (events || {})[a.type];
            if (events && handlers) {
                handlers = handlers.slice(0);
                for (var j = 0, l = handlers.length; j < l; j++) {
                    var c = handlers[j];
                    if (b || namespace_re.test(c.namespace)) {
                        a.handler = c.handler;
                        a.data = c.data;
                        a.handleObj = c;
                        var d = c.handler.apply(this, args);
                        if (d !== w) {
                            a.result = d;
                            if (d === false) {
                                a.preventDefault();
                                a.stopPropagation()
                            }
                        }
                        if (a.isImmediatePropagationStopped()) {
                            break
                        }
                    }
                }
            }
            return a.result
        },
        props: "altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode layerX layerY metaKey newValue offsetX offsetY pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),
        fix: function (a) {
            if (a[y.expando]) {
                return a
            }
            var b = a;
            a = y.Event(b);
            for (var i = this.props.length, prop; i;) {
                prop = this.props[--i];
                a[prop] = b[prop]
            }
            if (!a.target) {
                a.target = a.srcElement || x
            }
            if (a.target.nodeType === 3) {
                a.target = a.target.parentNode
            }
            if (!a.relatedTarget && a.fromElement) {
                a.relatedTarget = a.fromElement === a.target ? a.toElement : a.fromElement
            }
            if (a.pageX == null && a.clientX != null) {
                var c = x.documentElement,
                    body = x.body;
                a.pageX = a.clientX + (c && c.scrollLeft || body && body.scrollLeft || 0) - (c && c.clientLeft || body && body.clientLeft || 0);
                a.pageY = a.clientY + (c && c.scrollTop || body && body.scrollTop || 0) - (c && c.clientTop || body && body.clientTop || 0)
            }
            if (a.which == null && (a.charCode != null || a.keyCode != null)) {
                a.which = a.charCode != null ? a.charCode : a.keyCode
            }
            if (!a.metaKey && a.ctrlKey) {
                a.metaKey = a.ctrlKey
            }
            if (!a.which && a.button !== w) {
                a.which = (a.button & 1 ? 1 : (a.button & 2 ? 3 : (a.button & 4 ? 2 : 0)))
            }
            return a
        },
        guid: 1E8,
        proxy: y.proxy,
        special: {
            ready: {
                setup: y.bindReady,
                teardown: y.noop
            },
            live: {
                add: function (a) {
                    y.event.add(this, liveConvert(a.origType, a.selector), y.extend({}, a, {
                        handler: liveHandler,
                        guid: a.handler.guid
                    }))
                },
                remove: function (a) {
                    y.event.remove(this, liveConvert(a.origType, a.selector), a)
                }
            },
            beforeunload: {
                setup: function (a, b, c) {
                    if (y.isWindow(this)) {
                        this.onbeforeunload = c
                    }
                },
                teardown: function (a, b) {
                    if (this.onbeforeunload === b) {
                        this.onbeforeunload = null
                    }
                }
            }
        }
    };
    y.removeEvent = x.removeEventListener ?
    function (a, b, c) {
        if (a.removeEventListener) {
            a.removeEventListener(b, c, false)
        }
    } : function (a, b, c) {
        if (a.detachEvent) {
            a.detachEvent("on" + b, c)
        }
    };
    y.Event = function (a) {
        if (!this.preventDefault) {
            return new y.Event(a)
        }
        if (a && a.type) {
            this.originalEvent = a;
            this.type = a.type;
            this.isDefaultPrevented = (a.defaultPrevented || a.returnValue === false || a.getPreventDefault && a.getPreventDefault()) ? returnTrue : returnFalse
        } else {
            this.type = a
        }
        this.timeStamp = y.now();
        this[y.expando] = true
    };

    function returnFalse() {
        return false
    }
    function returnTrue() {
        return true
    }
    y.Event.prototype = {
        preventDefault: function () {
            this.isDefaultPrevented = returnTrue;
            var e = this.originalEvent;
            if (!e) {
                return
            }
            if (e.preventDefault) {
                e.preventDefault()
            } else {
                e.returnValue = false
            }
        },
        stopPropagation: function () {
            this.isPropagationStopped = returnTrue;
            var e = this.originalEvent;
            if (!e) {
                return
            }
            if (e.stopPropagation) {
                e.stopPropagation()
            }
            e.cancelBubble = true
        },
        stopImmediatePropagation: function () {
            this.isImmediatePropagationStopped = returnTrue;
            this.stopPropagation()
        },
        isDefaultPrevented: returnFalse,
        isPropagationStopped: returnFalse,
        isImmediatePropagationStopped: returnFalse
    };
    var D = function (a) {
            var b = a.relatedTarget;
            try {
                if (b && b !== x && !b.parentNode) {
                    return
                }
                while (b && b !== this) {
                    b = b.parentNode
                }
                if (b !== this) {
                    a.type = a.data;
                    y.event.handle.apply(this, arguments)
                }
            } catch (e) {}
        },
        delegate = function (a) {
            a.type = a.data;
            y.event.handle.apply(this, arguments)
        };
    y.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function (b, c) {
        y.event.special[b] = {
            setup: function (a) {
                y.event.add(this, c, a && a.selector ? delegate : D, b)
            },
            teardown: function (a) {
                y.event.remove(this, c, a && a.selector ? delegate : D)
            }
        }
    });
    if (!y.support.submitBubbles) {
        y.event.special.submit = {
            setup: function (b, c) {
                if (this.nodeName && this.nodeName.toLowerCase() !== "form") {
                    y.event.add(this, "click.specialSubmit", function (e) {
                        var a = e.target,
                            type = a.type;
                        if ((type === "submit" || type === "image") && y(a).closest("form").length) {
                            trigger("submit", this, arguments)
                        }
                    });
                    y.event.add(this, "keypress.specialSubmit", function (e) {
                        var a = e.target,
                            type = a.type;
                        if ((type === "text" || type === "password") && y(a).closest("form").length && e.keyCode === 13) {
                            trigger("submit", this, arguments)
                        }
                    })
                } else {
                    return false
                }
            },
            teardown: function (a) {
                y.event.remove(this, ".specialSubmit")
            }
        }
    }
    if (!y.support.changeBubbles) {
        var E, getVal = function (b) {
                var c = b.type,
                    val = b.value;
                if (c === "radio" || c === "checkbox") {
                    val = b.checked
                } else if (c === "select-multiple") {
                    val = b.selectedIndex > -1 ? y.map(b.options, function (a) {
                        return a.selected
                    }).join("-") : ""
                } else if (b.nodeName.toLowerCase() === "select") {
                    val = b.selectedIndex
                }
                return val
            },
            testChange = function testChange(e) {
                var a = e.target,
                    data, val;
                if (!rformElems.test(a.nodeName) || a.readOnly) {
                    return
                }
                data = y._data(a, "_change_data");
                val = getVal(a);
                if (e.type !== "focusout" || a.type !== "radio") {
                    y._data(a, "_change_data", val)
                }
                if (data === w || val === data) {
                    return
                }
                if (data != null || val) {
                    e.type = "change";
                    e.liveFired = w;
                    y.event.trigger(e, arguments[1], a)
                }
            };
        y.event.special.change = {
            filters: {
                focusout: testChange,
                beforedeactivate: testChange,
                click: function (e) {
                    var a = e.target,
                        type = a.type;
                    if (type === "radio" || type === "checkbox" || a.nodeName.toLowerCase() === "select") {
                        testChange.call(this, e)
                    }
                },
                keydown: function (e) {
                    var a = e.target,
                        type = a.type;
                    if ((e.keyCode === 13 && a.nodeName.toLowerCase() !== "textarea") || (e.keyCode === 32 && (type === "checkbox" || type === "radio")) || type === "select-multiple") {
                        testChange.call(this, e)
                    }
                },
                beforeactivate: function (e) {
                    var a = e.target;
                    y._data(a, "_change_data", getVal(a))
                }
            },
            setup: function (a, b) {
                if (this.type === "file") {
                    return false
                }
                for (var c in E) {
                    y.event.add(this, c + ".specialChange", E[c])
                }
                return rformElems.test(this.nodeName)
            },
            teardown: function (a) {
                y.event.remove(this, ".specialChange");
                return rformElems.test(this.nodeName)
            }
        };
        E = y.event.special.change.filters;
        E.focus = E.beforeactivate
    }
    function trigger(a, b, c) {
        var d = y.extend({}, c[0]);
        d.type = a;
        d.originalEvent = {};
        d.liveFired = w;
        y.event.handle.call(b, d);
        if (d.isDefaultPrevented()) {
            c[0].preventDefault()
        }
    }
    if (x.addEventListener) {
        y.each({
            focus: "focusin",
            blur: "focusout"
        }, function (b, c) {
            var d = 0;
            y.event.special[c] = {
                setup: function () {
                    if (d++ === 0) {
                        x.addEventListener(b, handler, true)
                    }
                },
                teardown: function () {
                    if (--d === 0) {
                        x.removeEventListener(b, handler, true)
                    }
                }
            };

            function handler(a) {
                var e = y.event.fix(a);
                e.type = c;
                e.originalEvent = {};
                y.event.trigger(e, null, e.target);
                if (e.isDefaultPrevented()) {
                    a.preventDefault()
                }
            }
        })
    }
    y.each(["bind", "one"], function (i, g) {
        y.fn[g] = function (b, c, d) {
            if (typeof b === "object") {
                for (var e in b) {
                    this[g](e, c, b[e], d)
                }
                return this
            }
            if (y.isFunction(c) || c === false) {
                d = c;
                c = w
            }
            var f = g === "one" ? y.proxy(d, function (a) {
                y(this).unbind(a, f);
                return d.apply(this, arguments)
            }) : d;
            if (b === "unload" && g !== "one") {
                this.one(b, c, d)
            } else {
                for (var i = 0, l = this.length; i < l; i++) {
                    y.event.add(this[i], b, f, c)
                }
            }
            return this
        }
    });
    y.fn.extend({
        unbind: function (a, b) {
            if (typeof a === "object" && !a.preventDefault) {
                for (var c in a) {
                    this.unbind(c, a[c])
                }
            } else {
                for (var i = 0, l = this.length; i < l; i++) {
                    y.event.remove(this[i], a, b)
                }
            }
            return this
        },
        delegate: function (a, b, c, d) {
            return this.live(b, c, d, a)
        },
        undelegate: function (a, b, c) {
            if (arguments.length === 0) {
                return this.unbind("live")
            } else {
                return this.die(b, null, c, a)
            }
        },
        trigger: function (a, b) {
            return this.each(function () {
                y.event.trigger(a, b, this)
            })
        },
        triggerHandler: function (a, b) {
            if (this[0]) {
                var c = y.Event(a);
                c.preventDefault();
                c.stopPropagation();
                y.event.trigger(c, b, this[0]);
                return c.result
            }
        },
        toggle: function (c) {
            var d = arguments,
                i = 1;
            while (i < d.length) {
                y.proxy(c, d[i++])
            }
            return this.click(y.proxy(c, function (a) {
                var b = (y._data(this, "lastToggle" + c.guid) || 0) % i;
                y._data(this, "lastToggle" + c.guid, b + 1);
                a.preventDefault();
                return d[b].apply(this, arguments) || false
            }))
        },
        hover: function (a, b) {
            return this.mouseenter(a).mouseleave(b || a)
        }
    });
    var F = {
        focus: "focusin",
        blur: "focusout",
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    };
    y.each(["live", "die"], function (i, g) {
        y.fn[g] = function (a, b, c, d) {
            var e, i = 0,
                match, namespaces, preType, selector = d || this.selector,
                context = d ? this : y(this.context);
            if (typeof a === "object" && !a.preventDefault) {
                for (var f in a) {
                    context[g](f, b, a[f], selector)
                }
                return this
            }
            if (y.isFunction(b)) {
                c = b;
                b = w
            }
            a = (a || "").split(" ");
            while ((e = a[i++]) != null) {
                match = C.exec(e);
                namespaces = "";
                if (match) {
                    namespaces = match[0];
                    e = e.replace(C, "")
                }
                if (e === "hover") {
                    a.push("mouseenter" + namespaces, "mouseleave" + namespaces);
                    continue
                }
                preType = e;
                if (e === "focus" || e === "blur") {
                    a.push(F[e] + namespaces);
                    e = e + namespaces
                } else {
                    e = (F[e] || e) + namespaces
                }
                if (g === "live") {
                    for (var j = 0, l = context.length; j < l; j++) {
                        y.event.add(context[j], "live." + liveConvert(e, selector), {
                            data: b,
                            selector: selector,
                            handler: c,
                            origType: e,
                            origHandler: c,
                            preType: preType
                        })
                    }
                } else {
                    context.unbind("live." + liveConvert(e, selector), c)
                }
            }
            return this
        }
    });

    function liveHandler(a) {
        var b, maxLevel, related, match, handleObj, elem, j, i, l, data, close, namespace, ret, elems = [],
            selectors = [],
            events = y._data(this, "events");
        if (a.liveFired === this || !events || !events.live || a.target.disabled || a.button && a.type === "click") {
            return
        }
        if (a.namespace) {
            namespace = new RegExp("(^|\\.)" + a.namespace.split(".").join("\\.(?:.*\\.)?") + "(\\.|$)")
        }
        a.liveFired = this;
        var c = events.live.slice(0);
        for (j = 0; j < c.length; j++) {
            handleObj = c[j];
            if (handleObj.origType.replace(C, "") === a.type) {
                selectors.push(handleObj.selector)
            } else {
                c.splice(j--, 1)
            }
        }
        match = y(a.target).closest(selectors, a.currentTarget);
        for (i = 0, l = match.length; i < l; i++) {
            close = match[i];
            for (j = 0; j < c.length; j++) {
                handleObj = c[j];
                if (close.selector === handleObj.selector && (!namespace || namespace.test(handleObj.namespace)) && !close.elem.disabled) {
                    elem = close.elem;
                    related = null;
                    if (handleObj.preType === "mouseenter" || handleObj.preType === "mouseleave") {
                        a.type = handleObj.preType;
                        related = y(a.relatedTarget).closest(handleObj.selector)[0]
                    }
                    if (!related || related !== elem) {
                        elems.push({
                            elem: elem,
                            handleObj: handleObj,
                            level: close.level
                        })
                    }
                }
            }
        }
        for (i = 0, l = elems.length; i < l; i++) {
            match = elems[i];
            if (maxLevel && match.level > maxLevel) {
                break
            }
            a.currentTarget = match.elem;
            a.data = match.handleObj.data;
            a.handleObj = match.handleObj;
            ret = match.handleObj.origHandler.apply(match.elem, arguments);
            if (ret === false || a.isPropagationStopped()) {
                maxLevel = match.level;
                if (ret === false) {
                    b = false
                }
                if (a.isImmediatePropagationStopped()) {
                    break
                }
            }
        }
        return b
    }
    function liveConvert(a, b) {
        return (a && a !== "*" ? a + "." : "") + b.replace(rperiod, "`").replace(rspace, "&")
    }
    y.each(("blur focus focusin focusout load resize scroll unload click dblclick " + "mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave " + "change select submit keydown keypress keyup error").split(" "), function (i, c) {
        y.fn[c] = function (a, b) {
            if (b == null) {
                b = a;
                a = null
            }
            return arguments.length > 0 ? this.bind(c, a, b) : this.trigger(c)
        };
        if (y.attrFn) {
            y.attrFn[c] = true
        }
    });
    (function () {
        var k = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
            done = 0,
            toString = Object.prototype.toString,
            hasDuplicate = false,
            baseHasDuplicate = true,
            rBackslash = /\\/g,
            rNonWord = /\W/;
        [0, 0].sort(function () {
            baseHasDuplicate = false;
            return 0
        });
        var n = function (a, b, c, d) {
                c = c || [];
                b = b || x;
                var e = b;
                if (b.nodeType !== 1 && b.nodeType !== 9) {
                    return []
                }
                if (!a || typeof a !== "string") {
                    return c
                }
                var m, set, checkSet, extra, ret, cur, pop, i, prune = true,
                    contextXML = n.isXML(b),
                    parts = [],
                    soFar = a;
                do {
                    k.exec("");
                    m = k.exec(soFar);
                    if (m) {
                        soFar = m[3];
                        parts.push(m[1]);
                        if (m[2]) {
                            extra = m[3];
                            break
                        }
                    }
                } while (m);
                if (parts.length > 1 && p.exec(a)) {
                    if (parts.length === 2 && o.relative[parts[0]]) {
                        set = t(parts[0] + parts[1], b)
                    } else {
                        set = o.relative[parts[0]] ? [b] : n(parts.shift(), b);
                        while (parts.length) {
                            a = parts.shift();
                            if (o.relative[a]) {
                                a += parts.shift()
                            }
                            set = t(a, set)
                        }
                    }
                } else {
                    if (!d && parts.length > 1 && b.nodeType === 9 && !contextXML && o.match.ID.test(parts[0]) && !o.match.ID.test(parts[parts.length - 1])) {
                        ret = n.find(parts.shift(), b, contextXML);
                        b = ret.expr ? n.filter(ret.expr, ret.set)[0] : ret.set[0]
                    }
                    if (b) {
                        ret = d ? {
                            expr: parts.pop(),
                            set: r(d)
                        } : n.find(parts.pop(), parts.length === 1 && (parts[0] === "~" || parts[0] === "+") && b.parentNode ? b.parentNode : b, contextXML);
                        set = ret.expr ? n.filter(ret.expr, ret.set) : ret.set;
                        if (parts.length > 0) {
                            checkSet = r(set)
                        } else {
                            prune = false
                        }
                        while (parts.length) {
                            cur = parts.pop();
                            pop = cur;
                            if (!o.relative[cur]) {
                                cur = ""
                            } else {
                                pop = parts.pop()
                            }
                            if (pop == null) {
                                pop = b
                            }
                            o.relative[cur](checkSet, pop, contextXML)
                        }
                    } else {
                        checkSet = parts = []
                    }
                }
                if (!checkSet) {
                    checkSet = set
                }
                if (!checkSet) {
                    n.error(cur || a)
                }
                if (toString.call(checkSet) === "[object Array]") {
                    if (!prune) {
                        c.push.apply(c, checkSet)
                    } else if (b && b.nodeType === 1) {
                        for (i = 0; checkSet[i] != null; i++) {
                            if (checkSet[i] && (checkSet[i] === true || checkSet[i].nodeType === 1 && n.contains(b, checkSet[i]))) {
                                c.push(set[i])
                            }
                        }
                    } else {
                        for (i = 0; checkSet[i] != null; i++) {
                            if (checkSet[i] && checkSet[i].nodeType === 1) {
                                c.push(set[i])
                            }
                        }
                    }
                } else {
                    r(checkSet, c)
                }
                if (extra) {
                    n(extra, e, c, d);
                    n.uniqueSort(c)
                }
                return c
            };
        n.uniqueSort = function (a) {
            if (s) {
                hasDuplicate = baseHasDuplicate;
                a.sort(s);
                if (hasDuplicate) {
                    for (var i = 1; i < a.length; i++) {
                        if (a[i] === a[i - 1]) {
                            a.splice(i--, 1)
                        }
                    }
                }
            }
            return a
        };
        n.matches = function (a, b) {
            return n(a, null, null, b)
        };
        n.matchesSelector = function (a, b) {
            return n(b, null, null, [a]).length > 0
        };
        n.find = function (a, b, c) {
            var d;
            if (!a) {
                return []
            }
            for (var i = 0, l = o.order.length; i < l; i++) {
                var e, q = o.order[i];
                if ((e = o.leftMatch[q].exec(a))) {
                    var f = e[1];
                    e.splice(1, 1);
                    if (f.substr(f.length - 1) !== "\\") {
                        e[1] = (e[1] || "").replace(rBackslash, "");
                        d = o.find[q](e, b, c);
                        if (d != null) {
                            a = a.replace(o.match[q], "");
                            break
                        }
                    }
                }
            }
            if (!d) {
                d = typeof b.getElementsByTagName !== "undefined" ? b.getElementsByTagName("*") : []
            }
            return {
                set: d,
                expr: a
            }
        };
        n.filter = function (a, b, c, d) {
            var e, anyFound, old = a,
                result = [],
                curLoop = b,
                isXMLFilter = b && b[0] && n.isXML(b[0]);
            while (a && b.length) {
                for (var f in o.filter) {
                    if ((e = o.leftMatch[f].exec(a)) != null && e[2]) {
                        var g, item, filter = o.filter[f],
                            left = e[1];
                        anyFound = false;
                        e.splice(1, 1);
                        if (left.substr(left.length - 1) === "\\") {
                            continue
                        }
                        if (curLoop === result) {
                            result = []
                        }
                        if (o.preFilter[f]) {
                            e = o.preFilter[f](e, curLoop, c, result, d, isXMLFilter);
                            if (!e) {
                                anyFound = g = true
                            } else if (e === true) {
                                continue
                            }
                        }
                        if (e) {
                            for (var i = 0;
                            (item = curLoop[i]) != null; i++) {
                                if (item) {
                                    g = filter(item, e, i, curLoop);
                                    var h = d ^ !! g;
                                    if (c && g != null) {
                                        if (h) {
                                            anyFound = true
                                        } else {
                                            curLoop[i] = false
                                        }
                                    } else if (h) {
                                        result.push(item);
                                        anyFound = true
                                    }
                                }
                            }
                        }
                        if (g !== w) {
                            if (!c) {
                                curLoop = result
                            }
                            a = a.replace(o.match[f], "");
                            if (!anyFound) {
                                return []
                            }
                            break
                        }
                    }
                }
                if (a === old) {
                    if (anyFound == null) {
                        n.error(a)
                    } else {
                        break
                    }
                }
                old = a
            }
            return curLoop
        };
        n.error = function (a) {
            throw "Syntax error, unrecognized expression: " + a;
        };
        var o = n.selectors = {
            order: ["ID", "NAME", "TAG"],
            match: {
                ID: /#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
                CLASS: /\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
                NAME: /\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,
                ATTR: /\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,
                TAG: /^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,
                CHILD: /:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,
                POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,
                PSEUDO: /:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/
            },
            leftMatch: {},
            attrMap: {
                "class": "className",
                "for": "htmlFor"
            },
            attrHandle: {
                href: function (a) {
                    return a.getAttribute("href")
                },
                type: function (a) {
                    return a.getAttribute("type")
                }
            },
            relative: {
                "+": function (a, b) {
                    var c = typeof b === "string",
                        isTag = c && !rNonWord.test(b),
                        isPartStrNotTag = c && !isTag;
                    if (isTag) {
                        b = b.toLowerCase()
                    }
                    for (var i = 0, l = a.length, elem; i < l; i++) {
                        if ((elem = a[i])) {
                            while ((elem = elem.previousSibling) && elem.nodeType !== 1) {}
                            a[i] = isPartStrNotTag || elem && elem.nodeName.toLowerCase() === b ? elem || false : elem === b
                        }
                    }
                    if (isPartStrNotTag) {
                        n.filter(b, a, true)
                    }
                },
                ">": function (a, b) {
                    var c, isPartStr = typeof b === "string",
                        i = 0,
                        l = a.length;
                    if (isPartStr && !rNonWord.test(b)) {
                        b = b.toLowerCase();
                        for (; i < l; i++) {
                            c = a[i];
                            if (c) {
                                var d = c.parentNode;
                                a[i] = d.nodeName.toLowerCase() === b ? d : false
                            }
                        }
                    } else {
                        for (; i < l; i++) {
                            c = a[i];
                            if (c) {
                                a[i] = isPartStr ? c.parentNode : c.parentNode === b
                            }
                        }
                        if (isPartStr) {
                            n.filter(b, a, true)
                        }
                    }
                },
                "": function (a, b, c) {
                    var d, doneName = done++,
                        checkFn = dirCheck;
                    if (typeof b === "string" && !rNonWord.test(b)) {
                        b = b.toLowerCase();
                        d = b;
                        checkFn = dirNodeCheck
                    }
                    checkFn("parentNode", b, doneName, a, d, c)
                },
                "~": function (a, b, c) {
                    var d, doneName = done++,
                        checkFn = dirCheck;
                    if (typeof b === "string" && !rNonWord.test(b)) {
                        b = b.toLowerCase();
                        d = b;
                        checkFn = dirNodeCheck
                    }
                    checkFn("previousSibling", b, doneName, a, d, c)
                }
            },
            find: {
                ID: function (a, b, c) {
                    if (typeof b.getElementById !== "undefined" && !c) {
                        var m = b.getElementById(a[1]);
                        return m && m.parentNode ? [m] : []
                    }
                },
                NAME: function (a, b) {
                    if (typeof b.getElementsByName !== "undefined") {
                        var c = [],
                            results = b.getElementsByName(a[1]);
                        for (var i = 0, l = results.length; i < l; i++) {
                            if (results[i].getAttribute("name") === a[1]) {
                                c.push(results[i])
                            }
                        }
                        return c.length === 0 ? null : c
                    }
                },
                TAG: function (a, b) {
                    if (typeof b.getElementsByTagName !== "undefined") {
                        return b.getElementsByTagName(a[1])
                    }
                }
            },
            preFilter: {
                CLASS: function (a, b, c, d, e, f) {
                    a = " " + a[1].replace(rBackslash, "") + " ";
                    if (f) {
                        return a
                    }
                    for (var i = 0, elem;
                    (elem = b[i]) != null; i++) {
                        if (elem) {
                            if (e ^ (elem.className && (" " + elem.className + " ").replace(/[\t\n\r]/g, " ").indexOf(a) >= 0)) {
                                if (!c) {
                                    d.push(elem)
                                }
                            } else if (c) {
                                b[i] = false
                            }
                        }
                    }
                    return false
                },
                ID: function (a) {
                    return a[1].replace(rBackslash, "")
                },
                TAG: function (a, b) {
                    return a[1].replace(rBackslash, "").toLowerCase()
                },
                CHILD: function (a) {
                    if (a[1] === "nth") {
                        if (!a[2]) {
                            n.error(a[0])
                        }
                        a[2] = a[2].replace(/^\+|\s*/g, '');
                        var b = /(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2] === "even" && "2n" || a[2] === "odd" && "2n+1" || !/\D/.test(a[2]) && "0n+" + a[2] || a[2]);
                        a[2] = (b[1] + (b[2] || 1)) - 0;
                        a[3] = b[3] - 0
                    } else if (a[2]) {
                        n.error(a[0])
                    }
                    a[0] = done++;
                    return a
                },
                ATTR: function (a, b, c, d, e, f) {
                    var g = a[1] = a[1].replace(rBackslash, "");
                    if (!f && o.attrMap[g]) {
                        a[1] = o.attrMap[g]
                    }
                    a[4] = (a[4] || a[5] || "").replace(rBackslash, "");
                    if (a[2] === "~=") {
                        a[4] = " " + a[4] + " "
                    }
                    return a
                },
                PSEUDO: function (a, b, c, d, e) {
                    if (a[1] === "not") {
                        if ((k.exec(a[3]) || "").length > 1 || /^\w/.test(a[3])) {
                            a[3] = n(a[3], null, null, b)
                        } else {
                            var f = n.filter(a[3], b, c, true ^ e);
                            if (!c) {
                                d.push.apply(d, f)
                            }
                            return false
                        }
                    } else if (o.match.POS.test(a[0]) || o.match.CHILD.test(a[0])) {
                        return true
                    }
                    return a
                },
                POS: function (a) {
                    a.unshift(true);
                    return a
                }
            },
            filters: {
                enabled: function (a) {
                    return a.disabled === false && a.type !== "hidden"
                },
                disabled: function (a) {
                    return a.disabled === true
                },
                checked: function (a) {
                    return a.checked === true
                },
                selected: function (a) {
                    if (a.parentNode) {
                        a.parentNode.selectedIndex
                    }
                    return a.selected === true
                },
                parent: function (a) {
                    return !!a.firstChild
                },
                empty: function (a) {
                    return !a.firstChild
                },
                has: function (a, i, b) {
                    return !!n(b[3], a).length
                },
                header: function (a) {
                    return (/h\d/i).test(a.nodeName)
                },
                text: function (a) {
                    var b = a.getAttribute("type"),
                        q = a.type;
                    return "text" === q && (b === q || b === null)
                },
                radio: function (a) {
                    return "radio" === a.type
                },
                checkbox: function (a) {
                    return "checkbox" === a.type
                },
                file: function (a) {
                    return "file" === a.type
                },
                password: function (a) {
                    return "password" === a.type
                },
                submit: function (a) {
                    return "submit" === a.type
                },
                image: function (a) {
                    return "image" === a.type
                },
                reset: function (a) {
                    return "reset" === a.type
                },
                button: function (a) {
                    return "button" === a.type || a.nodeName.toLowerCase() === "button"
                },
                input: function (a) {
                    return (/input|select|textarea|button/i).test(a.nodeName)
                }
            },
            setFilters: {
                first: function (a, i) {
                    return i === 0
                },
                last: function (a, i, b, c) {
                    return i === c.length - 1
                },
                even: function (a, i) {
                    return i % 2 === 0
                },
                odd: function (a, i) {
                    return i % 2 === 1
                },
                lt: function (a, i, b) {
                    return i < b[3] - 0
                },
                gt: function (a, i, b) {
                    return i > b[3] - 0
                },
                nth: function (a, i, b) {
                    return b[3] - 0 === i
                },
                eq: function (a, i, b) {
                    return b[3] - 0 === i
                }
            },
            filter: {
                PSEUDO: function (a, b, i, c) {
                    var d = b[1],
                        filter = o.filters[d];
                    if (filter) {
                        return filter(a, i, b, c)
                    } else if (d === "contains") {
                        return (a.textContent || a.innerText || n.getText([a]) || "").indexOf(b[3]) >= 0
                    } else if (d === "not") {
                        var e = b[3];
                        for (var j = 0, l = e.length; j < l; j++) {
                            if (e[j] === a) {
                                return false
                            }
                        }
                        return true
                    } else {
                        n.error(d)
                    }
                },
                CHILD: function (a, b) {
                    var c = b[1],
                        node = a;
                    switch (c) {
                    case "only":
                    case "first":
                        while ((node = node.previousSibling)) {
                            if (node.nodeType === 1) {
                                return false
                            }
                        }
                        if (c === "first") {
                            return true
                        }
                        node = a;
                    case "last":
                        while ((node = node.nextSibling)) {
                            if (node.nodeType === 1) {
                                return false
                            }
                        }
                        return true;
                    case "nth":
                        var d = b[2],
                            last = b[3];
                        if (d === 1 && last === 0) {
                            return true
                        }
                        var e = b[0],
                            parent = a.parentNode;
                        if (parent && (parent.sizcache !== e || !a.nodeIndex)) {
                            var f = 0;
                            for (node = parent.firstChild; node; node = node.nextSibling) {
                                if (node.nodeType === 1) {
                                    node.nodeIndex = ++f
                                }
                            }
                            parent.sizcache = e
                        }
                        var g = a.nodeIndex - last;
                        if (d === 0) {
                            return g === 0
                        } else {
                            return (g % d === 0 && g / d >= 0)
                        }
                    }
                },
                ID: function (a, b) {
                    return a.nodeType === 1 && a.getAttribute("id") === b
                },
                TAG: function (a, b) {
                    return (b === "*" && a.nodeType === 1) || a.nodeName.toLowerCase() === b
                },
                CLASS: function (a, b) {
                    return (" " + (a.className || a.getAttribute("class")) + " ").indexOf(b) > -1
                },
                ATTR: function (a, b) {
                    var c = b[1],
                        result = o.attrHandle[c] ? o.attrHandle[c](a) : a[c] != null ? a[c] : a.getAttribute(c),
                        value = result + "",
                        q = b[2],
                        check = b[4];
                    return result == null ? q === "!=" : q === "=" ? value === check : q === "*=" ? value.indexOf(check) >= 0 : q === "~=" ? (" " + value + " ").indexOf(check) >= 0 : !check ? value && result !== false : q === "!=" ? value !== check : q === "^=" ? value.indexOf(check) === 0 : q === "$=" ? value.substr(value.length - check.length) === check : q === "|=" ? value === check || value.substr(0, check.length + 1) === check + "-" : false
                },
                POS: function (a, b, i, c) {
                    var d = b[2],
                        filter = o.setFilters[d];
                    if (filter) {
                        return filter(a, i, b, c)
                    }
                }
            }
        };
        var p = o.match.POS,
            fescape = function (a, b) {
                return "\\" + (b - 0 + 1)
            };
        for (var q in o.match) {
            o.match[q] = new RegExp(o.match[q].source + (/(?![^\[]*\])(?![^\(]*\))/.source));
            o.leftMatch[q] = new RegExp(/(^(?:.|\r|\n)*?)/.source + o.match[q].source.replace(/\\(\d+)/g, fescape))
        }
        var r = function (a, b) {
                a = Array.prototype.slice.call(a, 0);
                if (b) {
                    b.push.apply(b, a);
                    return b
                }
                return a
            };
        try {
            Array.prototype.slice.call(x.documentElement.childNodes, 0)[0].nodeType
        } catch (e) {
            r = function (a, b) {
                var i = 0,
                    ret = b || [];
                if (toString.call(a) === "[object Array]") {
                    Array.prototype.push.apply(ret, a)
                } else {
                    if (typeof a.length === "number") {
                        for (var l = a.length; i < l; i++) {
                            ret.push(a[i])
                        }
                    } else {
                        for (; a[i]; i++) {
                            ret.push(a[i])
                        }
                    }
                }
                return ret
            }
        }
        var s, siblingCheck;
        if (x.documentElement.compareDocumentPosition) {
            s = function (a, b) {
                if (a === b) {
                    hasDuplicate = true;
                    return 0
                }
                if (!a.compareDocumentPosition || !b.compareDocumentPosition) {
                    return a.compareDocumentPosition ? -1 : 1
                }
                return a.compareDocumentPosition(b) & 4 ? -1 : 1
            }
        } else {
            s = function (a, b) {
                var c, bl, ap = [],
                    bp = [],
                    aup = a.parentNode,
                    bup = b.parentNode,
                    cur = aup;
                if (a === b) {
                    hasDuplicate = true;
                    return 0
                } else if (aup === bup) {
                    return siblingCheck(a, b)
                } else if (!aup) {
                    return -1
                } else if (!bup) {
                    return 1
                }
                while (cur) {
                    ap.unshift(cur);
                    cur = cur.parentNode
                }
                cur = bup;
                while (cur) {
                    bp.unshift(cur);
                    cur = cur.parentNode
                }
                c = ap.length;
                bl = bp.length;
                for (var i = 0; i < c && i < bl; i++) {
                    if (ap[i] !== bp[i]) {
                        return siblingCheck(ap[i], bp[i])
                    }
                }
                return i === c ? siblingCheck(a, bp[i], -1) : siblingCheck(ap[i], b, 1)
            };
            siblingCheck = function (a, b, c) {
                if (a === b) {
                    return c
                }
                var d = a.nextSibling;
                while (d) {
                    if (d === b) {
                        return -1
                    }
                    d = d.nextSibling
                }
                return 1
            }
        }
        n.getText = function (a) {
            var b = "",
                elem;
            for (var i = 0; a[i]; i++) {
                elem = a[i];
                if (elem.nodeType === 3 || elem.nodeType === 4) {
                    b += elem.nodeValue
                } else if (elem.nodeType !== 8) {
                    b += n.getText(elem.childNodes)
                }
            }
            return b
        };
        (function () {
            var d = x.createElement("div"),
                id = "script" + (new Date()).getTime(),
                root = x.documentElement;
            d.innerHTML = "<a name='" + id + "'/>";
            root.insertBefore(d, root.firstChild);
            if (x.getElementById(id)) {
                o.find.ID = function (a, b, c) {
                    if (typeof b.getElementById !== "undefined" && !c) {
                        var m = b.getElementById(a[1]);
                        return m ? m.id === a[1] || typeof m.getAttributeNode !== "undefined" && m.getAttributeNode("id").nodeValue === a[1] ? [m] : w : []
                    }
                };
                o.filter.ID = function (a, b) {
                    var c = typeof a.getAttributeNode !== "undefined" && a.getAttributeNode("id");
                    return a.nodeType === 1 && c && c.nodeValue === b
                }
            }
            root.removeChild(d);
            root = d = null
        })();
        (function () {
            var e = x.createElement("div");
            e.appendChild(x.createComment(""));
            if (e.getElementsByTagName("*").length > 0) {
                o.find.TAG = function (a, b) {
                    var c = b.getElementsByTagName(a[1]);
                    if (a[1] === "*") {
                        var d = [];
                        for (var i = 0; c[i]; i++) {
                            if (c[i].nodeType === 1) {
                                d.push(c[i])
                            }
                        }
                        c = d
                    }
                    return c
                }
            }
            e.innerHTML = "<a href='#'></a>";
            if (e.firstChild && typeof e.firstChild.getAttribute !== "undefined" && e.firstChild.getAttribute("href") !== "#") {
                o.attrHandle.href = function (a) {
                    return a.getAttribute("href", 2)
                }
            }
            e = null
        })();
        if (x.querySelectorAll) {
            (function () {
                var h = n,
                    div = x.createElement("div"),
                    id = "__sizzle__";
                div.innerHTML = "<p class='TEST'></p>";
                if (div.querySelectorAll && div.querySelectorAll(".TEST").length === 0) {
                    return
                }
                n = function (a, b, c, d) {
                    b = b || x;
                    if (!d && !n.isXML(b)) {
                        var e = /^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(a);
                        if (e && (b.nodeType === 1 || b.nodeType === 9)) {
                            if (e[1]) {
                                return r(b.getElementsByTagName(a), c)
                            } else if (e[2] && o.find.CLASS && b.getElementsByClassName) {
                                return r(b.getElementsByClassName(e[2]), c)
                            }
                        }
                        if (b.nodeType === 9) {
                            if (a === "body" && b.body) {
                                return r([b.body], c)
                            } else if (e && e[3]) {
                                var f = b.getElementById(e[3]);
                                if (f && f.parentNode) {
                                    if (f.id === e[3]) {
                                        return r([f], c)
                                    }
                                } else {
                                    return r([], c)
                                }
                            }
                            try {
                                return r(b.querySelectorAll(a), c)
                            } catch (qsaError) {}
                        } else if (b.nodeType === 1 && b.nodeName.toLowerCase() !== "object") {
                            var g = b,
                                old = b.getAttribute("id"),
                                nid = old || id,
                                hasParent = b.parentNode,
                                relativeHierarchySelector = /^\s*[+~]/.test(a);
                            if (!old) {
                                b.setAttribute("id", nid)
                            } else {
                                nid = nid.replace(/'/g, "\\$&")
                            }
                            if (relativeHierarchySelector && hasParent) {
                                b = b.parentNode
                            }
                            try {
                                if (!relativeHierarchySelector || hasParent) {
                                    return r(b.querySelectorAll("[id='" + nid + "'] " + a), c)
                                }
                            } catch (pseudoError) {} finally {
                                if (!old) {
                                    g.removeAttribute("id")
                                }
                            }
                        }
                    }
                    return h(a, b, c, d)
                };
                for (var i in h) {
                    n[i] = h[i]
                }
                div = null
            })()
        }(function () {
            var d = x.documentElement,
                matches = d.matchesSelector || d.mozMatchesSelector || d.webkitMatchesSelector || d.msMatchesSelector;
            if (matches) {
                var f = !matches.call(x.createElement("div"), "div"),
                    pseudoWorks = false;
                try {
                    matches.call(x.documentElement, "[test!='']:sizzle")
                } catch (pseudoError) {
                    pseudoWorks = true
                }
                n.matchesSelector = function (a, b) {
                    b = b.replace(/\=\s*([^'"\]]*)\s*\]/g, "='$1']");
                    if (!n.isXML(a)) {
                        try {
                            if (pseudoWorks || !o.match.PSEUDO.test(b) && !/!=/.test(b)) {
                                var c = matches.call(a, b);
                                if (c || !f || a.document && a.document.nodeType !== 11) {
                                    return c
                                }
                            }
                        } catch (e) {}
                    }
                    return n(b, null, null, [a]).length > 0
                }
            }
        })();
        (function () {
            var d = x.createElement("div");
            d.innerHTML = "<div class='test e'></div><div class='test'></div>";
            if (!d.getElementsByClassName || d.getElementsByClassName("e").length === 0) {
                return
            }
            d.lastChild.className = "e";
            if (d.getElementsByClassName("e").length === 1) {
                return
            }
            o.order.splice(1, 0, "CLASS");
            o.find.CLASS = function (a, b, c) {
                if (typeof b.getElementsByClassName !== "undefined" && !c) {
                    return b.getElementsByClassName(a[1])
                }
            };
            d = null
        })();

        function dirNodeCheck(a, b, c, d, e, f) {
            for (var i = 0, l = d.length; i < l; i++) {
                var g = d[i];
                if (g) {
                    var h = false;
                    g = g[a];
                    while (g) {
                        if (g.sizcache === c) {
                            h = d[g.sizset];
                            break
                        }
                        if (g.nodeType === 1 && !f) {
                            g.sizcache = c;
                            g.sizset = i
                        }
                        if (g.nodeName.toLowerCase() === b) {
                            h = g;
                            break
                        }
                        g = g[a]
                    }
                    d[i] = h
                }
            }
        }
        function dirCheck(a, b, c, d, e, f) {
            for (var i = 0, l = d.length; i < l; i++) {
                var g = d[i];
                if (g) {
                    var h = false;
                    g = g[a];
                    while (g) {
                        if (g.sizcache === c) {
                            h = d[g.sizset];
                            break
                        }
                        if (g.nodeType === 1) {
                            if (!f) {
                                g.sizcache = c;
                                g.sizset = i
                            }
                            if (typeof b !== "string") {
                                if (g === b) {
                                    h = true;
                                    break
                                }
                            } else if (n.filter(b, [g]).length > 0) {
                                h = g;
                                break
                            }
                        }
                        g = g[a]
                    }
                    d[i] = h
                }
            }
        }
        if (x.documentElement.contains) {
            n.contains = function (a, b) {
                return a !== b && (a.contains ? a.contains(b) : true)
            }
        } else if (x.documentElement.compareDocumentPosition) {
            n.contains = function (a, b) {
                return !!(a.compareDocumentPosition(b) & 16)
            }
        } else {
            n.contains = function () {
                return false
            }
        }
        n.isXML = function (a) {
            var b = (a ? a.ownerDocument || a : 0).documentElement;
            return b ? b.nodeName !== "HTML" : false
        };
        var t = function (a, b) {
                var c, tmpSet = [],
                    later = "",
                    root = b.nodeType ? [b] : b;
                while ((c = o.match.PSEUDO.exec(a))) {
                    later += c[0];
                    a = a.replace(o.match.PSEUDO, "")
                }
                a = o.relative[a] ? a + "*" : a;
                for (var i = 0, l = root.length; i < l; i++) {
                    n(a, root[i], tmpSet)
                }
                return n.filter(later, tmpSet)
            };
        y.find = n;
        y.expr = n.selectors;
        y.expr[":"] = y.expr.filters;
        y.unique = n.uniqueSort;
        y.text = n.getText;
        y.isXMLDoc = n.isXML;
        y.contains = n.contains
    })();
    var G = /Until$/,
        rparentsprev = /^(?:parents|prevUntil|prevAll)/,
        rmultiselector = /,/,
        isSimple = /^.[^:#\[\.,]*$/,
        slice = Array.prototype.slice,
        POS = y.expr.match.POS,
        guaranteedUnique = {
            children: true,
            contents: true,
            next: true,
            prev: true
        };
    y.fn.extend({
        find: function (a) {
            var b = this.pushStack("", "find", a),
                length = 0;
            for (var i = 0, l = this.length; i < l; i++) {
                length = b.length;
                y.find(a, this[i], b);
                if (i > 0) {
                    for (var n = length; n < b.length; n++) {
                        for (var r = 0; r < length; r++) {
                            if (b[r] === b[n]) {
                                b.splice(n--, 1);
                                break
                            }
                        }
                    }
                }
            }
            return b
        },
        has: function (a) {
            var b = y(a);
            return this.filter(function () {
                for (var i = 0, l = b.length; i < l; i++) {
                    if (y.contains(this, b[i])) {
                        return true
                    }
                }
            })
        },
        not: function (a) {
            return this.pushStack(winnow(this, a, false), "not", a)
        },
        filter: function (a) {
            return this.pushStack(winnow(this, a, true), "filter", a)
        },
        is: function (a) {
            return !!a && y.filter(a, this).length > 0
        },
        closest: function (a, b) {
            var c = [],
                i, l, cur = this[0];
            if (y.isArray(a)) {
                var d, selector, matches = {},
                    level = 1;
                if (cur && a.length) {
                    for (i = 0, l = a.length; i < l; i++) {
                        selector = a[i];
                        if (!matches[selector]) {
                            matches[selector] = y.expr.match.POS.test(selector) ? y(selector, b || this.context) : selector
                        }
                    }
                    while (cur && cur.ownerDocument && cur !== b) {
                        for (selector in matches) {
                            d = matches[selector];
                            if (d.jquery ? d.index(cur) > -1 : y(cur).is(d)) {
                                c.push({
                                    selector: selector,
                                    elem: cur,
                                    level: level
                                })
                            }
                        }
                        cur = cur.parentNode;
                        level++
                    }
                }
                return c
            }
            var e = POS.test(a) ? y(a, b || this.context) : null;
            for (i = 0, l = this.length; i < l; i++) {
                cur = this[i];
                while (cur) {
                    if (e ? e.index(cur) > -1 : y.find.matchesSelector(cur, a)) {
                        c.push(cur);
                        break
                    } else {
                        cur = cur.parentNode;
                        if (!cur || !cur.ownerDocument || cur === b) {
                            break
                        }
                    }
                }
            }
            c = c.length > 1 ? y.unique(c) : c;
            return this.pushStack(c, "closest", a)
        },
        index: function (a) {
            if (!a || typeof a === "string") {
                return y.inArray(this[0], a ? y(a) : this.parent().children())
            }
            return y.inArray(a.jquery ? a[0] : a, this)
        },
        add: function (a, b) {
            var c = typeof a === "string" ? y(a, b) : y.makeArray(a),
                all = y.merge(this.get(), c);
            return this.pushStack(isDisconnected(c[0]) || isDisconnected(all[0]) ? all : y.unique(all))
        },
        andSelf: function () {
            return this.add(this.prevObject)
        }
    });

    function isDisconnected(a) {
        return !a || !a.parentNode || a.parentNode.nodeType === 11
    }
    y.each({
        parent: function (a) {
            var b = a.parentNode;
            return b && b.nodeType !== 11 ? b : null
        },
        parents: function (a) {
            return y.dir(a, "parentNode")
        },
        parentsUntil: function (a, i, b) {
            return y.dir(a, "parentNode", b)
        },
        next: function (a) {
            return y.nth(a, 2, "nextSibling")
        },
        prev: function (a) {
            return y.nth(a, 2, "previousSibling")
        },
        nextAll: function (a) {
            return y.dir(a, "nextSibling")
        },
        prevAll: function (a) {
            return y.dir(a, "previousSibling")
        },
        nextUntil: function (a, i, b) {
            return y.dir(a, "nextSibling", b)
        },
        prevUntil: function (a, i, b) {
            return y.dir(a, "previousSibling", b)
        },
        siblings: function (a) {
            return y.sibling(a.parentNode.firstChild, a)
        },
        children: function (a) {
            return y.sibling(a.firstChild)
        },
        contents: function (a) {
            return y.nodeName(a, "iframe") ? a.contentDocument || a.contentWindow.document : y.makeArray(a.childNodes)
        }
    }, function (d, e) {
        y.fn[d] = function (a, b) {
            var c = y.map(this, e, a),
                args = slice.call(arguments);
            if (!G.test(d)) {
                b = a
            }
            if (b && typeof b === "string") {
                c = y.filter(b, c)
            }
            c = this.length > 1 && !guaranteedUnique[d] ? y.unique(c) : c;
            if ((this.length > 1 || rmultiselector.test(b)) && rparentsprev.test(d)) {
                c = c.reverse()
            }
            return this.pushStack(c, d, args.join(","))
        }
    });
    y.extend({
        filter: function (a, b, c) {
            if (c) {
                a = ":not(" + a + ")"
            }
            return b.length === 1 ? y.find.matchesSelector(b[0], a) ? [b[0]] : [] : y.find.matches(a, b)
        },
        dir: function (a, b, c) {
            var d = [],
                cur = a[b];
            while (cur && cur.nodeType !== 9 && (c === w || cur.nodeType !== 1 || !y(cur).is(c))) {
                if (cur.nodeType === 1) {
                    d.push(cur)
                }
                cur = cur[b]
            }
            return d
        },
        nth: function (a, b, c, d) {
            b = b || 1;
            var e = 0;
            for (; a; a = a[c]) {
                if (a.nodeType === 1 && ++e === b) {
                    break
                }
            }
            return a
        },
        sibling: function (n, a) {
            var r = [];
            for (; n; n = n.nextSibling) {
                if (n.nodeType === 1 && n !== a) {
                    r.push(n)
                }
            }
            return r
        }
    });

    function winnow(c, d, e) {
        if (y.isFunction(d)) {
            return y.grep(c, function (a, i) {
                var b = !! d.call(a, i, a);
                return b === e
            })
        } else if (d.nodeType) {
            return y.grep(c, function (a, i) {
                return (a === d) === e
            })
        } else if (typeof d === "string") {
            var f = y.grep(c, function (a) {
                return a.nodeType === 1
            });
            if (isSimple.test(d)) {
                return y.filter(d, f, !e)
            } else {
                d = y.filter(d, f)
            }
        }
        return y.grep(c, function (a, i) {
            return (y.inArray(a, d) >= 0) === e
        })
    }
    var H = / jQuery\d+="(?:\d+|null)"/g,
        rleadingWhitespace = /^\s+/,
        rxhtmlTag = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
        rtagName = /<([\w:]+)/,
        rtbody = /<tbody/i,
        rhtml = /<|&#?\w+;/,
        rnocache = /<(?:script|object|embed|option|style)/i,
        rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i,
        wrapMap = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            area: [1, "<map>", "</map>"],
            _default: [0, "", ""]
        };
    wrapMap.optgroup = wrapMap.option;
    wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead;
    wrapMap.th = wrapMap.td;
    if (!y.support.htmlSerialize) {
        wrapMap._default = [1, "div<div>", "</div>"]
    }
    y.fn.extend({
        text: function (b) {
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    var a = y(this);
                    a.text(b.call(this, i, a.text()))
                })
            }
            if (typeof b !== "object" && b !== w) {
                return this.empty().append((this[0] && this[0].ownerDocument || x).createTextNode(b))
            }
            return y.text(this)
        },
        wrapAll: function (b) {
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    y(this).wrapAll(b.call(this, i))
                })
            }
            if (this[0]) {
                var c = y(b, this[0].ownerDocument).eq(0).clone(true);
                if (this[0].parentNode) {
                    c.insertBefore(this[0])
                }
                c.map(function () {
                    var a = this;
                    while (a.firstChild && a.firstChild.nodeType === 1) {
                        a = a.firstChild
                    }
                    return a
                }).append(this)
            }
            return this
        },
        wrapInner: function (b) {
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    y(this).wrapInner(b.call(this, i))
                })
            }
            return this.each(function () {
                var a = y(this),
                    contents = a.contents();
                if (contents.length) {
                    contents.wrapAll(b)
                } else {
                    a.append(b)
                }
            })
        },
        wrap: function (a) {
            return this.each(function () {
                y(this).wrapAll(a)
            })
        },
        unwrap: function () {
            return this.parent().each(function () {
                if (!y.nodeName(this, "body")) {
                    y(this).replaceWith(this.childNodes)
                }
            }).end()
        },
        append: function () {
            return this.domManip(arguments, true, function (a) {
                if (this.nodeType === 1) {
                    this.appendChild(a)
                }
            })
        },
        prepend: function () {
            return this.domManip(arguments, true, function (a) {
                if (this.nodeType === 1) {
                    this.insertBefore(a, this.firstChild)
                }
            })
        },
        before: function () {
            if (this[0] && this[0].parentNode) {
                return this.domManip(arguments, false, function (a) {
                    this.parentNode.insertBefore(a, this)
                })
            } else if (arguments.length) {
                var b = y(arguments[0]);
                b.push.apply(b, this.toArray());
                return this.pushStack(b, "before", arguments)
            }
        },
        after: function () {
            if (this[0] && this[0].parentNode) {
                return this.domManip(arguments, false, function (a) {
                    this.parentNode.insertBefore(a, this.nextSibling)
                })
            } else if (arguments.length) {
                var b = this.pushStack(this, "after", arguments);
                b.push.apply(b, y(arguments[0]).toArray());
                return b
            }
        },
        remove: function (a, b) {
            for (var i = 0, elem;
            (elem = this[i]) != null; i++) {
                if (!a || y.filter(a, [elem]).length) {
                    if (!b && elem.nodeType === 1) {
                        y.cleanData(elem.getElementsByTagName("*"));
                        y.cleanData([elem])
                    }
                    if (elem.parentNode) {
                        elem.parentNode.removeChild(elem)
                    }
                }
            }
            return this
        },
        empty: function () {
            for (var i = 0, elem;
            (elem = this[i]) != null; i++) {
                if (elem.nodeType === 1) {
                    y.cleanData(elem.getElementsByTagName("*"))
                }
                while (elem.firstChild) {
                    elem.removeChild(elem.firstChild)
                }
            }
            return this
        },
        clone: function (a, b) {
            a = a == null ? false : a;
            b = b == null ? a : b;
            return this.map(function () {
                return y.clone(this, a, b)
            })
        },
        html: function (b) {
            if (b === w) {
                return this[0] && this[0].nodeType === 1 ? this[0].innerHTML.replace(H, "") : null
            } else if (typeof b === "string" && !rnocache.test(b) && (y.support.leadingWhitespace || !rleadingWhitespace.test(b)) && !wrapMap[(rtagName.exec(b) || ["", ""])[1].toLowerCase()]) {
                b = b.replace(rxhtmlTag, "<$1></$2>");
                try {
                    for (var i = 0, l = this.length; i < l; i++) {
                        if (this[i].nodeType === 1) {
                            y.cleanData(this[i].getElementsByTagName("*"));
                            this[i].innerHTML = b
                        }
                    }
                } catch (e) {
                    this.empty().append(b)
                }
            } else if (y.isFunction(b)) {
                this.each(function (i) {
                    var a = y(this);
                    a.html(b.call(this, i, a.html()))
                })
            } else {
                this.empty().append(b)
            }
            return this
        },
        replaceWith: function (b) {
            if (this[0] && this[0].parentNode) {
                if (y.isFunction(b)) {
                    return this.each(function (i) {
                        var a = y(this),
                            old = a.html();
                        a.replaceWith(b.call(this, i, old))
                    })
                }
                if (typeof b !== "string") {
                    b = y(b).detach()
                }
                return this.each(function () {
                    var a = this.nextSibling,
                        parent = this.parentNode;
                    y(this).remove();
                    if (a) {
                        y(a).before(b)
                    } else {
                        y(parent).append(b)
                    }
                })
            } else {
                return this.length ? this.pushStack(y(y.isFunction(b) ? b() : b), "replaceWith", b) : this
            }
        },
        detach: function (a) {
            return this.remove(a, true)
        },
        domManip: function (b, c, d) {
            var e, first, fragment, parent, value = b[0],
                scripts = [];
            if (!y.support.checkClone && arguments.length === 3 && typeof value === "string" && rchecked.test(value)) {
                return this.each(function () {
                    y(this).domManip(b, c, d, true)
                })
            }
            if (y.isFunction(value)) {
                return this.each(function (i) {
                    var a = y(this);
                    b[0] = value.call(this, i, c ? a.html() : w);
                    a.domManip(b, c, d)
                })
            }
            if (this[0]) {
                parent = value && value.parentNode;
                if (y.support.parentNode && parent && parent.nodeType === 11 && parent.childNodes.length === this.length) {
                    e = {
                        fragment: parent
                    }
                } else {
                    e = y.buildFragment(b, this, scripts)
                }
                fragment = e.fragment;
                if (fragment.childNodes.length === 1) {
                    first = fragment = fragment.firstChild
                } else {
                    first = fragment.firstChild
                }
                if (first) {
                    c = c && y.nodeName(first, "tr");
                    for (var i = 0, l = this.length, lastIndex = l - 1; i < l; i++) {
                        d.call(c ? root(this[i], first) : this[i], e.cacheable || (l > 1 && i < lastIndex) ? y.clone(fragment, true, true) : fragment)
                    }
                }
                if (scripts.length) {
                    y.each(scripts, evalScript)
                }
            }
            return this
        }
    });

    function root(a, b) {
        return y.nodeName(a, "table") ? (a.getElementsByTagName("tbody")[0] || a.appendChild(a.ownerDocument.createElement("tbody"))) : a
    }
    function cloneCopyEvent(a, b) {
        if (b.nodeType !== 1 || !y.hasData(a)) {
            return
        }
        var c = y.expando,
            oldData = y.data(a),
            curData = y.data(b, oldData);
        if ((oldData = oldData[c])) {
            var d = oldData.events;
            curData = curData[c] = y.extend({}, oldData);
            if (d) {
                delete curData.handle;
                curData.events = {};
                for (var e in d) {
                    for (var i = 0, l = d[e].length; i < l; i++) {
                        y.event.add(b, e + (d[e][i].namespace ? "." : "") + d[e][i].namespace, d[e][i], d[e][i].data)
                    }
                }
            }
        }
    }
    function cloneFixAttributes(a, b) {
        if (b.nodeType !== 1) {
            return
        }
        var c = b.nodeName.toLowerCase();
        b.clearAttributes();
        b.mergeAttributes(a);
        if (c === "object") {
            b.outerHTML = a.outerHTML
        } else if (c === "input" && (a.type === "checkbox" || a.type === "radio")) {
            if (a.checked) {
                b.defaultChecked = b.checked = a.checked
            }
            if (b.value !== a.value) {
                b.value = a.value
            }
        } else if (c === "option") {
            b.selected = a.defaultSelected
        } else if (c === "input" || c === "textarea") {
            b.defaultValue = a.defaultValue
        }
        b.removeAttribute(y.expando)
    }
    y.buildFragment = function (a, b, c) {
        var d, cacheable, cacheresults, doc = (b && b[0] ? b[0].ownerDocument || b[0] : x);
        if (a.length === 1 && typeof a[0] === "string" && a[0].length < 512 && doc === x && a[0].charAt(0) === "<" && !rnocache.test(a[0]) && (y.support.checkClone || !rchecked.test(a[0]))) {
            cacheable = true;
            cacheresults = y.fragments[a[0]];
            if (cacheresults) {
                if (cacheresults !== 1) {
                    d = cacheresults
                }
            }
        }
        if (!d) {
            d = doc.createDocumentFragment();
            y.clean(a, doc, d, c)
        }
        if (cacheable) {
            y.fragments[a[0]] = cacheresults ? d : 1
        }
        return {
            fragment: d,
            cacheable: cacheable
        }
    };
    y.fragments = {};
    y.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (d, e) {
        y.fn[d] = function (a) {
            var b = [],
                insert = y(a),
                parent = this.length === 1 && this[0].parentNode;
            if (parent && parent.nodeType === 11 && parent.childNodes.length === 1 && insert.length === 1) {
                insert[e](this[0]);
                return this
            } else {
                for (var i = 0, l = insert.length; i < l; i++) {
                    var c = (i > 0 ? this.clone(true) : this).get();
                    y(insert[i])[e](c);
                    b = b.concat(c)
                }
                return this.pushStack(b, d, insert.selector)
            }
        }
    });

    function getAll(a) {
        if ("getElementsByTagName" in a) {
            return a.getElementsByTagName("*")
        } else if ("querySelectorAll" in a) {
            return a.querySelectorAll("*")
        } else {
            return []
        }
    }
    y.extend({
        clone: function (a, b, c) {
            var d = a.cloneNode(true),
                srcElements, destElements, i;
            if ((!y.support.noCloneEvent || !y.support.noCloneChecked) && (a.nodeType === 1 || a.nodeType === 11) && !y.isXMLDoc(a)) {
                cloneFixAttributes(a, d);
                srcElements = getAll(a);
                destElements = getAll(d);
                for (i = 0; srcElements[i]; ++i) {
                    cloneFixAttributes(srcElements[i], destElements[i])
                }
            }
            if (b) {
                cloneCopyEvent(a, d);
                if (c) {
                    srcElements = getAll(a);
                    destElements = getAll(d);
                    for (i = 0; srcElements[i]; ++i) {
                        cloneCopyEvent(srcElements[i], destElements[i])
                    }
                }
            }
            return d
        },
        clean: function (a, b, c, d) {
            b = b || x;
            if (typeof b.createElement === "undefined") {
                b = b.ownerDocument || b[0] && b[0].ownerDocument || x
            }
            var e = [];
            for (var i = 0, elem;
            (elem = a[i]) != null; i++) {
                if (typeof elem === "number") {
                    elem += ""
                }
                if (!elem) {
                    continue
                }
                if (typeof elem === "string" && !rhtml.test(elem)) {
                    elem = b.createTextNode(elem)
                } else if (typeof elem === "string") {
                    elem = elem.replace(rxhtmlTag, "<$1></$2>");
                    var f = (rtagName.exec(elem) || ["", ""])[1].toLowerCase(),
                        wrap = wrapMap[f] || wrapMap._default,
                        depth = wrap[0],
                        div = b.createElement("div");
                    div.innerHTML = wrap[1] + elem + wrap[2];
                    while (depth--) {
                        div = div.lastChild
                    }
                    if (!y.support.tbody) {
                        var g = rtbody.test(elem),
                            tbody = f === "table" && !g ? div.firstChild && div.firstChild.childNodes : wrap[1] === "<table>" && !g ? div.childNodes : [];
                        for (var j = tbody.length - 1; j >= 0; --j) {
                            if (y.nodeName(tbody[j], "tbody") && !tbody[j].childNodes.length) {
                                tbody[j].parentNode.removeChild(tbody[j])
                            }
                        }
                    }
                    if (!y.support.leadingWhitespace && rleadingWhitespace.test(elem)) {
                        div.insertBefore(b.createTextNode(rleadingWhitespace.exec(elem)[0]), div.firstChild)
                    }
                    elem = div.childNodes
                }
                if (elem.nodeType) {
                    e.push(elem)
                } else {
                    e = y.merge(e, elem)
                }
            }
            if (c) {
                for (i = 0; e[i]; i++) {
                    if (d && y.nodeName(e[i], "script") && (!e[i].type || e[i].type.toLowerCase() === "text/javascript")) {
                        d.push(e[i].parentNode ? e[i].parentNode.removeChild(e[i]) : e[i])
                    } else {
                        if (e[i].nodeType === 1) {
                            e.splice.apply(e, [i + 1, 0].concat(y.makeArray(e[i].getElementsByTagName("script"))))
                        }
                        c.appendChild(e[i])
                    }
                }
            }
            return e
        },
        cleanData: function (a) {
            var b, id, cache = y.cache,
                internalKey = y.expando,
                special = y.event.special,
                deleteExpando = y.support.deleteExpando;
            for (var i = 0, elem;
            (elem = a[i]) != null; i++) {
                if (elem.nodeName && y.noData[elem.nodeName.toLowerCase()]) {
                    continue
                }
                id = elem[y.expando];
                if (id) {
                    b = cache[id] && cache[id][internalKey];
                    if (b && b.events) {
                        for (var c in b.events) {
                            if (special[c]) {
                                y.event.remove(elem, c)
                            } else {
                                y.removeEvent(elem, c, b.handle)
                            }
                        }
                        if (b.handle) {
                            b.handle.elem = null
                        }
                    }
                    if (deleteExpando) {
                        delete elem[y.expando]
                    } else if (elem.removeAttribute) {
                        elem.removeAttribute(y.expando)
                    }
                    delete cache[id]
                }
            }
        }
    });

    function evalScript(i, a) {
        if (a.src) {
            y.ajax({
                url: a.src,
                async: false,
                dataType: "script"
            })
        } else {
            y.globalEval(a.text || a.textContent || a.innerHTML || "")
        }
        if (a.parentNode) {
            a.parentNode.removeChild(a)
        }
    }
    var I = /alpha\([^)]*\)/i,
        ropacity = /opacity=([^)]*)/,
        rdashAlpha = /-([a-z])/ig,
        rupper = /([A-Z]|^ms)/g,
        rnumpx = /^-?\d+(?:px)?$/i,
        rnum = /^-?\d/,
        cssShow = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        cssWidth = ["Left", "Right"],
        cssHeight = ["Top", "Bottom"],
        curCSS, getComputedStyle, currentStyle, fcamelCase = function (a, b) {
            return b.toUpperCase()
        };
    y.fn.css = function (d, e) {
        if (arguments.length === 2 && e === w) {
            return this
        }
        return y.access(this, d, e, true, function (a, b, c) {
            return c !== w ? y.style(a, b, c) : y.css(a, b)
        })
    };
    y.extend({
        cssHooks: {
            opacity: {
                get: function (a, b) {
                    if (b) {
                        var c = curCSS(a, "opacity", "opacity");
                        return c === "" ? "1" : c
                    } else {
                        return a.style.opacity
                    }
                }
            }
        },
        cssNumber: {
            "zIndex": true,
            "fontWeight": true,
            "opacity": true,
            "zoom": true,
            "lineHeight": true
        },
        cssProps: {
            "float": y.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function (a, b, c, d) {
            if (!a || a.nodeType === 3 || a.nodeType === 8 || !a.style) {
                return
            }
            var f, origName = y.camelCase(b),
                style = a.style,
                hooks = y.cssHooks[origName];
            b = y.cssProps[origName] || origName;
            if (c !== w) {
                if (typeof c === "number" && isNaN(c) || c == null) {
                    return
                }
                if (typeof c === "number" && !y.cssNumber[origName]) {
                    c += "px"
                }
                if (!hooks || !("set" in hooks) || (c = hooks.set(a, c)) !== w) {
                    try {
                        style[b] = c
                    } catch (e) {}
                }
            } else {
                if (hooks && "get" in hooks && (f = hooks.get(a, false, d)) !== w) {
                    return f
                }
                return style[b]
            }
        },
        css: function (a, b, c) {
            var d, origName = y.camelCase(b),
                hooks = y.cssHooks[origName];
            b = y.cssProps[origName] || origName;
            if (hooks && "get" in hooks && (d = hooks.get(a, true, c)) !== w) {
                return d
            } else if (curCSS) {
                return curCSS(a, b, origName)
            }
        },
        swap: function (a, b, c) {
            var d = {};
            for (var e in b) {
                d[e] = a.style[e];
                a.style[e] = b[e]
            }
            c.call(a);
            for (e in b) {
                a.style[e] = d[e]
            }
        },
        camelCase: function (a) {
            return a.replace(rdashAlpha, fcamelCase)
        }
    });
    y.curCSS = y.css;
    y.each(["height", "width"], function (i, e) {
        y.cssHooks[e] = {
            get: function (a, b, c) {
                var d;
                if (b) {
                    if (a.offsetWidth !== 0) {
                        d = getWH(a, e, c)
                    } else {
                        y.swap(a, cssShow, function () {
                            d = getWH(a, e, c)
                        })
                    }
                    if (d <= 0) {
                        d = curCSS(a, e, e);
                        if (d === "0px" && currentStyle) {
                            d = currentStyle(a, e, e)
                        }
                        if (d != null) {
                            return d === "" || d === "auto" ? "0px" : d
                        }
                    }
                    if (d < 0 || d == null) {
                        d = a.style[e];
                        return d === "" || d === "auto" ? "0px" : d
                    }
                    return typeof d === "string" ? d : d + "px"
                }
            },
            set: function (a, b) {
                if (rnumpx.test(b)) {
                    b = parseFloat(b);
                    if (b >= 0) {
                        return b + "px"
                    }
                } else {
                    return b
                }
            }
        }
    });
    if (!y.support.opacity) {
        y.cssHooks.opacity = {
            get: function (a, b) {
                return ropacity.test((b && a.currentStyle ? a.currentStyle.filter : a.style.filter) || "") ? (parseFloat(RegExp.$1) / 100) + "" : b ? "1" : ""
            },
            set: function (a, b) {
                var c = a.style;
                c.zoom = 1;
                var d = y.isNaN(b) ? "" : "alpha(opacity=" + b * 100 + ")",
                    filter = c.filter || "";
                c.filter = I.test(filter) ? filter.replace(I, d) : c.filter + ' ' + d
            }
        }
    }
    y(function () {
        if (!y.support.reliableMarginRight) {
            y.cssHooks.marginRight = {
                get: function (a, b) {
                    var c;
                    y.swap(a, {
                        "display": "inline-block"
                    }, function () {
                        if (b) {
                            c = curCSS(a, "margin-right", "marginRight")
                        } else {
                            c = a.style.marginRight
                        }
                    });
                    return c
                }
            }
        }
    });
    if (x.defaultView && x.defaultView.getComputedStyle) {
        getComputedStyle = function (a, b, c) {
            var d, defaultView, computedStyle;
            c = c.replace(rupper, "-$1").toLowerCase();
            if (!(defaultView = a.ownerDocument.defaultView)) {
                return w
            }
            if ((computedStyle = defaultView.getComputedStyle(a, null))) {
                d = computedStyle.getPropertyValue(c);
                if (d === "" && !y.contains(a.ownerDocument.documentElement, a)) {
                    d = y.style(a, c)
                }
            }
            return d
        }
    }
    if (x.documentElement.currentStyle) {
        currentStyle = function (a, b) {
            var c, ret = a.currentStyle && a.currentStyle[b],
                rsLeft = a.runtimeStyle && a.runtimeStyle[b],
                style = a.style;
            if (!rnumpx.test(ret) && rnum.test(ret)) {
                c = style.left;
                if (rsLeft) {
                    a.runtimeStyle.left = a.currentStyle.left
                }
                style.left = b === "fontSize" ? "1em" : (ret || 0);
                ret = style.pixelLeft + "px";
                style.left = c;
                if (rsLeft) {
                    a.runtimeStyle.left = rsLeft
                }
            }
            return ret === "" ? "auto" : ret
        }
    }
    curCSS = getComputedStyle || currentStyle;

    function getWH(a, b, c) {
        var d = b === "width" ? cssWidth : cssHeight,
            val = b === "width" ? a.offsetWidth : a.offsetHeight;
        if (c === "border") {
            return val
        }
        y.each(d, function () {
            if (!c) {
                val -= parseFloat(y.css(a, "padding" + this)) || 0
            }
            if (c === "margin") {
                val += parseFloat(y.css(a, "margin" + this)) || 0
            } else {
                val -= parseFloat(y.css(a, "border" + this + "Width")) || 0
            }
        });
        return val
    }
    if (y.expr && y.expr.filters) {
        y.expr.filters.hidden = function (a) {
            var b = a.offsetWidth,
                height = a.offsetHeight;
            return (b === 0 && height === 0) || (!y.support.reliableHiddenOffsets && (a.style.display || y.css(a, "display")) === "none")
        };
        y.expr.filters.visible = function (a) {
            return !y.expr.filters.hidden(a)
        }
    }
    var J = /%20/g,
        rbracket = /\[\]$/,
        rCRLF = /\r?\n/g,
        rhash = /#.*$/,
        rheaders = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
        rinput = /^(?:color|date|datetime|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
        rlocalProtocol = /^(?:about|app|app\-storage|.+\-extension|file|widget):$/,
        rnoContent = /^(?:GET|HEAD)$/,
        rprotocol = /^\/\//,
        rquery = /\?/,
        rscript = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        rselectTextarea = /^(?:select|textarea)/i,
        rspacesAjax = /\s+/,
        rts = /([?&])_=[^&]*/,
        rucHeaders = /(^|\-)([a-z])/g,
        rucHeadersFunc = function (_, a, b) {
            return a + b.toUpperCase()
        },
        rurl = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,
        _load = y.fn.load,
        prefilters = {},
        transports = {},
        ajaxLocation, ajaxLocParts;
    try {
        ajaxLocation = x.location.href
    } catch (e) {
        ajaxLocation = x.createElement("a");
        ajaxLocation.href = "";
        ajaxLocation = ajaxLocation.href
    }
    ajaxLocParts = rurl.exec(ajaxLocation.toLowerCase()) || [];

    function addToPrefiltersOrTransports(d) {
        return function (a, b) {
            if (typeof a !== "string") {
                b = a;
                a = "*"
            }
            if (y.isFunction(b)) {
                var c = a.toLowerCase().split(rspacesAjax),
                    i = 0,
                    length = c.length,
                    dataType, list, placeBefore;
                for (; i < length; i++) {
                    dataType = c[i];
                    placeBefore = /^\+/.test(dataType);
                    if (placeBefore) {
                        dataType = dataType.substr(1) || "*"
                    }
                    list = d[dataType] = d[dataType] || [];
                    list[placeBefore ? "unshift" : "push"](b)
                }
            }
        }
    }
    function inspectPrefiltersOrTransports(a, b, c, d, e, f) {
        e = e || b.dataTypes[0];
        f = f || {};
        f[e] = true;
        var g = a[e],
            i = 0,
            length = g ? g.length : 0,
            executeOnly = (a === prefilters),
            selection;
        for (; i < length && (executeOnly || !selection); i++) {
            selection = g[i](b, c, d);
            if (typeof selection === "string") {
                if (!executeOnly || f[selection]) {
                    selection = w
                } else {
                    b.dataTypes.unshift(selection);
                    selection = inspectPrefiltersOrTransports(a, b, c, d, selection, f)
                }
            }
        }
        if ((executeOnly || !selection) && !f["*"]) {
            selection = inspectPrefiltersOrTransports(a, b, c, d, "*", f)
        }
        return selection
    }
    y.fn.extend({
        load: function (d, e, f) {
            if (typeof d !== "string" && _load) {
                return _load.apply(this, arguments)
            } else if (!this.length) {
                return this
            }
            var g = d.indexOf(" ");
            if (g >= 0) {
                var h = d.slice(g, d.length);
                d = d.slice(0, g)
            }
            var i = "GET";
            if (e) {
                if (y.isFunction(e)) {
                    f = e;
                    e = w
                } else if (typeof e === "object") {
                    e = y.param(e, y.ajaxSettings.traditional);
                    i = "POST"
                }
            }
            var j = this;
            y.ajax({
                url: d,
                type: i,
                dataType: "html",
                data: e,
                complete: function (a, b, c) {
                    c = a.responseText;
                    if (a.isResolved()) {
                        a.done(function (r) {
                            c = r
                        });
                        j.html(h ? y("<div>").append(c.replace(rscript, "")).find(h) : c)
                    }
                    if (f) {
                        j.each(f, [c, b, a])
                    }
                }
            });
            return this
        },
        serialize: function () {
            return y.param(this.serializeArray())
        },
        serializeArray: function () {
            return this.map(function () {
                return this.elements ? y.makeArray(this.elements) : this
            }).filter(function () {
                return this.name && !this.disabled && (this.checked || rselectTextarea.test(this.nodeName) || rinput.test(this.type))
            }).map(function (i, b) {
                var c = y(this).val();
                return c == null ? null : y.isArray(c) ? y.map(c, function (a, i) {
                    return {
                        name: b.name,
                        value: a.replace(rCRLF, "\r\n")
                    }
                }) : {
                    name: b.name,
                    value: c.replace(rCRLF, "\r\n")
                }
            }).get()
        }
    });
    y.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function (i, o) {
        y.fn[o] = function (f) {
            return this.bind(o, f)
        }
    });
    y.each(["get", "post"], function (i, e) {
        y[e] = function (a, b, c, d) {
            if (y.isFunction(b)) {
                d = d || c;
                c = b;
                b = w
            }
            return y.ajax({
                type: e,
                url: a,
                data: b,
                success: c,
                dataType: d
            })
        }
    });
    y.extend({
        getScript: function (a, b) {
            return y.get(a, w, b, "script")
        },
        getJSON: function (a, b, c) {
            return y.get(a, b, c, "json")
        },
        ajaxSetup: function (a, b) {
            if (!b) {
                b = a;
                a = y.extend(true, y.ajaxSettings, b)
            } else {
                y.extend(true, a, y.ajaxSettings, b)
            }
            for (var c in {
                context: 1,
                url: 1
            }) {
                if (c in b) {
                    a[c] = b[c]
                } else if (c in y.ajaxSettings) {
                    a[c] = y.ajaxSettings[c]
                }
            }
            return a
        },
        ajaxSettings: {
            url: ajaxLocation,
            isLocal: rlocalProtocol.test(ajaxLocParts[1]),
            global: true,
            type: "GET",
            contentType: "application/x-www-form-urlencoded",
            processData: true,
            async: true,
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                text: "text/plain",
                json: "application/json, text/javascript",
                "*": "*/*"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText"
            },
            converters: {
                "* text": u.String,
                "text html": true,
                "text json": y.parseJSON,
                "text xml": y.parseXML
            }
        },
        ajaxPrefilter: addToPrefiltersOrTransports(prefilters),
        ajaxTransport: addToPrefiltersOrTransports(transports),
        ajax: function (g, h) {
            if (typeof g === "object") {
                h = g;
                g = w
            }
            h = h || {};
            var s = y.ajaxSetup({}, h),
                callbackContext = s.context || s,
                globalEventContext = callbackContext !== s && (callbackContext.nodeType || callbackContext instanceof y) ? y(callbackContext) : y.event,
                deferred = y.Deferred(),
                completeDeferred = y._Deferred(),
                statusCode = s.statusCode || {},
                ifModifiedKey, requestHeaders = {},
                responseHeadersString, responseHeaders, transport, timeoutTimer, parts, state = 0,
                fireGlobals, i, jqXHR = {
                    readyState: 0,
                    setRequestHeader: function (a, b) {
                        if (!state) {
                            requestHeaders[a.toLowerCase().replace(rucHeaders, rucHeadersFunc)] = b
                        }
                        return this
                    },
                    getAllResponseHeaders: function () {
                        return state === 2 ? responseHeadersString : null
                    },
                    getResponseHeader: function (a) {
                        var b;
                        if (state === 2) {
                            if (!responseHeaders) {
                                responseHeaders = {};
                                while ((b = rheaders.exec(responseHeadersString))) {
                                    responseHeaders[b[1].toLowerCase()] = b[2]
                                }
                            }
                            b = responseHeaders[a.toLowerCase()]
                        }
                        return b === w ? null : b
                    },
                    overrideMimeType: function (a) {
                        if (!state) {
                            s.mimeType = a
                        }
                        return this
                    },
                    abort: function (a) {
                        a = a || "abort";
                        if (transport) {
                            transport.abort(a)
                        }
                        done(0, a);
                        return this
                    }
                };

            function done(a, b, c, d) {
                if (state === 2) {
                    return
                }
                state = 2;
                if (timeoutTimer) {
                    clearTimeout(timeoutTimer)
                }
                transport = w;
                responseHeadersString = d || "";
                jqXHR.readyState = a ? 4 : 0;
                var f, success, error, response = c ? ajaxHandleResponses(s, jqXHR, c) : w,
                    lastModified, etag;
                if (a >= 200 && a < 300 || a === 304) {
                    if (s.ifModified) {
                        if ((lastModified = jqXHR.getResponseHeader("Last-Modified"))) {
                            y.lastModified[ifModifiedKey] = lastModified
                        }
                        if ((etag = jqXHR.getResponseHeader("Etag"))) {
                            y.etag[ifModifiedKey] = etag
                        }
                    }
                    if (a === 304) {
                        b = "notmodified";
                        f = true
                    } else {
                        try {
                            success = ajaxConvert(s, response);
                            b = "success";
                            f = true
                        } catch (e) {
                            b = "parsererror";
                            error = e
                        }
                    }
                } else {
                    error = b;
                    if (!b || a) {
                        b = "error";
                        if (a < 0) {
                            a = 0
                        }
                    }
                }
                jqXHR.status = a;
                jqXHR.statusText = b;
                if (f) {
                    deferred.resolveWith(callbackContext, [success, b, jqXHR])
                } else {
                    deferred.rejectWith(callbackContext, [jqXHR, b, error])
                }
                jqXHR.statusCode(statusCode);
                statusCode = w;
                if (fireGlobals) {
                    globalEventContext.trigger("ajax" + (f ? "Success" : "Error"), [jqXHR, s, f ? success : error])
                }
                completeDeferred.resolveWith(callbackContext, [jqXHR, b]);
                if (fireGlobals) {
                    globalEventContext.trigger("ajaxComplete", [jqXHR, s]);
                    if (!(--y.active)) {
                        y.event.trigger("ajaxStop")
                    }
                }
            }
            deferred.promise(jqXHR);
            jqXHR.success = jqXHR.done;
            jqXHR.error = jqXHR.fail;
            jqXHR.complete = completeDeferred.done;
            jqXHR.statusCode = function (a) {
                if (a) {
                    var b;
                    if (state < 2) {
                        for (b in a) {
                            statusCode[b] = [statusCode[b], a[b]]
                        }
                    } else {
                        b = a[jqXHR.status];
                        jqXHR.then(b, b)
                    }
                }
                return this
            };
            s.url = ((g || s.url) + "").replace(rhash, "").replace(rprotocol, ajaxLocParts[1] + "//");
            s.dataTypes = y.trim(s.dataType || "*").toLowerCase().split(rspacesAjax);
            if (s.crossDomain == null) {
                parts = rurl.exec(s.url.toLowerCase());
                s.crossDomain = !! (parts && (parts[1] != ajaxLocParts[1] || parts[2] != ajaxLocParts[2] || (parts[3] || (parts[1] === "http:" ? 80 : 443)) != (ajaxLocParts[3] || (ajaxLocParts[1] === "http:" ? 80 : 443))))
            }
            if (s.data && s.processData && typeof s.data !== "string") {
                s.data = y.param(s.data, s.traditional)
            }
            inspectPrefiltersOrTransports(prefilters, s, h, jqXHR);
            if (state === 2) {
                return false
            }
            fireGlobals = s.global;
            s.type = s.type.toUpperCase();
            s.hasContent = !rnoContent.test(s.type);
            if (fireGlobals && y.active++ === 0) {
                y.event.trigger("ajaxStart")
            }
            if (!s.hasContent) {
                if (s.data) {
                    s.url += (rquery.test(s.url) ? "&" : "?") + s.data
                }
                ifModifiedKey = s.url;
                if (s.cache === false) {
                    var j = y.now(),
                        ret = s.url.replace(rts, "$1_=" + j);
                    s.url = ret + ((ret === s.url) ? (rquery.test(s.url) ? "&" : "?") + "_=" + j : "")
                }
            }
            if (s.data && s.hasContent && s.contentType !== false || h.contentType) {
                requestHeaders["Content-Type"] = s.contentType
            }
            if (s.ifModified) {
                ifModifiedKey = ifModifiedKey || s.url;
                if (y.lastModified[ifModifiedKey]) {
                    requestHeaders["If-Modified-Since"] = y.lastModified[ifModifiedKey]
                }
                if (y.etag[ifModifiedKey]) {
                    requestHeaders["If-None-Match"] = y.etag[ifModifiedKey]
                }
            }
            requestHeaders.Accept = s.dataTypes[0] && s.accepts[s.dataTypes[0]] ? s.accepts[s.dataTypes[0]] + (s.dataTypes[0] !== "*" ? ", */*; q=0.01" : "") : s.accepts["*"];
            for (i in s.headers) {
                jqXHR.setRequestHeader(i, s.headers[i])
            }
            if (s.beforeSend && (s.beforeSend.call(callbackContext, jqXHR, s) === false || state === 2)) {
                jqXHR.abort();
                return false
            }
            for (i in {
                success: 1,
                error: 1,
                complete: 1
            }) {
                jqXHR[i](s[i])
            }
            transport = inspectPrefiltersOrTransports(transports, s, h, jqXHR);
            if (!transport) {
                done(-1, "No Transport")
            } else {
                jqXHR.readyState = 1;
                if (fireGlobals) {
                    globalEventContext.trigger("ajaxSend", [jqXHR, s])
                }
                if (s.async && s.timeout > 0) {
                    timeoutTimer = setTimeout(function () {
                        jqXHR.abort("timeout")
                    }, s.timeout)
                }
                try {
                    state = 1;
                    transport.send(requestHeaders, done)
                } catch (e) {
                    if (status < 2) {
                        done(-1, e)
                    } else {
                        y.error(e)
                    }
                }
            }
            return jqXHR
        },
        param: function (a, c) {
            var s = [],
                add = function (a, b) {
                    b = y.isFunction(b) ? b() : b;
                    s[s.length] = encodeURIComponent(a) + "=" + encodeURIComponent(b)
                };
            if (c === w) {
                c = y.ajaxSettings.traditional
            }
            if (y.isArray(a) || (a.jquery && !y.isPlainObject(a))) {
                y.each(a, function () {
                    add(this.name, this.value)
                })
            } else {
                for (var d in a) {
                    buildParams(d, a[d], c, add)
                }
            }
            return s.join("&").replace(J, "+")
        }
    });

    function buildParams(a, b, c, d) {
        if (y.isArray(b) && b.length) {
            y.each(b, function (i, v) {
                if (c || rbracket.test(a)) {
                    d(a, v)
                } else {
                    buildParams(a + "[" + (typeof v === "object" || y.isArray(v) ? i : "") + "]", v, c, d)
                }
            })
        } else if (!c && b != null && typeof b === "object") {
            if (y.isArray(b) || y.isEmptyObject(b)) {
                d(a, "")
            } else {
                for (var e in b) {
                    buildParams(a + "[" + e + "]", b[e], c, d)
                }
            }
        } else {
            d(a, b)
        }
    }
    y.extend({
        active: 0,
        lastModified: {},
        etag: {}
    });

    function ajaxHandleResponses(s, a, b) {
        var c = s.contents,
            dataTypes = s.dataTypes,
            responseFields = s.responseFields,
            ct, type, finalDataType, firstDataType;
        for (type in responseFields) {
            if (type in b) {
                a[responseFields[type]] = b[type]
            }
        }
        while (dataTypes[0] === "*") {
            dataTypes.shift();
            if (ct === w) {
                ct = s.mimeType || a.getResponseHeader("content-type")
            }
        }
        if (ct) {
            for (type in c) {
                if (c[type] && c[type].test(ct)) {
                    dataTypes.unshift(type);
                    break
                }
            }
        }
        if (dataTypes[0] in b) {
            finalDataType = dataTypes[0]
        } else {
            for (type in b) {
                if (!dataTypes[0] || s.converters[type + " " + dataTypes[0]]) {
                    finalDataType = type;
                    break
                }
                if (!firstDataType) {
                    firstDataType = type
                }
            }
            finalDataType = finalDataType || firstDataType
        }
        if (finalDataType) {
            if (finalDataType !== dataTypes[0]) {
                dataTypes.unshift(finalDataType)
            }
            return b[finalDataType]
        }
    }
    function ajaxConvert(s, a) {
        if (s.dataFilter) {
            a = s.dataFilter(a, s.dataType)
        }
        var b = s.dataTypes,
            converters = {},
            i, key, length = b.length,
            tmp, current = b[0],
            prev, conversion, conv, conv1, conv2;
        for (i = 1; i < length; i++) {
            if (i === 1) {
                for (key in s.converters) {
                    if (typeof key === "string") {
                        converters[key.toLowerCase()] = s.converters[key]
                    }
                }
            }
            prev = current;
            current = b[i];
            if (current === "*") {
                current = prev
            } else if (prev !== "*" && prev !== current) {
                conversion = prev + " " + current;
                conv = converters[conversion] || converters["* " + current];
                if (!conv) {
                    conv2 = w;
                    for (conv1 in converters) {
                        tmp = conv1.split(" ");
                        if (tmp[0] === prev || tmp[0] === "*") {
                            conv2 = converters[tmp[1] + " " + current];
                            if (conv2) {
                                conv1 = converters[conv1];
                                if (conv1 === true) {
                                    conv = conv2
                                } else if (conv2 === true) {
                                    conv = conv1
                                }
                                break
                            }
                        }
                    }
                }
                if (!(conv || conv2)) {
                    y.error("No conversion from " + conversion.replace(" ", " to "))
                }
                if (conv !== true) {
                    a = conv ? conv(a) : conv2(conv1(a))
                }
            }
        }
        return a
    }
    var K = y.now(),
        jsre = /(\=)\?(&|$)|\?\?/i;
    y.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            return y.expando + "_" + (K++)
        }
    });
    y.ajaxPrefilter("json jsonp", function (s, b, c) {
        var d = (typeof s.data === "string");
        if (s.dataTypes[0] === "jsonp" || b.jsonpCallback || b.jsonp != null || s.jsonp !== false && (jsre.test(s.url) || d && jsre.test(s.data))) {
            var e, jsonpCallback = s.jsonpCallback = y.isFunction(s.jsonpCallback) ? s.jsonpCallback() : s.jsonpCallback,
                previous = u[jsonpCallback],
                url = s.url,
                data = s.data,
                replace = "$1" + jsonpCallback + "$2",
                cleanUp = function () {
                    u[jsonpCallback] = previous;
                    if (e && y.isFunction(previous)) {
                        u[jsonpCallback](e[0])
                    }
                };
            if (s.jsonp !== false) {
                url = url.replace(jsre, replace);
                if (s.url === url) {
                    if (d) {
                        data = data.replace(jsre, replace)
                    }
                    if (s.data === data) {
                        url += (/\?/.test(url) ? "&" : "?") + s.jsonp + "=" + jsonpCallback
                    }
                }
            }
            s.url = url;
            s.data = data;
            u[jsonpCallback] = function (a) {
                e = [a]
            };
            c.then(cleanUp, cleanUp);
            s.converters["script json"] = function () {
                if (!e) {
                    y.error(jsonpCallback + " was not called")
                }
                return e[0]
            };
            s.dataTypes[0] = "json";
            return "script"
        }
    });
    y.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /javascript|ecmascript/
        },
        converters: {
            "text script": function (a) {
                y.globalEval(a);
                return a
            }
        }
    });
    y.ajaxPrefilter("script", function (s) {
        if (s.cache === w) {
            s.cache = false
        }
        if (s.crossDomain) {
            s.type = "GET";
            s.global = false
        }
    });
    y.ajaxTransport("script", function (s) {
        if (s.crossDomain) {
            var c, head = x.head || x.getElementsByTagName("head")[0] || x.documentElement;
            return {
                send: function (_, b) {
                    c = x.createElement("script");
                    c.async = "async";
                    if (s.scriptCharset) {
                        c.charset = s.scriptCharset
                    }
                    c.src = s.url;
                    c.onload = c.onreadystatechange = function (_, a) {
                        if (!c.readyState || /loaded|complete/.test(c.readyState)) {
                            c.onload = c.onreadystatechange = null;
                            if (head && c.parentNode) {
                                head.removeChild(c)
                            }
                            c = w;
                            if (!a) {
                                b(200, "success")
                            }
                        }
                    };
                    head.insertBefore(c, head.firstChild)
                },
                abort: function () {
                    if (c) {
                        c.onload(0, 1)
                    }
                }
            }
        }
    });
    var L = y.now(),
        xhrCallbacks, testXHR;

    function xhrOnUnloadAbort() {
        y(u).unload(function () {
            for (var a in xhrCallbacks) {
                xhrCallbacks[a](0, 1)
            }
        })
    }
    function createStandardXHR() {
        try {
            return new u.XMLHttpRequest()
        } catch (e) {}
    }
    function createActiveXHR() {
        try {
            return new u.ActiveXObject("Microsoft.XMLHTTP")
        } catch (e) {}
    }
    y.ajaxSettings.xhr = u.ActiveXObject ?
    function () {
        return !this.isLocal && createStandardXHR() || createActiveXHR()
    } : createStandardXHR;
    testXHR = y.ajaxSettings.xhr();
    y.support.ajax = !! testXHR;
    y.support.cors = testXHR && ("withCredentials" in testXHR);
    testXHR = w;
    if (y.support.ajax) {
        y.ajaxTransport(function (s) {
            if (!s.crossDomain || y.support.cors) {
                var g;
                return {
                    send: function (c, d) {
                        var f = s.xhr(),
                            handle, i;
                        if (s.username) {
                            f.open(s.type, s.url, s.async, s.username, s.password)
                        } else {
                            f.open(s.type, s.url, s.async)
                        }
                        if (s.xhrFields) {
                            for (i in s.xhrFields) {
                                f[i] = s.xhrFields[i]
                            }
                        }
                        if (s.mimeType && f.overrideMimeType) {
                            f.overrideMimeType(s.mimeType)
                        }
                        if (!s.crossDomain && !c["X-Requested-With"]) {
                            c["X-Requested-With"] = "XMLHttpRequest"
                        }
                        try {
                            for (i in c) {
                                f.setRequestHeader(i, c[i])
                            }
                        } catch (_) {}
                        f.send((s.hasContent && s.data) || null);
                        g = function (_, a) {
                            var b, statusText, responseHeaders, responses, xml;
                            try {
                                if (g && (a || f.readyState === 4)) {
                                    g = w;
                                    if (handle) {
                                        f.onreadystatechange = y.noop;
                                        delete xhrCallbacks[handle]
                                    }
                                    if (a) {
                                        if (f.readyState !== 4) {
                                            f.abort()
                                        }
                                    } else {
                                        b = f.status;
                                        responseHeaders = f.getAllResponseHeaders();
                                        responses = {};
                                        xml = f.responseXML;
                                        if (xml && xml.documentElement) {
                                            responses.xml = xml
                                        }
                                        responses.text = f.responseText;
                                        try {
                                            statusText = f.statusText
                                        } catch (e) {
                                            statusText = ""
                                        }
                                        if (!b && s.isLocal && !s.crossDomain) {
                                            b = responses.text ? 200 : 404
                                        } else if (b === 1223) {
                                            b = 204
                                        }
                                    }
                                }
                            } catch (firefoxAccessException) {
                                if (!a) {
                                    d(-1, firefoxAccessException)
                                }
                            }
                            if (responses) {
                                d(b, statusText, responses, responseHeaders)
                            }
                        };
                        if (!s.async || f.readyState === 4) {
                            g()
                        } else {
                            if (!xhrCallbacks) {
                                xhrCallbacks = {};
                                xhrOnUnloadAbort()
                            }
                            handle = L++;
                            f.onreadystatechange = xhrCallbacks[handle] = g
                        }
                    },
                    abort: function () {
                        if (g) {
                            g(0, 1)
                        }
                    }
                }
            }
        })
    }
    var M = {},
        rfxtypes = /^(?:toggle|show|hide)$/,
        rfxnum = /^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,
        timerId, fxAttrs = [
            ["height", "marginTop", "marginBottom", "paddingTop", "paddingBottom"],
            ["width", "marginLeft", "marginRight", "paddingLeft", "paddingRight"],
            ["opacity"]
        ];
    y.fn.extend({
        show: function (a, b, c) {
            var d, display;
            if (a || a === 0) {
                return this.animate(genFx("show", 3), a, b, c)
            } else {
                for (var i = 0, j = this.length; i < j; i++) {
                    d = this[i];
                    display = d.style.display;
                    if (!y._data(d, "olddisplay") && display === "none") {
                        display = d.style.display = ""
                    }
                    if (display === "" && y.css(d, "display") === "none") {
                        y._data(d, "olddisplay", defaultDisplay(d.nodeName))
                    }
                }
                for (i = 0; i < j; i++) {
                    d = this[i];
                    display = d.style.display;
                    if (display === "" || display === "none") {
                        d.style.display = y._data(d, "olddisplay") || ""
                    }
                }
                return this
            }
        },
        hide: function (a, b, c) {
            if (a || a === 0) {
                return this.animate(genFx("hide", 3), a, b, c)
            } else {
                for (var i = 0, j = this.length; i < j; i++) {
                    var d = y.css(this[i], "display");
                    if (d !== "none" && !y._data(this[i], "olddisplay")) {
                        y._data(this[i], "olddisplay", d)
                    }
                }
                for (i = 0; i < j; i++) {
                    this[i].style.display = "none"
                }
                return this
            }
        },
        _toggle: y.fn.toggle,
        toggle: function (b, c, d) {
            var e = typeof b === "boolean";
            if (y.isFunction(b) && y.isFunction(c)) {
                this._toggle.apply(this, arguments)
            } else if (b == null || e) {
                this.each(function () {
                    var a = e ? b : y(this).is(":hidden");
                    y(this)[a ? "show" : "hide"]()
                })
            } else {
                this.animate(genFx("toggle", 3), b, c, d)
            }
            return this
        },
        fadeTo: function (a, b, c, d) {
            return this.filter(":hidden").css("opacity", 0).show().end().animate({
                opacity: b
            }, a, c, d)
        },
        animate: function (i, j, k, l) {
            var m = y.speed(j, k, l);
            if (y.isEmptyObject(i)) {
                return this.each(m.complete)
            }
            return this[m.queue === false ? "each" : "queue"](function () {
                var f = y.extend({}, m),
                    p, isElement = this.nodeType === 1,
                    hidden = isElement && y(this).is(":hidden"),
                    self = this;
                for (p in i) {
                    var g = y.camelCase(p);
                    if (p !== g) {
                        i[g] = i[p];
                        delete i[p];
                        p = g
                    }
                    if (i[p] === "hide" && hidden || i[p] === "show" && !hidden) {
                        return f.complete.call(this)
                    }
                    if (isElement && (p === "height" || p === "width")) {
                        f.overflow = [this.style.overflow, this.style.overflowX, this.style.overflowY];
                        if (y.css(this, "display") === "inline" && y.css(this, "float") === "none") {
                            if (!y.support.inlineBlockNeedsLayout) {
                                this.style.display = "inline-block"
                            } else {
                                var h = defaultDisplay(this.nodeName);
                                if (h === "inline") {
                                    this.style.display = "inline-block"
                                } else {
                                    this.style.display = "inline";
                                    this.style.zoom = 1
                                }
                            }
                        }
                    }
                    if (y.isArray(i[p])) {
                        (f.specialEasing = f.specialEasing || {})[p] = i[p][1];
                        i[p] = i[p][0]
                    }
                }
                if (f.overflow != null) {
                    this.style.overflow = "hidden"
                }
                f.curAnim = y.extend({}, i);
                y.each(i, function (a, b) {
                    var e = new y.fx(self, f, a);
                    if (rfxtypes.test(b)) {
                        e[b === "toggle" ? hidden ? "show" : "hide" : b](i)
                    } else {
                        var c = rfxnum.exec(b),
                            start = e.cur();
                        if (c) {
                            var d = parseFloat(c[2]),
                                unit = c[3] || (y.cssNumber[a] ? "" : "px");
                            if (unit !== "px") {
                                y.style(self, a, (d || 1) + unit);
                                start = ((d || 1) / e.cur()) * start;
                                y.style(self, a, start + unit)
                            }
                            if (c[1]) {
                                d = ((c[1] === "-=" ? -1 : 1) * d) + start
                            }
                            e.custom(start, d, unit)
                        } else {
                            e.custom(start, b, "")
                        }
                    }
                });
                return true
            })
        },
        stop: function (a, b) {
            var c = y.timers;
            if (a) {
                this.queue([])
            }
            this.each(function () {
                for (var i = c.length - 1; i >= 0; i--) {
                    if (c[i].elem === this) {
                        if (b) {
                            c[i](true)
                        }
                        c.splice(i, 1)
                    }
                }
            });
            if (!b) {
                this.dequeue()
            }
            return this
        }
    });

    function genFx(a, b) {
        var c = {};
        y.each(fxAttrs.concat.apply([], fxAttrs.slice(0, b)), function () {
            c[this] = a
        });
        return c
    }
    y.each({
        slideDown: genFx("show", 1),
        slideUp: genFx("hide", 1),
        slideToggle: genFx("toggle", 1),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function (d, e) {
        y.fn[d] = function (a, b, c) {
            return this.animate(e, a, b, c)
        }
    });
    y.extend({
        speed: function (a, b, c) {
            var d = a && typeof a === "object" ? y.extend({}, a) : {
                complete: c || !c && b || y.isFunction(a) && a,
                duration: a,
                easing: c && b || b && !y.isFunction(b) && b
            };
            d.duration = y.fx.off ? 0 : typeof d.duration === "number" ? d.duration : d.duration in y.fx.speeds ? y.fx.speeds[d.duration] : y.fx.speeds._default;
            d.old = d.complete;
            d.complete = function () {
                if (d.queue !== false) {
                    y(this).dequeue()
                }
                if (y.isFunction(d.old)) {
                    d.old.call(this)
                }
            };
            return d
        },
        easing: {
            linear: function (p, n, a, b) {
                return a + b * p
            },
            swing: function (p, n, a, b) {
                return ((-Math.cos(p * Math.PI) / 2) + 0.5) * b + a
            }
        },
        timers: [],
        fx: function (a, b, c) {
            this.options = b;
            this.elem = a;
            this.prop = c;
            if (!b.orig) {
                b.orig = {}
            }
        }
    });
    y.fx.prototype = {
        update: function () {
            if (this.options.step) {
                this.options.step.call(this.elem, this.now, this)
            }(y.fx.step[this.prop] || y.fx.step._default)(this)
        },
        cur: function () {
            if (this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null)) {
                return this.elem[this.prop]
            }
            var a, r = y.css(this.elem, this.prop);
            return isNaN(a = parseFloat(r)) ? !r || r === "auto" ? 0 : r : a
        },
        custom: function (b, c, d) {
            var e = this,
                fx = y.fx;
            this.startTime = y.now();
            this.start = b;
            this.end = c;
            this.unit = d || this.unit || (y.cssNumber[this.prop] ? "" : "px");
            this.now = this.start;
            this.pos = this.state = 0;

            function t(a) {
                return e.step(a)
            }
            t.elem = this.elem;
            if (t() && y.timers.push(t) && !timerId) {
                timerId = setInterval(fx.tick, fx.interval)
            }
        },
        show: function () {
            this.options.orig[this.prop] = y.style(this.elem, this.prop);
            this.options.show = true;
            this.custom(this.prop === "width" || this.prop === "height" ? 1 : 0, this.cur());
            y(this.elem).show()
        },
        hide: function () {
            this.options.orig[this.prop] = y.style(this.elem, this.prop);
            this.options.hide = true;
            this.custom(this.cur(), 0)
        },
        step: function (c) {
            var t = y.now(),
                done = true;
            if (c || t >= this.options.duration + this.startTime) {
                this.now = this.end;
                this.pos = this.state = 1;
                this.update();
                this.options.curAnim[this.prop] = true;
                for (var i in this.options.curAnim) {
                    if (this.options.curAnim[i] !== true) {
                        done = false
                    }
                }
                if (done) {
                    if (this.options.overflow != null && !y.support.shrinkWrapBlocks) {
                        var d = this.elem,
                            options = this.options;
                        y.each(["", "X", "Y"], function (a, b) {
                            d.style["overflow" + b] = options.overflow[a]
                        })
                    }
                    if (this.options.hide) {
                        y(this.elem).hide()
                    }
                    if (this.options.hide || this.options.show) {
                        for (var p in this.options.curAnim) {
                            y.style(this.elem, p, this.options.orig[p])
                        }
                    }
                    this.options.complete.call(this.elem)
                }
                return false
            } else {
                var n = t - this.startTime;
                this.state = n / this.options.duration;
                var e = this.options.specialEasing && this.options.specialEasing[this.prop];
                var f = this.options.easing || (y.easing.swing ? "swing" : "linear");
                this.pos = y.easing[e || f](this.state, n, 0, 1, this.options.duration);
                this.now = this.start + ((this.end - this.start) * this.pos);
                this.update()
            }
            return true
        }
    };
    y.extend(y.fx, {
        tick: function () {
            var a = y.timers;
            for (var i = 0; i < a.length; i++) {
                if (!a[i]()) {
                    a.splice(i--, 1)
                }
            }
            if (!a.length) {
                y.fx.stop()
            }
        },
        interval: 13,
        stop: function () {
            clearInterval(timerId);
            timerId = null
        },
        speeds: {
            slow: 600,
            fast: 200,
            _default: 400
        },
        step: {
            opacity: function (a) {
                y.style(a.elem, "opacity", a.now)
            },
            _default: function (a) {
                if (a.elem.style && a.elem.style[a.prop] != null) {
                    a.elem.style[a.prop] = (a.prop === "width" || a.prop === "height" ? Math.max(0, a.now) : a.now) + a.unit
                } else {
                    a.elem[a.prop] = a.now
                }
            }
        }
    });
    if (y.expr && y.expr.filters) {
        y.expr.filters.animated = function (b) {
            return y.grep(y.timers, function (a) {
                return b === a.elem
            }).length
        }
    }
    function defaultDisplay(a) {
        if (!M[a]) {
            var b = y("<" + a + ">").appendTo("body"),
                display = b.css("display");
            b.remove();
            if (display === "none" || display === "") {
                display = "block"
            }
            M[a] = display
        }
        return M[a]
    }
    var N = /^t(?:able|d|h)$/i,
        rroot = /^(?:body|html)$/i;
    if ("getBoundingClientRect" in x.documentElement) {
        y.fn.offset = function (a) {
            var b = this[0],
                box;
            if (a) {
                return this.each(function (i) {
                    y.offset.setOffset(this, a, i)
                })
            }
            if (!b || !b.ownerDocument) {
                return null
            }
            if (b === b.ownerDocument.body) {
                return y.offset.bodyOffset(b)
            }
            try {
                box = b.getBoundingClientRect()
            } catch (e) {}
            var c = b.ownerDocument,
                docElem = c.documentElement;
            if (!box || !y.contains(docElem, b)) {
                return box ? {
                    top: box.top,
                    left: box.left
                } : {
                    top: 0,
                    left: 0
                }
            }
            var d = c.body,
                win = getWindow(c),
                clientTop = docElem.clientTop || d.clientTop || 0,
                clientLeft = docElem.clientLeft || d.clientLeft || 0,
                scrollTop = win.pageYOffset || y.support.boxModel && docElem.scrollTop || d.scrollTop,
                scrollLeft = win.pageXOffset || y.support.boxModel && docElem.scrollLeft || d.scrollLeft,
                top = box.top + scrollTop - clientTop,
                left = box.left + scrollLeft - clientLeft;
            return {
                top: top,
                left: left
            }
        }
    } else {
        y.fn.offset = function (a) {
            var b = this[0];
            if (a) {
                return this.each(function (i) {
                    y.offset.setOffset(this, a, i)
                })
            }
            if (!b || !b.ownerDocument) {
                return null
            }
            if (b === b.ownerDocument.body) {
                return y.offset.bodyOffset(b)
            }
            y.offset.initialize();
            var c, offsetParent = b.offsetParent,
                prevOffsetParent = b,
                doc = b.ownerDocument,
                docElem = doc.documentElement,
                body = doc.body,
                defaultView = doc.defaultView,
                prevComputedStyle = defaultView ? defaultView.getComputedStyle(b, null) : b.currentStyle,
                top = b.offsetTop,
                left = b.offsetLeft;
            while ((b = b.parentNode) && b !== body && b !== docElem) {
                if (y.offset.supportsFixedPosition && prevComputedStyle.position === "fixed") {
                    break
                }
                c = defaultView ? defaultView.getComputedStyle(b, null) : b.currentStyle;
                top -= b.scrollTop;
                left -= b.scrollLeft;
                if (b === offsetParent) {
                    top += b.offsetTop;
                    left += b.offsetLeft;
                    if (y.offset.doesNotAddBorder && !(y.offset.doesAddBorderForTableAndCells && N.test(b.nodeName))) {
                        top += parseFloat(c.borderTopWidth) || 0;
                        left += parseFloat(c.borderLeftWidth) || 0
                    }
                    prevOffsetParent = offsetParent;
                    offsetParent = b.offsetParent
                }
                if (y.offset.subtractsBorderForOverflowNotVisible && c.overflow !== "visible") {
                    top += parseFloat(c.borderTopWidth) || 0;
                    left += parseFloat(c.borderLeftWidth) || 0
                }
                prevComputedStyle = c
            }
            if (prevComputedStyle.position === "relative" || prevComputedStyle.position === "static") {
                top += body.offsetTop;
                left += body.offsetLeft
            }
            if (y.offset.supportsFixedPosition && prevComputedStyle.position === "fixed") {
                top += Math.max(docElem.scrollTop, body.scrollTop);
                left += Math.max(docElem.scrollLeft, body.scrollLeft)
            }
            return {
                top: top,
                left: left
            }
        }
    }
    y.offset = {
        initialize: function () {
            var a = x.body,
                container = x.createElement("div"),
                innerDiv, checkDiv, table, td, bodyMarginTop = parseFloat(y.css(a, "marginTop")) || 0,
                html = "<div style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;'><div></div></div><table style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";
            y.extend(container.style, {
                position: "absolute",
                top: 0,
                left: 0,
                margin: 0,
                border: 0,
                width: "1px",
                height: "1px",
                visibility: "hidden"
            });
            container.innerHTML = html;
            a.insertBefore(container, a.firstChild);
            innerDiv = container.firstChild;
            checkDiv = innerDiv.firstChild;
            td = innerDiv.nextSibling.firstChild.firstChild;
            this.doesNotAddBorder = (checkDiv.offsetTop !== 5);
            this.doesAddBorderForTableAndCells = (td.offsetTop === 5);
            checkDiv.style.position = "fixed";
            checkDiv.style.top = "20px";
            this.supportsFixedPosition = (checkDiv.offsetTop === 20 || checkDiv.offsetTop === 15);
            checkDiv.style.position = checkDiv.style.top = "";
            innerDiv.style.overflow = "hidden";
            innerDiv.style.position = "relative";
            this.subtractsBorderForOverflowNotVisible = (checkDiv.offsetTop === -5);
            this.doesNotIncludeMarginInBodyOffset = (a.offsetTop !== bodyMarginTop);
            a.removeChild(container);
            y.offset.initialize = y.noop
        },
        bodyOffset: function (a) {
            var b = a.offsetTop,
                left = a.offsetLeft;
            y.offset.initialize();
            if (y.offset.doesNotIncludeMarginInBodyOffset) {
                b += parseFloat(y.css(a, "marginTop")) || 0;
                left += parseFloat(y.css(a, "marginLeft")) || 0
            }
            return {
                top: b,
                left: left
            }
        },
        setOffset: function (a, b, i) {
            var c = y.css(a, "position");
            if (c === "static") {
                a.style.position = "relative"
            }
            var d = y(a),
                curOffset = d.offset(),
                curCSSTop = y.css(a, "top"),
                curCSSLeft = y.css(a, "left"),
                calculatePosition = (c === "absolute" || c === "fixed") && y.inArray('auto', [curCSSTop, curCSSLeft]) > -1,
                props = {},
                curPosition = {},
                curTop, curLeft;
            if (calculatePosition) {
                curPosition = d.position()
            }
            curTop = calculatePosition ? curPosition.top : parseInt(curCSSTop, 10) || 0;
            curLeft = calculatePosition ? curPosition.left : parseInt(curCSSLeft, 10) || 0;
            if (y.isFunction(b)) {
                b = b.call(a, i, curOffset)
            }
            if (b.top != null) {
                props.top = (b.top - curOffset.top) + curTop
            }
            if (b.left != null) {
                props.left = (b.left - curOffset.left) + curLeft
            }
            if ("using" in b) {
                b.using.call(a, props)
            } else {
                d.css(props)
            }
        }
    };
    y.fn.extend({
        position: function () {
            if (!this[0]) {
                return null
            }
            var a = this[0],
                offsetParent = this.offsetParent(),
                offset = this.offset(),
                parentOffset = rroot.test(offsetParent[0].nodeName) ? {
                    top: 0,
                    left: 0
                } : offsetParent.offset();
            offset.top -= parseFloat(y.css(a, "marginTop")) || 0;
            offset.left -= parseFloat(y.css(a, "marginLeft")) || 0;
            parentOffset.top += parseFloat(y.css(offsetParent[0], "borderTopWidth")) || 0;
            parentOffset.left += parseFloat(y.css(offsetParent[0], "borderLeftWidth")) || 0;
            return {
                top: offset.top - parentOffset.top,
                left: offset.left - parentOffset.left
            }
        },
        offsetParent: function () {
            return this.map(function () {
                var a = this.offsetParent || x.body;
                while (a && (!rroot.test(a.nodeName) && y.css(a, "position") === "static")) {
                    a = a.offsetParent
                }
                return a
            })
        }
    });
    y.each(["Left", "Top"], function (i, c) {
        var d = "scroll" + c;
        y.fn[d] = function (a) {
            var b = this[0],
                win;
            if (!b) {
                return null
            }
            if (a !== w) {
                return this.each(function () {
                    win = getWindow(this);
                    if (win) {
                        win.scrollTo(!i ? a : y(win).scrollLeft(), i ? a : y(win).scrollTop())
                    } else {
                        this[d] = a
                    }
                })
            } else {
                win = getWindow(b);
                return win ? ("pageXOffset" in win) ? win[i ? "pageYOffset" : "pageXOffset"] : y.support.boxModel && win.document.documentElement[d] || win.document.body[d] : b[d]
            }
        }
    });

    function getWindow(a) {
        return y.isWindow(a) ? a : a.nodeType === 9 ? a.defaultView || a.parentWindow : false
    }
    y.each(["Height", "Width"], function (i, f) {
        var g = f.toLowerCase();
        y.fn["inner" + f] = function () {
            return this[0] ? parseFloat(y.css(this[0], g, "padding")) : null
        };
        y.fn["outer" + f] = function (a) {
            return this[0] ? parseFloat(y.css(this[0], g, a ? "margin" : "border")) : null
        };
        y.fn[g] = function (b) {
            var c = this[0];
            if (!c) {
                return b == null ? null : this
            }
            if (y.isFunction(b)) {
                return this.each(function (i) {
                    var a = y(this);
                    a[g](b.call(this, i, a[g]()))
                })
            }
            if (y.isWindow(c)) {
                var d = c.document.documentElement["client" + f];
                return c.document.compatMode === "CSS1Compat" && d || c.document.body["client" + f] || d
            } else if (c.nodeType === 9) {
                return Math.max(c.documentElement["client" + f], c.body["scroll" + f], c.documentElement["scroll" + f], c.body["offset" + f], c.documentElement["offset" + f])
            } else if (b === w) {
                var e = y.css(c, g),
                    ret = parseFloat(e);
                return y.isNaN(ret) ? e : ret
            } else {
                return this.css(g, typeof b === "string" ? b : b + "px")
            }
        }
    });
    simpleviewer.jQuery = simpleviewer.$ = y
})(window);
if (typeof jQuery === 'undefined') {
    window.jQuery = simpleviewer.jQuery
}
if (typeof $ === 'undefined') {
    window.$ = simpleviewer.jQuery
}
var svmeta4idvc = document.createElement('meta');
svmeta4idvc.name = 'viewport';
svmeta4idvc.id = 'sv-meta';
if (navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i)) {
    svmeta4idvc.content = '';
    document.getElementsByTagName('head')[0].appendChild(svmeta4idvc)
} else if (navigator.userAgent.match(/Android/i)) {
    svmeta4idvc.content = 'width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0; target-densitydpi=device-dpi';
    document.getElementsByTagName('head')[0].appendChild(svmeta4idvc)
}
var svCoreURL = (function () {
    var i, root, pos, scripts = document.getElementsByTagName('script');
    for (i = 0; i < scripts.length; i++) {
        pos = scripts[i].src.toLowerCase().indexOf('simpleviewer.js');
        if (pos >= 0) {
            root = scripts[i].src;
            break
        }
    }
    if (root.toLowerCase().indexOf('js/simpleviewer.js') === 0) {
        return ''
    }
    return root.replace(/\/[^\/]*$/, "").replace(/\/[^\/]*$/, "") + '/'
})();
document.write('<script type="text/javascript" src="' + svCoreURL + 'js/swfobject.js"></script>');
document.write('<link rel="stylesheet" href="' + svCoreURL + 'css/simpleviewer.css" type="text/css">');
simpleviewer.ready = function (a) {
    SV.simpleviewer.jQuery(document).ready(a)
};
SV.simpleviewer.idx = 0;
SV.simpleviewer.insobjs = [];
SV.simpleviewer.load = function (a, b, c, d, e, f, g, h, i) {
    var j = new SV.simpleviewer.instance();
    j.load('svcp-' + SV.simpleviewer.idx + '-', a, b, c, d, e, f, g, h, i);
    SV.simpleviewer.idx++;
    SV.simpleviewer.insobjs.push(j)
};
SV.simpleviewer.saveCurrentPage = function () {
    var i;
    for (i = 0; i < SV.simpleviewer.insobjs.length; i++) {
        SV.simpleviewer.insobjs[i].saveCrntPg()
    }
};
SV.simpleviewer.instance = function () {
    var Q = true;
    var R = false;
    var S = "";
    var T = {
        randomId: S + 'sv' + (new Date()).getTime(),
        maxItemCount: 50
    };
    var U = 0;
    var V;
    var W = 25;
    var X = 100;
    var Y;
    var Z, winWidth;
    var ba = {
        width: 0,
        height: 0,
        widthRatio: 0,
        heightRatio: 0
    };
    var bb = {
        width: 0,
        height: 0,
        showOverlay: true
    };
    var bc = {
        width: 0,
        height: 0,
        maxRowCount: 4,
        maxColCount: 3,
        navListIndex: 0,
        thumbCountPerPage: 0,
        totalPage: 0
    };
    var bd, svHeight, backgroundColor, svContainer, svContainerId;
    var be = {};
    var bf = {
        displayMode: '',
        panelMode: 'both'
    };
    var bg = '9.0.124';
    var bh, params, attributes;
    var bi = screen.availHeight && screen.availHeight > 500 ? 14 : 11;
    var bj = 1;
    var $ = simpleviewer.jQuery;
    var bk;
    var bl = '';

    function getOptionValue(a, b, c, d) {
        if (a && a[b]) {
            if (d === 'bool') {
                if (a[b] === 'false') {
                    return false
                }
                if (a[b] === 'true') {
                    return true
                }
            }
            if (d === 'int') {
                return parseInt(a[b])
            }
            return a[b]
        }
        if (!Y) {
            return c
        }
        if (typeof Y[b] === 'undefined') {
            return c
        }
        if (d === 'int') {
            return parseInt(Y[b])
        }
        return Y[b]
    }
    var bm = "showopenbutton,showfullscreenbutton,useflickr,mobileshowcaption,mobileshownav,mobileshowthumbs,disableswipe,";
    var bn = "preseturl,firstimageindex,baseurl,flickrusername,flickrtags,flickruserid,flickrsetid,flickrgroupid,flickrgagmode,flickrsort,flickrimagecount,flickrimagesize,flickrextraparams,imagepath,thumbpath,galleryurl,preseturl,embedurl,title,";
    var bo = "firstimageindex,flickrusername,flickrtags,flickruserid,flickrsetid,flickrgroupid,title,";

    function parseXML(f, g, h, j) {
        var k = {};
        var l = $($.browser.msie ? f.childNodes[1].attributes : f.childNodes[0].attributes);
        l.each(function (i, n) {
            if (bm.indexOf(n.nodeName.toLowerCase() + ",") >= 0) {
                k[n.nodeName.toLowerCase()] = n.nodeValue.toLowerCase()
            }
            if (bn.indexOf(n.nodeName.toLowerCase() + ",") >= 0) {
                k[n.nodeName.toLowerCase()] = n.nodeValue
            }
        });
        try {
            var m = $(f).find('simpleviewergallery,simpleviewerGallery');
            be = {
                'showopenbutton': getOptionValue(k, 'showopenbutton', true, 'bool'),
                'showfullscreenbutton': getOptionValue(k, 'showfullscreenbutton', true, 'bool'),
                'useflickr': getOptionValue(k, 'useflickr', false, 'bool'),
                'mobileshowcaption': getOptionValue(k, 'mobileshowcaption', true, 'bool'),
                'mobileshownav': getOptionValue(k, 'mobileshownav', true, 'bool'),
                'mobileshowthumbs': getOptionValue(k, 'mobileshowthumbs', true, 'bool'),
                'preseturl': getOptionValue(k, 'preseturl', ''),
                'firstimageindex': getOptionValue(k, 'firstimageindex', -1, 'int'),
                'flickrusername': getOptionValue(k, 'flickrusername', ''),
                'flickrtags': getOptionValue(k, 'flickrtags', ''),
                'flickruserid': getOptionValue(k, 'flickruserid', ''),
                'flickrsetid': getOptionValue(k, 'flickrsetid', ''),
                'flickrgroupid': getOptionValue(k, 'flickrgroupid', ''),
                'flickrgagmode': getOptionValue(k, 'flickrgagmode', 'ALL'),
                'flickrsort': getOptionValue(k, 'flickrsort', 'DATE-POSTED-DESC'),
                'flickrimagecount': getOptionValue(k, 'flickrimagecount', '50'),
                'flickrimagesize': getOptionValue(k, 'flickrimagesize', 'LARGE'),
                'flickrextraparams': getOptionValue(k, 'flickrextraparams', ''),
                'imagepath': getOptionValue(k, 'imagepath', ''),
                'thumbpath': getOptionValue(k, 'thumbpath', ''),
                'title': getOptionValue(k, 'title', ''),
                'images': []
            };
            if (Q) {
                if (be.useflickr) {
                    U = parseInt(be.flickrimagecount)
                } else {
                    U = m.find('image').length
                }
            } else {
                if (be.useflickr) {
                    U = Math.min(T.maxItemCount, parseInt(be.flickrimagecount))
                } else {
                    U = Math.min(T.maxItemCount, m.find('image').length)
                }
                delete be.preseturl;
                delete be.flickruserid;
                delete be.flickrsetid;
                delete be.flickrgroupid;
                delete be.flickrextraparams
            }
            if (Y || be.useflickr) {
                return be
            }
            h = '';
            j = '';
            var o = function (a, b, c) {
                    if (!c) {
                        return ''
                    }
                    if (b) {
                        if (!isEndedWithSlash(b)) {
                            b += '/'
                        }
                    }
                    if (isOnRoot(b)) {
                        return b + c
                    }
                    if (typeof a !== 'undefined' && typeof c !== 'undefined' && c.indexOf("://") < 0) {
                        return ((isEndedWithSlash(a) || a.length === 0) ? a : a + '/') + (b ? b : '') + c
                    }
                    return (b ? b : '') + c
                };
            m.find('image').each(function () {
                if (be.images.length >= U) {
                    return
                }
                var a;
                var b = (g ? g : ((typeof svGalleryPath !== 'undefined') ? svGalleryPath : ''));
                var c = $(this).attr('imageURL');
                var d = $(this).attr('thumbURL');
                var e = $(this).attr('linkURL');
                if (!c && !d && !e) {
                    c = $(this).find('filename').text();
                    d = c;
                    if (W > 12) {
                        W -= 12
                    }
                }
                if (!d) {
                    j = h;
                    d = c
                }
                a = {
                    imageURL: o(b, h, c),
                    thumbURL: o(b, j, d),
                    imageFullURL: o('', h, e) || o(b, h, c),
                    linkTarget: $(this).attr('linkTarget') || '_blank',
                    caption: '',
                    description: '',
                    preloadedImage: null,
                    preloaded: false
                };
                if ($(this).find('caption').length > 0) {
                    a.description = $(this).find('caption:first').text()
                }
                be.images.push(a)
            })
        } catch (e) {
            errorMessage('Cannot Parse Gallery XML.')
        }
        return be
    }
    var bp = function (a, b) {
            if (!a || !b) {
                return false
            }
            if (a.substring(a.length - b.length) === b) {
                return true
            }
            return false
        };

    function isEndedWithSlash(a) {
        if (!a) {
            return false
        }
        if (!bp(a, '/') && !bp(a.toLowerCase(), '%2f')) {
            return false
        }
        return true
    }
    function isOnRoot(a) {
        if (!a) {
            return false
        }
        if (a.toLowerCase().indexOf('http') === 0 || a.toLowerCase().indexOf('/') === 0 || a.toLowerCase().indexOf('%2f') === 0) {
            return true
        }
        if (a.indexOf(':/') > 0 || a.indexOf('%3A%2F') > 0) {
            return true
        }
        return false
    }
    function getAddQueryParam4FS(d) {
        var a = (bm + bo).split(',');
        var b, ret = '';
        for (var i = 0; i < a.length; i++) {
            b = a[i].replace(/ /g, '');
            if (b.length <= 0 || d[b] == null || d[b] === '') {
                continue
            }
            ret += '&' + b + '=' + encodeURIComponent(d[b])
        }
        return ret
    }
    function getAddParamFromURL(a, d) {
        var b = (bm + bo).split(',');
        var c, val;
        for (var i = 0; i < b.length; i++) {
            c = b[i].replace(/ /g, '');
            if (c.length <= 0) {
                continue
            }
            val = getQueryStrValue(a, c);
            if (!val) {
                continue
            }
            if (typeof val === 'string') {
                if (val.toLowerCase() === 'true') {
                    val = true
                } else if (val.toLowerCase() === 'false') {
                    val = false
                }
            }
            d[c] = val
        }
    }
    function cvtObjectAttrLowerCase(a) {
        var b = {};
        if (!a) {
            return b
        }
        var c, prop;
        for (prop in a) {
            c = prop.toLowerCase();
            if (bm.indexOf(prop.toLowerCase() + ",") >= 0) {
                b[c] = (a[prop] === true ? true : (a[prop] === false ? false : a[prop].toLowerCase()));
                continue
            }
            if (bn.indexOf(prop.toLowerCase() + ",") >= 0) {
                b[c] = a[prop];
                continue
            }
            b[prop] = a[prop]
        }
        return b
    }
    function setPanelSize() {
        calculateMvSize();
        if (bb.width < bb.height) {
            $('#' + S + 'sv-mobile').removeClass('sv-horizental');
            $('#' + S + 'sv-mobile').addClass('sv-vertical')
        } else {
            $('#' + S + 'sv-mobile').removeClass('sv-vertical');
            $('#' + S + 'sv-mobile').addClass('sv-horizental')
        }
        if (bf.panelMode === 'navigation') {
            bc.width = bb.width;
            bc.height = bb.height
        } else {
            bc.width = 270;
            bc.height = 320
        }
    }
    function setGridScale() {
        bc.maxRowCount = 4;
        if (separateNavPanel()) {
            bc.maxRowCount = parseInt((bc.height) / 80);
            bc.maxColCount = parseInt((bc.width) / 80);
            bc.maxRowCount--;
            if (isAndroid()) {
                if (bc.width > bc.height && bc.maxRowCount <= 1) {
                    bc.maxRowCount++
                }
                if (bc.width < bc.height) {
                    if (bc.maxRowCount <= 3) {
                        bc.maxRowCount++
                    }
                }
                if (getAndroidVer() < 2.3 && bc.maxRowCount >= 3) {
                    bc.maxRowCount--
                }
            }
            bc.maxColCount--;
            if (bc.maxRowCount > bc.maxColCount) {
                if (bc.maxRowCount > 10) {
                    bc.maxRowCount = 10
                }
                if (bc.maxColCount > 7) {
                    bc.maxColCount = 7
                }
            } else {
                if (bc.maxRowCount > 7) {
                    bc.maxRowCount = 7
                }
                if (bc.maxColCount > 10) {
                    bc.maxColCount = 10
                }
            }
            if (bc.maxRowCount <= 0) {
                bc.maxRowCount = 1
            }
            if (bc.maxColCount <= 0) {
                bc.maxColCount = 1
            }
            var a = getThumbnailGridSize();
            var b = parseInt((bc.width - a.width) / 2);
            if (b < 59 && bc.maxColCount > 1) {
                bc.maxColCount--
            }
            if (bc.maxColCount * bc.maxRowCount > Y.images.length && Y.images.length > 0) {
                var c = parseInt(Y.images.length / bc.maxColCount);
                if (Y.images.length % bc.maxColCount > 0) {
                    c++
                }
                bc.maxRowCount = c
            }
        } else {
            bc.maxColCount = 3
        }
    }
    function setNavPnlCalculatedValues() {
        bc.thumbCountPerPage = bc.maxRowCount * bc.maxColCount;
        bc.totalPage = parseInt(U / bc.thumbCountPerPage) + (U % bc.thumbCountPerPage === 0 ? 0 : 1)
    }
    function setPanelsScale() {
        setPanelSize();
        setGridScale();
        bc.navListIndex = 0;
        setNavPnlCalculatedValues()
    }
    function onSwiping(d, a, b, c, e) {
        var f = 0;
        if (d.direction !== "left2right") {
            f -= d.distance
        } else if (d.direction !== "right2left") {
            f = d.distance
        }
        if (f === 0) {
            return
        }
        var g = getThumbnailGridSize();
        var h = e ? g.width : (bb.width + X);
        b.style.webkitTransitionDuration = '0';
        b.style.webkitTransform = 'translate3d(' + f + 'px, 0px, 0px)';
        if (a) {
            a.style.webkitTransitionDuration = '0';
            if (f > 0) {
                a.style.webkitTransform = 'translate3d(-' + (h - f) + 'px, 0px, 0px)'
            } else {
                a.style.webkitTransform = 'translate3d(-' + (h) + 'px, 0px, 0px)'
            }
        }
        if (c) {
            c.style.webkitTransitionDuration = '0';
            if (f < 0) {
                c.style.webkitTransform = 'translate3d(' + (h + f) + 'px, 0px, 0px)'
            } else {
                c.style.webkitTransform = 'translate3d(' + (h) + 'px, 0px, 0px)'
            }
        }
    }
    function afterSwiping(a, b, d, c, e, f, g) {
        var h = false;
        var i = 0.1;
        var j = getThumbnailGridSize();
        var k = g ? j.width : (bb.width + X);
        e.style.webkitTransitionDuration = b.d + 'ms';
        if (d.direction === "left2right") {
            if (a <= 0) {
                h = true
            }
            if (d.distance > i * k && !h) {
                if (g) {
                    bc.navListIndex--;
                    move2NavListPnl(a, bc.navListIndex, b.d)
                } else {
                    bj--;
                    move2Photo(bj, bj - 1, true, b.d, d.distance)
                }
            } else {
                e.style.webkitTransform = '';
                if (c) {
                    c.style.webkitTransitionDuration = b.d + 'ms';
                    c.style.webkitTransform = 'translate3d(-' + k + 'px, 0px, 0px)'
                }
            }
        } else if (d.direction === "right2left") {
            if ((g && a >= bc.totalPage - 1) || (!g && a >= U - 1)) {
                h = true
            }
            if (d.distance > i * k && !h) {
                if (g) {
                    bc.navListIndex++;
                    move2NavListPnl(a, bc.navListIndex, b.d)
                } else {
                    bj++;
                    move2Photo(bj - 2, bj - 1, true, b.d, d.distance)
                }
            } else {
                e.style.webkitTransform = '';
                if (f) {
                    f.style.webkitTransitionDuration = b.d + 'ms';
                    f.style.webkitTransform = 'translate3d(' + k + 'px, 0px, 0px)'
                }
            }
        }
    }
    function getDurationWithSwipeSpeed(d, a) {
        var b = parseInt(d.timerValue * a / d.distance - 1.1 * d.timerValue);
        if (b > 3000) {
            b = 3000
        }
        if (b <= 0) {
            nt = 100
        }
        return b
    }
    function setVerticalScroll(b, c) {
        if (b === 'embed') {
            c.detectFlicks({
                axis: 'y',
                threshold: 15,
                flickMove: function (d) {},
                flickEvent: function (d) {
                    var a = 0;
                    if (d.direction === "up2down") {
                        a -= d.distance
                    } else if (d.direction === "down2up") {
                        a = d.distance
                    }
                    if (!a) {
                        return
                    }
                    window.scrollBy(0, a)
                }
            })
        }
    }
    function setNavControls(e, f) {
        if (e + 1 >= bc.totalPage) {
            $('#' + S + 'sv-nav-page-next').hide()
        } else {
            $('#' + S + 'sv-nav-page-next').show()
        }
        if (e <= 0) {
            $('#' + S + 'sv-nav-page-prev').hide()
        } else {
            $('#' + S + 'sv-nav-page-prev').show()
        }
        $('#' + S + 'sv-nav-page-label').html('page ' + (parseInt(e) + 1) + ' of ' + bc.totalPage);
        $('#' + S + 'sv-nav-page-caption').html(Y.title);
        $('#' + S + 'sv-next-photo').show();
        $('#' + S + 'sv-prev-photo').show();
        if (bb.showOverlay && Y.mobileshownav && f < Y.images.length - 1) {
            $('#' + S + 'sv-next-photo span').show()
        } else {
            $('#' + S + 'sv-next-photo span').hide()
        }
        if (bb.showOverlay && Y.mobileshownav && f > 0) {
            $('#' + S + 'sv-prev-photo span').show()
        } else {
            $('#' + S + 'sv-prev-photo span').hide()
        }
        bc.navListIndex = e;
        if (typeof f !== 'undefined') {
            bj = f + 1
        }
        var g = $('#' + S + '-nav-lst-' + e + ' a');
        g.unbind();
        g.click(function () {
            var b = $(this);
            var c = parseInt(b.attr('id').replace(S + 'nav-pht-lnks-', ''));
            if (bf.panelMode === 'navigation') {
                var d = $('#' + S + 'sv-photo-navigation');
                d.fadeOut(250, function () {
                    d.hide();
                    var a = $('#' + S + 'sv-photo-detail');
                    a.show();
                    move2Photo(bj - 1, c, 'calledfromnav', 0);
                    a.fadeIn(250)
                })
            } else {
                move2Photo(bj - 1, c)
            }
            return false
        });
        if (!isSwipable(Y) || bc.totalPage <= 1) {
            return
        }
        var h = getThumbnailGridSize();
        var i = getSlideDuration();
        var j = document.getElementById(S + '-nav-lst-' + (e - 1));
        var k = document.getElementById(S + '-nav-lst-' + e);
        var l = document.getElementById(S + '-nav-lst-' + (e + 1));
        var m = $('#' + S + '-nav-lst-' + e + ' img, #' + S + '-nav-lst-' + e + ' .sv-nav-empty-thumbnail');
        if (!m.detectFlicks) {
            return
        }
        m.unbind();
        m.detectFlicks({
            axis: 'x',
            threshold: 5,
            flickMove: function (d) {
                onSwiping(d, j, k, l, true)
            },
            flickEvent: function (d) {
                i.d = getDurationWithSwipeSpeed(d, h.width);
                afterSwiping(e, i, d, j, k, l, true)
            }
        });
        setVerticalScroll(bf.displayMode, m)
    }
    function populatePhotoListByImageIndex(a) {
        var b = parseInt(a / bc.thumbCountPerPage);
        populatePhotoList(b)
    }
    function populatePhotoList(a) {
        var b = '';
        var c = getThumbnailGridSize().width;
        var d = supportWebkitAnim() ? '-webkit-transform:translateX(-' + c + 'px);' : 'left:' + (-c) + 'px;';
        var e = supportWebkitAnim() ? '-webkit-transform:translateX(' + c + 'px);' : 'left:' + c + 'px;';
        if (a > 0) {
            b += getPhotoListHtml(a - 1, d)
        }
        b += getPhotoListHtml(a);
        if (a < U - 1) {
            b += getPhotoListHtml(a + 1, e)
        }
        $('#' + S + 'sv-nav-photo-list').html(b);
        setNavControls(a, bj - 1);
        setCurrentPohot(bj - 1)
    }
    function getNavBoundary(a) {
        return {
            lowbdry: bc.thumbCountPerPage * a,
            highbdry: bc.thumbCountPerPage * (parseInt(a) + 1)
        }
    }
    function getThumbnailGridSize() {
        return {
            width: bc.maxColCount * 80,
            height: bc.maxRowCount * 80
        }
    }
    function getPhotoListHtml(a, b) {
        if (a < 0 || a >= U) {
            return ''
        }
        var i, j, bdryobj = getNavBoundary(a);
        var c = bdryobj.lowbdry;
        var d, visited, current;
        d = '<table id="' + S + '-nav-lst-' + a + '" border="0" cellpadding="0" cellspacing="0" style="width:' + getThumbnailGridSize().width + 'px;' + (b ? b : '') + '">';
        for (i = 0; i < bc.maxRowCount; i++) {
            d += '<tr>';
            for (j = 0; j < bc.maxColCount; j++) {
                if (c < bdryobj.highbdry && c >= 0 && c < Y.images.length && c < U) {
                    d += '<td>';
                    if (Y.images[c].visited) {
                        visited = 'visited'
                    } else {
                        visited = ''
                    }
                    if (c === bj - 1) {
                        current = 'current'
                    } else {
                        current = ''
                    }
                    d += '<a id="' + S + 'nav-pht-lnks-' + c + '" href="#" onclick="" class="' + visited + ' ' + current + '"><img src="' + Y.images[c].thumbURL + '"/></a>';
                    c++
                } else {
                    d += '<td class="sv-nav-empty-thumbnail">'
                }
                d += '</td>'
            }
            d += '</tr>'
        }
        d += '';
        d += '';
        d += '</table>';
        return d
    }
    function getDeviceClass() {
        if (isIphone()) {
            return 'sv-cls-4-iphone'
        }
        if (isIpad()) {
            return 'sv-cls-4-ipad'
        }
        if (isAndroid()) {
            return 'sv-cls-4-android'
        }
        if ($.browser.msie) {
            if ($.browser.version < 9) {
                return 'sv-cls-4-msie8'
            } else {
                return 'sv-cls-4-msie9'
            }
        }
        return 'sv-generic-device'
    }
    function getLogo4Nav() {
        if (Q) {
            return ''
        }
        return '<span id="nav-' + T.randomId + '" style="display:block;width: 105px;height: 15px;overflow: hidden;position: absolute;bottom: 0px;right: 0px;z-index: 10;text-decoration: none;font-size: 90%;background: url(http://simpleviewer.net/m/sv.png) no-repeat 0 0;cursor:pointer;"></span>'
    }
    function generateSVHtml() {
        var a = (bf.displayMode === 'fullscreen' ? 'Exit Full Window' : 'Go Full Window');
        var b;
        b = '<div id="' + S + 'sv-mobile" class="simpleviewer cls-mobile ' + getDeviceClass() + '" style="background: ' + formatColor(backgroundColor) + ';">';
        b += '<div id="' + S + 'sv-photo-navigation" class="sv-photo-nav">';
        b += '<div id="' + S + 'sv-nav-photo-list" class="sv-nav-photo-list">';
        b += '</div>';
        b += '<span id="' + S + 'sv-nav-page-caption" class="sv-nav-page-caption"></span>';
        b += '<span id="' + S + 'sv-nav-page-prev" class="sv-nav-page-prev"></span>';
        b += '<span id="' + S + 'sv-nav-page-label" class="sv-nav-page-label"></span>';
        b += '<span id="' + S + 'sv-nav-page-next" class="sv-nav-page-next"></span>';
        b += getLogo4Nav();
        b += '<div id="' + S + 'sv-nav-topmenu" class="cls-topmenu"><div id="' + S + 'sv-nav-topmenu-right" class="cls-topmenu-right"></div><div id="' + S + 'sv-nav-topmenu-links" class="cls-topmenu-links">';
        b += '<a href="" id="' + S + 'sv-nav-go-fullscreen" class="cls-go-fullscreen" title="' + a + '"><span>' + a + '</span></a>';
        b += '</div><div id="' + S + 'sv-nav-topmenu-left" class="cls-topmenu-left"></div></div>';
        b += '</div>';
        b += '<div id="' + S + 'sv-photo-detail" class="sv-photo-detail">';
        b += '<div id="' + S + 'sv-photos" class="cls-photos"></div>';
        b += '<div id="' + S + 'sv-prev-photo" class="cls-prev-photo"><span></span></div>';
        b += '<div id="' + S + 'sv-next-photo" class="cls-next-photo"><span></span></div>';
        if (!Q) {
            b += '<div id="' + T.randomId + '" style="display:block;width: 105px;height: 15px;overflow: hidden;position: absolute;bottom: 0px;right: 0px;z-index: 10;text-decoration: none;font-size: 90%;background: url(http://simpleviewer.net/m/sv.png) no-repeat 0 0;cursor:pointer;"></div>'
        }
        b += '<div id="' + S + 'sv-topmenu" class="cls-topmenu"><div id="' + S + 'sv-topmenu-right" class="cls-topmenu-right"></div><div id="' + S + 'sv-topmenu-links" class="cls-topmenu-links">';
        b += '<a href="" id="' + S + 'sv-open-window" class="cls-open-window" target="_blank" title="Open Image in New Window"><span>Open Image in New Window</span></a>';
        b += '<a href="" id="' + S + 'sv-go-fullscreen" class="cls-go-fullscreen" title="' + a + '"><span>' + a + '</span></a>';
        b += '<a href="#" id="' + S + 'sv-go-nav-panel" class="cls-go-nav-panel" title="View Thumbnails"><span>View Thumbnails</span></a>';
        b += '</div><div id="' + S + 'sv-topmenu-left" class="cls-topmenu-left"></div></div>';
        b += '</div>';
        b += '</div>';
        return b
    }
    function generateSVFlashHtml() {
        var a;
        a = '<div id="' + S + 'sv-mobile-flash" class="cls-mobile-flash">';
        a += '<div id="' + S + 'sv-mobile-flash-swf" class="cls-mobile-flash-swf"></div>';
        a += '</div>';
        return a
    }
    function setBodySize(a, b) {
        if (bf.displayMode !== 'fullscreen') {
            return
        }
        var c = isSmallAndroid() ? (getAndroidVer() >= 2.3 ? 1.3 * a + 'px' : '110%') : 100 * getiPhoneAdjRatio(a, b) + '%';
        $('body, html').css({
            'overflow': isSmallAndroid() ? 'auto' : 'hidden',
            'height': c,
            'margin': '0',
            'padding': '0'
        })
    }
    function checkForResize() {
        var a = getWindowWidth();
        var b = adjustHeight4Devices(getWindowHeight(), a);
        if (isAndroid()) {
            if (bf.displayMode === 'fullscreen' && (b !== Z || a !== winWidth)) {
                setBodySize(b, a)
            } else {
                hideUrlBar.InTimer()
            }
        }
        if (U > 1 && $('#' + S + 'sv-photo-detail:visible').length > 0 && $('#' + S + 'sv-next-photo:visible').length === 0 && $('#' + S + 'sv-prev-photo:visible').length === 0) {
            resizeViewer()
        }
    }
    function showOverlayControlsAnim(a) {
        var b = getSlideDuration();
        if (a) {
            $('#' + S + 'sv-topmenu').fadeIn(b.od)
        } else {
            $('#' + S + 'sv-topmenu').fadeOut(2 * b.od)
        }
        if (Y.mobileshowcaption) {
            if (a) {
                $('#' + S + 'sv-photos .sv-photo .sv-caption').fadeIn(b.od);
                setCaptionEvent()
            } else {
                $('#' + S + 'sv-photos .sv-photo .sv-caption').fadeOut(2 * b.od)
            }
        }
        if (Y.mobileshownav) {
            if (a) {
                if (Y.mobileshownav && bj > 1) {
                    $('#' + S + 'sv-prev-photo span').fadeIn(b.od)
                }
                if (Y.mobileshownav && bj < Y.images.length) {
                    $('#' + S + 'sv-next-photo span').fadeIn(b.od)
                }
            } else {
                if (Y.mobileshownav && bj > 1) {
                    $('#' + S + 'sv-prev-photo span').fadeOut(2 * b.od)
                }
                if (Y.mobileshownav && bj < Y.images.length) {
                    $('#' + S + 'sv-next-photo span').fadeOut(2 * b.od)
                }
            }
        }
    }
    function showOverlayControls(a) {
        $('#' + S + 'sv-topmenu').hide();
        $('#' + S + 'sv-photos .sv-photo .sv-caption').hide();
        $('#' + S + 'sv-prev-photo span').hide();
        $('#' + S + 'sv-next-photo span').hide();
        if (!a) {
            return
        }
        $('#' + S + 'sv-topmenu').show();
        if (Y.mobileshowcaption) {
            var b = $('#' + S + 'sv-photos .sv-photo .sv-caption');
            b.show();
            setCaptionEvent()
        }
        if (Y.mobileshownav) {
            if (Y.mobileshownav && bj > 1) {
                $('#' + S + 'sv-prev-photo span').show()
            }
            if (Y.mobileshownav && bj < Y.images.length) {
                $('#' + S + 'sv-next-photo span').show()
            }
        }
    }
    function getWindowWidth() {
        var w = $(window).width();
        if (isAndroid() && w > screen.width) {
            return screen.width - 6
        }
        return w
    }
    function getWindowHeight() {
        var h = $(window).height();
        if (isAndroid()) {
            if (h > screen.height || bf.displayMode === 'fullscreen') {
                return screen.height
            }
        }
        return h
    }
    function calculateMvSize() {
        winWidth = getWindowWidth();
        Z = adjustHeight4Devices(getWindowHeight(), winWidth);
        if (bf.displayMode === 'fullscreen') {
            bb.width = winWidth;
            bb.height = Z
        } else {
            if (bd.indexOf('%') > -1) {
                if ($('table #' + svContainerId).length <= 0 || hasFixedSizeTag(svContainer, "width")) {
                    ba.width = getContainerWidth(svContainer) || winWidth;
                    bb.width = ba.width
                } else {
                    if (ba.widthRatio) {
                        bb.width = ba.widthRatio * winWidth;
                        if (bb.width - 20 < parseInt(winWidth) && bb.width > parseInt(winWidth) - 20) {
                            bb.width -= 20
                        }
                    } else {
                        bb.width = ba.width
                    }
                }
            } else {
                bb.width = parseInt(bd)
            }
            if (svHeight.indexOf('%') > -1) {
                if (hasFixedSizeTag(svContainer, "height")) {
                    ba.height = getContainerHeight(svContainer);
                    bb.height = ba.height
                } else {
                    if (ba.heightRatio) {
                        bb.height = ba.heightRatio * Z
                    } else {
                        bb.height = ba.height
                    }
                }
            } else {
                bb.height = parseInt(svHeight)
            }
        }
        if (bf.panelMode === 'both') {
            bb.width -= bc.width
        }
    }
    function setMvSize() {
        $('#' + S + 'sv-photo-detail, ' + '#' + S + 'sv-photo-detail .photo-frame').width(bb.width);
        var a = S + 'sv-photo-' + (bj - 2);
        var b = S + 'sv-photo-' + (bj);
        if (supportWebkitAnim()) {
            var c = document.getElementById(a);
            var d = document.getElementById(b);
            if (c) {
                c.style.webkitTransitionProperty = '-webkit-transform';
                c.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
                c.style.webkitTransitionDuration = '0';
                c.style.webkitTransform = 'translate3d(-' + bb.width + 'px, 0px, 0px)'
            }
            if (d) {
                d.style.webkitTransitionProperty = '-webkit-transform';
                d.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
                d.style.webkitTransitionDuration = '0';
                d.style.webkitTransform = 'translate3d(' + bb.width + 'px, 0px, 0px)'
            }
        } else {
            $('#' + a).css('left', -bb.width);
            $('#' + b).css('left', bb.width)
        }
        var e = $('#' + S + 'sv-photos .sv-photo.photo-frame img');
        e.css('max-width', bb.width);
        $('#' + S + 'sv-photo-detail, #' + S + 'sv-photos, #' + S + 'sv-photos .sv-photo, #' + S + 'sv-prev-photo, #' + S + 'sv-next-photo').height(bb.height);
        var f = $('#' + S + 'sv-photo-navigation');
        f.height(bb.height);
        f.width(bc.width);
        if (bf.panelMode === 'both') {
            $('#' + S + 'sv-mobile').width(bb.width + bc.width).height(bb.height)
        } else if (bf.panelMode === 'navigation') {
            $('#' + S + 'sv-mobile').width(bb.width).height(bb.height)
        }
        var g, mglft, btrgt;
        var h = getThumbnailGridSize();
        if (bf.panelMode === 'both') {
            g = parseInt((bb.height - 400) / 2);
            mglft = 0;
            btrgt = 27
        } else {
            g = parseInt((bc.height - h.height) / 2);
            mglft = parseInt((bc.width - h.width) / 2);
            if (mglft < 60) {
                btrgt = 3
            } else {
                btrgt = parseInt(mglft / 2 - 27)
            }
        }
        $('#' + S + 'sv-nav-photo-list').css('margin-top', g).css('margin-left', mglft).height(h.height).width(h.width - 2);
        $('#' + S + 'sv-nav-page-label').css('left', parseInt(mglft + h.width / 2) - 20).css('top', g + h.height + 10);
        $('#' + S + 'sv-nav-page-caption').css('left', mglft).css('top', g - 28);
        $('#' + S + 'sv-nav-page-prev').css('left', btrgt);
        $('#' + S + 'sv-nav-page-next').css('right', btrgt + 5);
        resizeImages()
    }
    function convertNavPnlIndex(a, b) {
        var c = a.rowCount * a.colCount;
        var d = b.rowCount * b.colCount;
        var e = c * a.crntPnlIndex;
        var f = (c + 1) * a.crntPnlIndex - 1;
        var g = e;
        if (a.imgIndex >= e && a.imgIndex <= f) {
            g = a.imgIndex
        }
        var h = parseInt(g / d);
        return {
            pnlIndex: h,
            pnlImgOnPageIdx: (g % d),
            thumbnailPerPage: d
        }
    }
    function repopuateNavPanel() {
        if (!separateNavPanel()) {
            return
        }
        var a = {
            colCount: bc.maxColCount,
            rowCount: bc.maxRowCount,
            crntPnlIndex: bc.navListIndex,
            imgIndex: (bj - 1)
        };
        var b;
        setGridScale();
        b = convertNavPnlIndex(a, {
            colCount: bc.maxColCount,
            rowCount: bc.maxRowCount
        });
        bc.navListIndex = b.pnlIndex;
        setNavPnlCalculatedValues();
        removeExtraNavList(a.crntPnlIndex);
        populatePhotoList(bc.navListIndex)
    }
    hideUrlBar = {
        AfterIni: function () {
            if (bf.displayMode !== 'fullscreen') {
                return
            }
            if (isIphone()) {
                window.scrollTo(0, 1)
            } else if (isSmallAndroid()) {
                window.scrollTo(0, 1)
            }
        },
        InTimer: function () {
            if (bf.displayMode !== 'fullscreen') {
                return
            }
            if (isSmallAndroid() && getAndroidVer() >= 2.3) {
                window.scrollTo(0, 1)
            }
        },
        hidingTimer: 0,
        hidingTimer2: 0,
        AfterResizing: function () {
            if (bf.displayMode !== 'fullscreen') {
                return
            }
            if (isIphone()) {
                window.scrollTo(0, 1)
            } else if (isSmallAndroid()) {
                if (hideUrlBar.hidingTimer) {
                    window.clearTimeout(hideUrlBar.hidingTimer)
                }
                hideUrlBar.hidingTimer = window.setTimeout(function () {
                    hideUrlBar.hidingTimer = 0;
                    window.scrollTo(0, 1);
                    if (hideUrlBar.hidingTimer2) {
                        window.clearTimeout(hideUrlBar.hidingTimer2)
                    }
                    hideUrlBar.hidingTimer2 = window.setTimeout(function () {
                        hideUrlBar.hidingTimer2 = 0;
                        $('.cls-prev-photo, .sv-nav-page-label').hide();
                        window.setTimeout(function () {
                            $('.cls-prev-photo, .sv-nav-page-label').show()
                        }, 100)
                    }, 500)
                }, 4000)
            }
        }
    };

    function resizeViewer() {
        if (hideUrlBar.hidingTimer) {
            window.clearTimeout(hideUrlBar.hidingTimer)
        }
        if (hideUrlBar.hidingTimer2) {
            window.clearTimeout(hideUrlBar.hidingTimer2)
        }
        hideUrlBar.hidingTimer = 0;
        hideUrlBar.hidingTimer2 = 0;
        setPanelSize();
        repopuateNavPanel(true);
        setMvSize();
        hideUrlBar.AfterResizing()
    }
    function resizeImages() {
        $('#' + S + 'sv-photos .sv-photo.photo-frame').each(function () {
            if (!$(this).hasClass('loading')) {
                resizeImage(parseInt($(this).attr('id').replace(S + 'sv-photo-', '')))
            }
        })
    }
    function resizePhoto(a, b, c) {
        var d, origH, targetW, targetH, ration, xRatio, yRatio;
        var e, newSvHeight;
        d = b;
        origH = c;
        e = bb.width;
        newSvHeight = bb.height;
        xRatio = e / d;
        yRatio = newSvHeight / origH;
        ratio = Math.min(xRatio, yRatio);
        var f = 0;
        if (xRatio > yRatio) {
            var g;
            g = newSvHeight;
            f = 0;
            $('#' + S + 'sv-photo-' + a + ' img').css({
                'height': g + 'px',
                'width': 'auto',
                'marginTop': f + 'px'
            })
        } else {
            var h, nImgH;
            h = e;
            nImgH = parseInt(origH * xRatio);
            $('#' + S + 'sv-photo-' + a + ' img').css({
                'width': h + 'px',
                'height': 'auto',
                'marginTop': parseInt((newSvHeight - nImgH) / 2) + 'px'
            })
        }
    }
    function resizeImage(a) {
        if (!Y.images[a].preloadSet) {
            window.setTimeout(function () {
                preloadImages(a, 1)
            }, 250);
            return
        }
        if (!Y.images[a].preloaded || !Y.images[a].preloadedImage || !Y.images[a].preloadedImage.height) {
            window.setTimeout(function () {
                resizeImage(a)
            }, 250);
            return
        }
        resizePhoto(a, Y.images[a].preloadedImage.width, Y.images[a].preloadedImage.height)
    }
    function resizeFlashViewer() {
        Z = getWindowHeight();
        winWidth = getWindowWidth();
        if (bf.displayMode === 'fullscreen') {
            svContainer.css('position', 'static');
            $('#' + S + 'sv-mobile-flash').width(winWidth);
            $('#' + S + 'sv-mobile-flash').height(Z)
        } else {
            if (bd.indexOf('%') === -1) {
                bb.width = parseInt(bd || ba.width || winWidth)
            } else {
                if ($('table #' + svContainerId).length <= 0 || hasFixedSizeTag(svContainer, "width")) {
                    ba.width = getContainerWidth(svContainer) || winWidth;
                    bb.width = ba.width
                } else {
                    if (ba.widthRatio) {
                        bb.width = ba.widthRatio * winWidth;
                        if (bb.width - 20 < parseInt(winWidth) && bb.width > parseInt(winWidth) - 20) {
                            bb.width -= 20
                        }
                    } else {
                        bb.width = (ba.width || winWidth)
                    }
                }
            }
            if (svHeight.indexOf('%') === -1) {
                bb.height = parseInt(svHeight || ba.height || Z)
            } else {
                if (hasFixedSizeTag(svContainer, "height")) {
                    ba.height = getContainerHeight(svContainer);
                    bb.height = ba.height
                } else {
                    if (ba.heightRatio) {
                        bb.height = ba.heightRatio * Z
                    } else {
                        bb.height = (ba.height || Z)
                    }
                }
            }
            $('#' + S + 'sv-mobile-flash').width(bb.width).children().width(bb.width);
            $('#' + S + 'sv-mobile-flash').height(bb.height).children().height(bb.height)
        }
    }
    function preloadImages(b, c) {
        var i, end;
        if (b < 0) {
            b = 0
        }
        end = ((b - 1 + c) > Y.images.length - 1) ? Y.images.length - 1 : (b - 1 + c);
        for (i = b; i <= end; i += 1) {
            if (needPageReload() && R) {
                $('#' + S + 'sv-photo-' + i + ' img').attr('src', Y.images[i].imageURL);
                $('#' + S + 'sv-photo-' + i).removeClass('loading');
                var d = $('#' + S + 'sv-photo-' + i + ' img');
                resizePhoto(i, d.width(), d.height())
            } else if (!Y.images[i].preloadSet) {
                Y.images[i].preloadedImage = new Image();
                Y.images[i].preloadedImage.onload = function (a) {
                    return function () {
                        Y.images[a].preloaded = true;
                        $('#' + S + 'sv-photo-' + a + ' img').attr('src', Y.images[a].imageURL);
                        $('#' + S + 'sv-photo-' + a).removeClass('loading');
                        resizeImage(a)
                    }
                }(i);
                Y.images[i].preloadedImage.src = Y.images[i].imageURL;
                Y.images[i].preloadSet = true
            } else if (Y.images[i].preloaded) {
                resizeImage(i)
            }
            if (!Y.images[i].imageLoaded) {
                Y.images[i].imageLoaded = true;
                if (!Y.loadedCount) {
                    Y.loadedCount = 0
                }
                Y.loadedCount++
            }
        }
    }
    function isInIframe() {
        if (top && top.location !== location) {
            return true
        }
        return false
    }
    function errorMessage(a) {
        var b, newH;
        if (bd.indexOf('%') > -1) {
            b = Math.floor((bd.replace('%', '') / 100) * ba.width)
        } else {
            b = parseInt(bd)
        }
        if (svHeight.indexOf('%') > -1) {
            newH = Math.floor((svHeight.replace('%', '') / 100) * (ba.height || Z))
        } else {
            newH = parseInt(svHeight)
        }
        setPanelSize();
        setMvSize();
        $('#' + S + 'sv-mobile').html('<div id="' + S + 'sv-error" class="sv-cls-error" style=""><div id="' + S + 'sv-error-text" class="sv-cls-error-text">' + a + '</div><div id="' + S + 'sv-error-bg" class="sv-cls-error-bg"></div></div>');
        $('#' + S + 'sv-error').css({
            'width': $('#' + S + 'sv-error-text').outerWidth() + 'px',
            'height': $('#' + S + 'sv-error-text').outerHeight() + 'px',
            'top': (newH / 2) - ($('#' + S + 'sv-error-text').outerHeight() / 2) + 'px',
            'left': (b / 2) - ($('#' + S + 'sv-error-text').outerWidth() / 2) + 'px'
        });
        $('#' + S + 'sv-error-bg').css({
            'height': $('#' + S + 'sv-error-text').outerHeight() + 'px'
        })
    }
    function getImageHtmlContent(i) {
        var a = '<img src="' + svCoreURL + 'img/empty-pixel.png" alt="">';
        if (Y.images[i].preloaded) {
            a = '<img src="' + Y.images[i].imageURL + '" alt="">'
        }
        a += '<div class="sv-caption clearfix" style="font-size: ' + bi + 'px;' + (bb.showOverlay && Y.mobileshowcaption ? '' : 'display:none;') + '">';
        a += '<div class="sv-paging">' + (i + 1) + '/' + U + '</div>';
        a += Y.images[i].caption ? '<div class="sv-title">' + Y.images[i].caption + '</div>' : '';
        a += '<div class="sv-description">' + Y.images[i].description + '</div>';
        a += '</div>';
        return a
    }
    function getImageHtml(i, a) {
        if (i < 0 || i >= Y.images.length) {
            return ''
        }
        var b = (Y.images[i] && Y.images[i].preloaded) ? '' : 'loading';
        var c = '<div class="sv-photo ' + b + ' photo-frame" id="' + S + 'sv-photo-' + i + '" style="' + (a ? a : '') + '">';
        c += getImageHtmlContent(i);
        c += '</div>';
        return c
    }
    function populatePhotoFrame(a) {
        var b = '';
        var c = supportWebkitAnim() ? '-webkit-transform:translateX(-' + (bb.width + X) + 'px);' : 'left:' + (-bb.width) + 'px;';
        var d = supportWebkitAnim() ? '-webkit-transform:translateX(' + (bb.width + X) + 'px);' : 'left:' + bb.width + 'px;';
        if (a > 0) {
            b += getImageHtml(a - 1, c)
        }
        b += getImageHtml(a);
        if (a < U - 1) {
            b += getImageHtml(a + 1, d)
        }
        $('#' + S + 'sv-photos').html(b);
        if (a > 0) {
            preloadImages(a - 1, 1)
        }
        preloadImages(a, 1);
        if (a < U - 1) {
            preloadImages(a + 1, 1)
        }
        setMvSize()
    }
    function adjCurrentIndex(a) {
        if (a > Y.images.length) {
            a = Y.images.length
        }
        if (a <= 0) {
            a = 1
        }
        return a
    }
    function removeExtraNavList(a) {
        if (a < 0 || a >= U - 1) {
            return
        }
        if (supportWebkitAnim()) {
            var b = document.getElementById(S + '-nav-lst-' + a);
            b.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
            b.style.webkitTransitionDuration = '0';
            b.style.webkitTransform = '';
            if (needPageReload()) {
                $('#' + S + '-nav-lst-' + a + ' img').attr('src', '')
            }
        }
        $('#' + S + '-nav-lst-' + a).remove()
    }
    function move2NavListPnl(a, b, c) {
        if (a < 0 || a > bc.totalPage || b < 0 || b > bc.totalPage) {
            return
        }
        var d = 0;
        if (a > b) {
            d = 1
        } else if (b > a) {
            d = -1
        }
        if (d === 0) {
            return
        }
        if (Math.abs(b - a) > 1) {
            removeExtraNavList(a + d);
            removeExtraNavList(a);
            populatePhotoList(b);
            return
        }
        removeExtraNavList(a + d);
        var e = getSlideDuration();
        if (!supportWebkitAnim()) {
            $('#' + S + '-nav-lst-' + a).animate({
                left: (d * getThumbnailGridSize().width) + 'px'
            }, {
                specialEasing: {
                    left: 'easeOutQuart'
                },
                duration: e.d
            });
            $('#' + S + '-nav-lst-' + b).animate({
                left: '0'
            }, {
                specialEasing: {
                    left: 'easeOutQuart'
                },
                duration: e.d,
                complete: function () {
                    populatePhotoList(b)
                }
            });
            return
        }
        var f = $('#' + S + '-nav-lst-' + a);
        var g = getPhotoListHtml(b - d, '-webkit-animation-duration:0;-webkit-transform:translateX(' + (-d * getThumbnailGridSize().width) + 'px);');
        if (d < 0) {
            $('#' + S + 'sv-nav-photo-list').append(g)
        } else {
            $(g).insertBefore('#' + S + '-nav-lst-' + b)
        }
        setNavControls(bc.navListIndex, bj - 1);
        var h = document.getElementById(S + '-nav-lst-' + a);
        var i = document.getElementById(S + '-nav-lst-' + b);
        h.style.webkitTransitionProperty = '-webkit-transform';
        i.style.webkitTransitionProperty = '-webkit-transform';
        if (c) {
            h.style.webkitTransitionTimingFunction = 'cubic-bezier(0.11,0.16,0.60,1)';
            h.style.webkitTransitionDuration = e.fixeddur + 'ms';
            i.style.webkitTransitionTimingFunction = 'cubic-bezier(0.11,0.16,0.60,1)';
            i.style.webkitTransitionDuration = e.fixeddur + 'ms'
        } else {
            h.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
            h.style.webkitTransitionDuration = e.d + 'ms';
            i.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
            i.style.webkitTransitionDuration = e.d + 'ms'
        }
        h.style.webkitTransform = 'translate3d(' + (d * 100) + '%, 0px, 0px)';
        i.style.webkitTransform = 'translate3d(0px, 0px, 0px)'
    }
    function getSlideDuration() {
        if (isIpad() || isAndroid() || isIphone()) {
            return {
                od: 200,
                d: 400,
                glcls: "anim-go2left-ipad",
                grcls: "anim-go2right-ipad",
                fixeddur: 200
            }
        }
        return {
            od: 200,
            d: 500,
            glcls: "anim-go2left",
            grcls: "anim-go2right"
        }
    }
    function removeExtraPhoto(a) {
        if (supportWebkitAnim()) {
            var b = document.getElementById(S + 'sv-photo-' + a);
            if (b) {
                b.style.webkitTransitionDuration = '0';
                b.style.webkitTransform = ''
            }
            if (needPageReload()) {
                $('#' + S + 'sv-photo-' + a + ' img').attr('src', '')
            }
        }
        $('#' + S + 'sv-photo-' + a).remove()
    }
    var bq = '';

    function removeExtraPhotos(a, b) {
        if (b > a) {
            if (a - 1 >= 0) {
                removeExtraPhoto(a - 1)
            }
            if (a + 1 < b - 1) {
                removeExtraPhoto(a + 1)
            }
        } else {
            if (a + 1 < U - 1) {
                removeExtraPhoto(a + 1)
            }
            if (a - 1 > b + 1) {
                removeExtraPhoto(a - 1)
            }
        }
        var c = bq.split(',');
        var d, i;
        for (i = 0; i < c.length; i++) {
            d = parseInt(c[i]);
            if (d !== a && Math.abs(d - b) > 1) {
                removeExtraPhoto(d)
            }
        }
        bq = ''
    }
    function setCurrentPohot(a) {
        $('#' + S + 'nav-pht-lnks-' + a).addClass('current').addClass('visited')
    }
    function setNavStyle(a, b) {
        $('#' + S + 'nav-pht-lnks-' + a).removeClass('current');
        setCurrentPohot(b);
        setCaptionEvent()
    }
    var br = null;
    var bs = null;

    function cancelUnfinishedAnima() {
        if (br) {
            br.stop()
        }
        if (bs) {
            bs.stop()
        }
        br = null;
        bs = null
    }
    function setCaptionEvent() {
        var a = $('#' + S + 'sv-photos .sv-photo .sv-caption');
        a.unbind();
        a.hover(function () {
            bb.showOverlay = true;
            setOverlay(bb.showOverlay)
        }, function () {
            bb.showOverlay = false;
            setOverlay(bb.showOverlay)
        })
    }
    var bt = 0;

    function move2Photo(a, b, c, d, e) {
        if (a < 0 || a > U || b < 0 || b > U || a === b) {
            return
        }
        var f = 0;
        if (a > b) {
            f = 1
        } else if (b > a) {
            f = -1
        }
        if (b >= 0 && b < U) {
            Y.images[b].visited = true
        }
        var g = parseInt(b / bc.thumbCountPerPage);
        var h = bc.navListIndex;
        bc.navListIndex = g;
        if (needPageReload() && !R && Y.loadedCount >= W + 2) {
            bj = b + 1;
            SV.simpleviewer.saveCurrentPage();
            $('#' + S + 'sv-photo-detail').hide();
            reloadPhotoSlid();
            return
        }
        move2NavListPnl(h, bc.navListIndex);
        setNavControls(bc.navListIndex, b);
        removeExtraPhotos(a, b);
        $('#' + S + 'sv-open-window').attr('href', Y.images[b].imageFullURL).attr('target', Y.images[b].linkTarget);
        var i = 'width:' + bb.width + 'px;height:' + bb.height + 'px;';
        if (Math.abs(a - b) > 1) {
            var j;
            if (supportWebkitAnim()) {
                j = getImageHtml(b, '-webkit-animation-duration:0;-webkit-transform:translateX(' + (-f * (bb.width + X)) + 'px);' + i)
            } else {
                j = getImageHtml(b, 'left:' + (-f * (bb.width + X)) + 'px;' + i)
            }
            if (f < 0) {
                $('#' + S + 'sv-photos').append(j)
            } else {
                $(j).insertBefore('#' + S + 'sv-photo-' + a)
            }
            preloadImages(b, 1)
        }
        if (c === 'calledfromnav') {
            populatePhotoFrame(b);
            setCaptionEvent()
        } else {
            var k = getSlideDuration();
            if (!supportWebkitAnim()) {
                var l = $('#' + S + 'sv-photo-' + b);
                if (l.length <= 0) {
                    populatePhotoFrame(b);
                    setCaptionEvent();
                    setNavStyle(a, b);
                    return
                }
                cancelUnfinishedAnima();
                bs = $('#' + S + 'sv-photo-' + a);
                bs.animate({
                    left: (f * (bb.width + X)) + 'px'
                }, k.d, 'easeOutQuart', function () {
                    bs = null
                });
                br = l;
                l.animate({
                    left: '0'
                }, k.d, 'easeOutQuart', function () {
                    cancelUnfinishedAnima();
                    if (parseInt($('#' + S + 'sv-photo-' + b).css('left')) === 0) {
                        populatePhotoFrame(b)
                    }
                    br = null
                });
                setNavStyle(a, b);
                return
            }
            var m = $('#' + S + 'sv-photo-' + a);
            var n = getImageHtml(b - f, '-webkit-animation-duration:0;-webkit-transform:translateX(' + (-f * (bb.width + X)) + 'px);' + i);
            var o;
            if (f < 0) {
                $('#' + S + 'sv-photos').append(n);
                if (b - a > 1) {
                    o = getImageHtml(b - 1, '-webkit-animation-duration:0;-webkit-transform:translateX(' + (-f * (bb.width + X)) + 'px);' + i);
                    $(o).insertBefore('#' + S + 'sv-photo-' + b);
                    preloadImages(b - 1, 1)
                }
            } else {
                $(n).insertBefore('#' + S + 'sv-photo-' + b);
                if (a - b > 1) {
                    o = getImageHtml(b + 1, '-webkit-animation-duration:0;-webkit-transform:translateX(' + (-f * (bb.width + X)) + 'px);' + i);
                    $('#' + S + 'sv-photos').append(o);
                    preloadImages(b + 1, 1)
                }
            }
            preloadImages(b - f, 1);
            setNavStyle(a, b);
            var p = document.getElementById(S + 'sv-photo-' + a);
            var q = document.getElementById(S + 'sv-photo-' + b);
            p.style.webkitTransitionProperty = '-webkit-transform';
            q.style.webkitTransitionProperty = '-webkit-transform';
            if (d) {
                p.style.webkitTransitionTimingFunction = 'cubic-bezier(0.11,0.16,0.60,1)';
                p.style.webkitTransitionDuration = k.fixeddur + 'ms';
                q.style.webkitTransitionTimingFunction = 'cubic-bezier(0.11,0.16,0.60,1)';
                q.style.webkitTransitionDuration = k.fixeddur + 'ms'
            } else {
                p.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
                p.style.webkitTransitionDuration = k.d + 'ms';
                q.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
                q.style.webkitTransitionDuration = k.d + 'ms'
            }
            if (!separateNavPanel()) {
                if (bt) {
                    window.clearTimeout(bt);
                    bt = 0
                }
                bt = window.setTimeout(function () {
                    p.style.webkitTransform = 'translate3d(' + (f * bb.width) + 'px, 0px, 0px)';
                    q.style.webkitTransform = 'translate3d(0px, 0px, 0px)';
                    bt = 0
                }, 100)
            } else {
                p.style.webkitTransform = 'translate3d(' + (f * (bb.width + X)) + 'px, 0px, 0px)';
                q.style.webkitTransform = 'translate3d(0px, 0px, 0px)';
                bt = 0
            }
            var r = $('#' + S + 'sv-photo-' + b + ' a');
            if (r.length > 0) {
                var s = $('#' + S + 'sv-photos .sv-photo .sv-caption').height() + 10;
                if (!Q) {
                    s = parseInt(s) + 35
                }
                $('#' + S + 'sv-prev-photo span, #' + S + 'sv-next-photo span').css('top', parseInt(bb.height / 2));
                $('#' + S + 'sv-prev-photo, #' + S + 'sv-next-photo').height(bb.height - s)
            }
        }
        setNavStyle(a, b);
        bq += a + ','
    }
    function getIosVer() {
        var a = new RegExp(/ OS \d_\d(\S)* like Mac OS/);
        var b = a.exec(navigator.userAgent);
        if (!b) {
            return 0
        }
        b = b[0].replace(' OS ', '').replace('_', '.');
        return parseFloat(b)
    }
    function isIpad() {
        if (navigator.userAgent.match(/iPad/i)) {
            return true
        }
        return false
    }
    function isSmallAndroid() {
        if (isAndroid() && Math.max(screen.width, screen.height) < 800) {
            return true
        }
        return false
    }
    function separateNavPanel() {
        return true
    }
    function toggleOverlay() {
        if (bb.showOverlay) {
            bb.showOverlay = false
        } else {
            bb.showOverlay = true
        }
    }
    function useClickableOverlay() {
        if (isIpad() || isAndroid() || isIphone()) {
            return true
        }
        return false
    }
    function needPageReload() {
        var a = getIosVer();
        if (navigator.userAgent.match(/iPad/i) && a < 4.3) {
            return true
        }
        if (navigator.userAgent.match(/iPhone/i) && a < 4.3) {
            return true
        }
        return false
    }
    function isWindowsPhone7IE() {
        return false;
        if (navigator.userAgent.match(/Windows Phone OS 7/i) && navigator.userAgent.match(/MSIE/i)) {
            return true
        }
        return false
    }
    function isAndroid() {
        if (navigator.userAgent.match(/Android/i)) {
            return true
        }
        return false
    }
    function getAndroidVer() {
        var a = navigator.userAgent.indexOf('Android');
        if (a < 0) {
            return 0
        }
        var b = navigator.userAgent.indexOf(';', a);
        if (b <= a) {
            return 0
        }
        var c = navigator.userAgent.substring(a, b);
        var d = c.split(' ');
        if (d.length !== 2) {
            return 0
        }
        return parseFloat(d[1])
    }
    function isIphone() {
        if (navigator.userAgent.match(/iPhone/i)) {
            return true
        }
        return false
    }
    function isSvBiggerThanWin() {
        if (window.innerWidth > 0 && bb.width > window.innerWidth) {
            return true
        }
        if (window.innerHeight > 0 && bb.height > window.innerHeight) {
            return true
        }
        return false
    }
    function isSwipable(a) {
        if (bf.displayMode !== 'fullscreen' && ((a && a.disableswipe) || isSvBiggerThanWin())) {
            return false
        } else if (isAndroid() || isIpad() || isIphone()) {
            return true
        }
        return false
    }
    function supportWebkitAnim() {
        if (navigator.userAgent.match(/AppleWebKit/i)) {
            return true
        }
        return false
    }
    function formatColor(a) {
        if (a && a.toLowerCase() === 'transparent') {
            return a
        }
        return "#" + a
    }
    function getContainerHeightRatio2Win(a) {
        return getContainerSizeRatio2Win(a, getInlineCssHeight)
    }
    function getContainerHeight(a) {
        return getContainerSize(a, getContainerPxHeight, Z, "height")
    }
    function getContainerPxHeight(a) {
        var b, bdyh;
        if ($.browser.msie && $.browser.version === '6.0') {
            b = getInlineCssHeight(a.attr("style"));
            if (parseInt(b) > 0 && b.indexOf("%") < 0) {
                return parseInt(b)
            }
        } else {
            if ($.browser.msie) {
                var c = a.attr("id");
                var d = document.getElementById(c);
                b = d ? d.clientHeight : 0
            } else {
                b = a.height()
            }
        }
        b = parseInt(b);
        if ($.browser.msie && $.browser.version < 8) {
            if ($.browser.version < 7) {
                if (b && !(b < 0.5 * a.width())) {
                    return b
                }
                return 0
            }
            bdyh = $('body').height();
            if (bdyh === 0) {
                return 0
            } else if (bdyh < 0.7 * Z) {
                return Z - bdyh
            }
        }
        if (b && !($.browser.msie && $.browser.version < 7 && b < 0.5 * a.width())) {
            return b
        }
        bdyh = $('body').height();
        if (bdyh === 0) {
            return 0
        }
        var e = a.parent();
        while (e && e.length > 0) {
            if (e.height()) {
                return e.height()
            }
            e = e.parent()
        }
        return 0
    }
    function getInlineCssWidth(a) {
        var w = getInlineStyleValue(a, "width");
        if (parseInt(w) === 0) {
            return 0
        }
        return w
    }
    function getInlineCssHeight(a) {
        var h = getInlineStyleValue(a, "height");
        if (parseInt(h) === 0) {
            return 0
        }
        return h
    }
    function getInlineStyleInt(a, k) {
        return parseInt(getInlineStyleValue(a, k))
    }
    function getInlineStyleValue(a, k) {
        if (!a || !k) {
            return ''
        }
        var b = a.split(';');
        var c, itm, vk, vv, i;
        for (i = 0; i < b.length; i++) {
            itm = $.trim(b[i]);
            if (!itm) {
                continue
            }
            c = itm.split(':');
            if (c.length !== 2) {
                continue
            }
            vk = $.trim(c[0]);
            vv = $.trim(c[1]);
            if (!vk) {
                continue
            }
            if (vk.toLowerCase() === k.toLowerCase()) {
                return vv
            }
        }
        return ''
    }
    function isPercentage(a, b) {
        var c = getInlineStyleValue(a, b);
        if (c.indexOf('%') < 0 && parseInt(c)) {
            return false
        }
        return true
    }
    function hasFixedSizeTag(c, d) {
        var e = false;
        var f = false;
        c.parents().each(function (i, n) {
            if (f) {
                return
            }
            var a = n.nodeName.toUpperCase();
            if (a === "HTML" || a === "BODY") {
                f = true;
                return
            }
            var b = $(n).attr("style");
            if (!isPercentage(b, d)) {
                f = true;
                e = true
            }
        });
        return e
    }
    function getContainerSizeRatio2Win(c, d) {
        var e = 1;
        var f = 0;
        var g;
        c.parents().each(function (i, n) {
            var a = n.nodeName.toUpperCase();
            if (a === "HTML" || a === "BODY") {
                return
            }
            g = $(n).attr("style");
            var b = d(g);
            if (b.toLowerCase().indexOf('%') < 0 && parseInt(b) > 0) {
                f = parseInt(b)
            }
            if (!b || f > 0) {
                return
            }
            if (b.indexOf("%") > 0) {
                e *= (parseInt(b) / 100)
            }
        });
        if (f > 0) {
            return 0
        }
        g = c.attr("style");
        var h = d(g);
        if (h.indexOf("%") > 0) {
            e *= (parseInt(h) / 100)
        } else if (parseInt(h) > 0) {
            return 0
        }
        return e
    }
    function getContainerWidthRatio2Win(a) {
        return getContainerSizeRatio2Win(a, getInlineCssWidth)
    }
    function getContainerSize(c, d, e, f) {
        var g = d(c);
        if (g) {
            return g
        }
        if (!getInlineStyleInt(c.attr('style'), f) && !getInlineStyleInt(c.parents().attr('style'), f)) {
            return 0
        }
        var h = 1;
        var j = 0;
        c.parents().each(function (i, n) {
            var a = n.nodeName.toUpperCase();
            if (a === "HTML" || a === "BODY") {
                return
            }
            var b = getInlineStyleValue($(n).attr('style'), f);
            if (!b || j > 0) {
                return
            }
            if (b.indexOf("%") > 0) {
                h *= (parseInt(b) / 100)
            } else {
                j = parseInt(b)
            }
        });
        return h * (j || e)
    }
    function getContainerWidth(a) {
        return getContainerSize(a, getContainerPxWidth, winWidth, "width")
    }
    function getContainerPxWidth(a) {
        if ($.browser.msie && $.browser.version === '6.0') {
            var b = getInlineCssWidth(a.attr("style"));
            if (parseInt(b) > 0 && b.indexOf("%") < 0) {
                return parseInt(b)
            }
        }
        if (a.width()) {
            return a.width()
        }
        var c = $('body').width();
        if (c === 0) {
            return 0
        }
        var d = a.parent();
        while (d && d.length > 0) {
            if (d.width()) {
                return d.width()
            }
            d = d.parent()
        }
        return 0
    }
    function getPresetUrlOptions(d, e, f) {
        $.ajax({
            type: 'GET',
            url: (isOnRoot(d) ? d : (e.baseurl ? e.baseurl + (isEndedWithSlash(e.baseurl) ? '' : '/') + d : d)),
            dataType: ($.browser.msie) ? 'text' : 'xml',
            success: function (a) {
                var b;
                if (typeof a === 'string') {
                    b = new ActiveXObject("Microsoft.XMLDOM");
                    b.async = false;
                    b.loadXML(a)
                } else {
                    b = a
                }
                var c = parseXML(b, e.baseurl);
                c = $.extend(c, e);
                delete c.images;
                Y = $.extend(false, Y, c);
                U = Y.images.length;
                f()
            },
            error: function (a, b, c) {
                if (navigator.userAgent.indexOf('Chrome') > -1 && (window.location.href.indexOf('http://') === -1 && window.location.href.indexOf('https://') === -1)) {
                    errorMessage('SimpleViewer does not display locally in Google Chrome.')
                } else {
                    errorMessage('Gallery XML Not Found.')
                }
            }
        })
    }
    function parseBool(a, b) {
        if (typeof (a) === 'undefined') {
            return b
        }
        if (typeof (a) !== 'string') {
            return a
        }
        if (a.toLowerCase() === "false") {
            return false
        }
        if (a.toLowerCase() === "true") {
            return true
        }
        return a
    }
    function setCookie(a, b, c) {
        if (c < 0) {
            c = 'Thu, 01 Jan 1970 00:00:00 GMT'
        } else {
            c = ''
        }
        document.cookie = a + "=" + escape(b) + ((c === '') ? "" : ";expires=" + c) + ';path=/'
    }
    function getCookie(a) {
        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(a + "=");
            if (c_start !== -1) {
                c_start = c_start + a.length + 1;
                c_end = document.cookie.indexOf(";", c_start);
                if (c_end === -1) {
                    c_end = document.cookie.length
                }
                return unescape(document.cookie.substring(c_start, c_end))
            }
        }
        return ""
    }
    function getCrntImgIdxKey() {
        return S + "svcrntimgi"
    }
    function getCrntNavIdxKey() {
        return S + "svcrntnavi"
    }
    function getSvReLoadedFlag() {
        return S + "svcrntimgi_lf"
    }
    function getCrntDisplayedPanelKey() {
        return S + "svcrntpanel"
    }
    function getVisitedPhotoKey() {
        return S + "svvisitedphotos"
    }
    function getIfShowOverlay() {
        return S + "svckifshowoverlay"
    }
    function getThumbnailCountPerPage() {
        return S + "svthumbnailcountperpage"
    }
    function getCurrentImgIdxFromCookie() {
        if (!getCookie(getSvReLoadedFlag())) {
            return null
        }
        var a = parseInt(getCookie(getCrntImgIdxKey()));
        setCookie(getSvReLoadedFlag(), '', -10);
        var b = parseInt(getCookie(getCrntNavIdxKey()));
        var c = parseInt(getCookie(getThumbnailCountPerPage()));
        var d = parseBool(getCookie(getIfShowOverlay()));
        var e = parseInt(getCookie(getCrntDisplayedPanelKey())) > 0 ? true : false;
        var f = getCookie(getVisitedPhotoKey());
        return {
            crntImgIdx: a,
            crntNavIdx: b,
            navPnlVisible: e,
            visitedImages: f,
            showOverlay: d,
            thumbnailPageCount: c
        }
    }
    function setCurrentImgIdxCookie(a) {
        setCookie(getCrntImgIdxKey(), a, null);
        setCookie(getCrntNavIdxKey(), bc.navListIndex);
        setCookie(getThumbnailCountPerPage(), bc.thumbCountPerPage);
        setCookie(getSvReLoadedFlag(), '1', null);
        setCookie(getIfShowOverlay(), bb.showOverlay);
        var t = $('#' + S + 'sv-photo-navigation:visible').length;
        setCookie(getCrntDisplayedPanelKey(), t);
        var i, visitedImgs = '';
        for (i = 0; i < Y.images.length; i++) {
            if (!Y.images[i].visited) {
                continue
            }
            visitedImgs += (i + ',')
        }
        setCookie(getVisitedPhotoKey(), visitedImgs)
    }
    function reloadPhotoSlid() {
        location.reload(true)
    }
    function getiPhoneAdjRatio(a, b) {
        if (!isIphone()) {
            return 1
        }
        return (a > b) ? 1.20 : 1.30
    }
    function adjustHeight4Devices(a, b) {
        if (isIphone()) {
            return a * getiPhoneAdjRatio(a, b)
        } else if (isSmallAndroid()) {
            if (getAndroidVer() >= 2.3) {
                return a + 1
            } else {
                return a - 24
            }
        }
        return a
    }
    function initializePhotoFrameObjs() {
        bk = document.getElementById(S + 'sv-photos');
        bk.style.webkitTransitionProperty = '-webkit-transform';
        bk.style.webkitTransitionTimingFunction = 'cubic-bezier(0.09,0.34,0.06,1)';
        var a = getSlideDuration();
        bl = a.d + 'ms';
        bk.style.webkitTransitionDuration = bl
    }
    var bu = 0;

    function setOverlay(a) {
        if (bu) {
            window.clearTimeout(bu);
            bu = 0
        }
        bu = window.setTimeout(function () {
            bu = 0;
            showOverlayControlsAnim(a)
        }, 100)
    }
    function getQueryStrValue(a, b) {
        var c = b + '=';
        var d = a.indexOf(c);
        if (d < 0) {
            return ''
        }
        return a.substring(d + c.length).split('&')[0]
    }
    function formatSize(v) {
        if (v.indexOf('%') > 0) return v;
        return parseInt(v) + 'px'
    }
    function setContainerSize(w, h, a) {
        a.css('width', formatSize(w));
        a.css('height', formatSize(h))
    }
    V = {
        load: function (A, B, C, D, E, F, G, H, I, J) {
            S = A;
            if (!$.easing.easeOutQuart) {
                $.extend($.easing, {
                    easeOutQuart: function (x, t, b, c, d) {
                        return -c * ((t = t / d - 1) * t * t * t - 1) + b
                    }
                })
            }
            svContainerId = B;
            svContainer = $('#' + B);
            svContainer.html('');
            setContainerSize(C, D, svContainer);
            var K;
            winWidth = getWindowWidth();
            Z = adjustHeight4Devices(getWindowHeight(), winWidth);
            C = C.replace('px', '');
            D = D.replace('px', '');
            ba.width = getContainerWidth(svContainer);
            ba.height = getContainerHeight(svContainer);
            ba.widthRatio = getContainerWidthRatio2Win(svContainer);
            ba.heightRatio = getContainerHeightRatio2Win(svContainer);
            bd = C;
            svHeight = D;
            if (C === '100%' && D === '100%' && svContainer.width() === $('body').width() && (!ba.height || ba.height === Z) && ba.widthRatio === 1 && ba.heightRatio === 1) {
                bf.displayMode = 'fullscreen';
                setBodySize(Z, winWidth);
                $('meta#sv-meta').attr("content", "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no")
            } else {
                bf.displayMode = 'embed';
                if (!ba.height && D.indexOf('%') === -1) {
                    svContainer.css({
                        'height': D + 'px'
                    })
                }
                $('meta#sv-meta').remove()
            }
            var L = decodeURIComponent(window.location.href);
            var M = getQueryStrValue(L, 'bg');
            if (M) {
                E = M
            }
            backgroundColor = (E ? E.replace('#', '') : '');
            bh = G || {};
            params = H || {};
            attributes = I || {};
            var N = Q && (J === null || typeof J === 'undefined' || (typeof J !== 'undefined' && J));
            if (!isAndroid() && typeof swfobject !== 'undefined' && swfobject.hasFlashPlayerVersion(bg) && (typeof F === 'undefined' || (typeof F !== 'undefined' && F))) {
                var O;
                if (swfobject.hasFlashPlayerVersion('10.0.0') && N) {
                    O = svCoreURL + 'swf/simpleviewer_icc.swf'
                } else {
                    O = svCoreURL + 'swf/simpleviewer.swf'
                }
                K = parseInt(ba.height || Z);
                svContainer.html(generateSVFlashHtml());
                $('#' + S + 'sv-mobile-flash').height(K);
                params.allowfullscreen = true;
                params.allowscriptaccess = 'always';
                if (!E || E.toLowerCase() === 'transparent') {
                    params.wmode = 'transparent';
                    params.bgcolor = params.bgcolor || "#222222"
                } else {
                    params.bgcolor = params.bgcolor || E
                }
                bh.embedurl = window.location.href;
                swfobject.embedSWF(O, S + 'sv-mobile-flash-swf', C, D, bg, false, bh, params, attributes);
                $(window).bind('resize', resizeFlashViewer);
                window.setTimeout(resizeFlashViewer, 100);
                return
            }
            svContainer.css({
                'position': 'relative'
            });
            svContainer.html(generateSVHtml());
            if (bf.displayMode === 'embed') {
                $('#' + B + ' .simpleviewer').css({
                    'position': 'relative'
                })
            }
            $('#' + S + 'sv-mobile').css({
                'background': formatColor(backgroundColor)
            });
            if (!Q) {
                $('#' + T.randomId + ', #nav-' + T.randomId).click(function (a) {
                    window.open('http://www.simpleviewer.net/simpleviewer', 'sv');
                    a.preventDefault();
                    a.stopPropagation()
                })
            }
            G = cvtObjectAttrLowerCase(G);
            if (!G) {
                G = {}
            }
            M = getQueryStrValue(L, 'baseURL');
            if (M) {
                G.baseurl = M
            }
            var P = getQueryStrValue(L, 'galleryURL');
            P = (G && G.galleryurl ? G.galleryurl : (P ? P : 'gallery.xml'));
            if (!isOnRoot(P)) {
                if (G.baseurl) {
                    P = (isEndedWithSlash(G.baseurl) ? G.baseurl : G.baseurl + '/') + P
                } else {
                    P = (svCoreURL !== '' && svCoreURL !== 'svcore/' ? L.substr(0, L.lastIndexOf('/') + 1) : '') + P
                }
            }
            M = getQueryStrValue(L, 'presetURL');
            if (M) {
                G.preseturl = M
            }
            M = getQueryStrValue(L, 'imagePath');
            if (M) {
                G.imagepath = M
            }
            M = getQueryStrValue(L, 'thumbPath');
            if (M) {
                G.thumbpath = M
            }
            getAddParamFromURL(L, G);
            $.ajax({
                type: 'GET',
                url: P,
                dataType: ($.browser.msie) ? 'text' : 'xml',
                success: function (y) {
                    var z;
                    if (typeof y === 'string') {
                        z = new ActiveXObject("Microsoft.XMLDOM");
                        z.async = false;
                        z.loadXML(y)
                    } else {
                        z = y
                    }
                    Y = parseXML(z, G.baseurl, G.imagepath, G.thumbpath);
                    Y = $.extend(Y, G);
                    if (!Q) {
                        Y.mobileshownav = true;
                        Y.mobileshowcaption = true;
                        Y.mobileshowthumbs = true;
                        delete Y.preseturl
                    }
                    if (Y.preseturl) {
                        getPresetUrlOptions(Y.preseturl, G, onFinishXmlLoad)
                    } else {
                        onFinishXmlLoad()
                    }
                    function onFinishXmlLoad() {
                        Y.mobileshownav = parseBool(Y.mobileshownav, true);
                        Y.mobileshowcaption = parseBool(Y.mobileshowcaption, true);
                        Y.showopenbutton = parseBool(Y.showopenbutton, true);
                        Y.showfullscreenbutton = parseBool(Y.showfullscreenbutton, true);
                        if (Y.useflickr) {
                            if (W > 13) {
                                W -= 13
                            }
                            if (Y.flickrusername) {
                                V.flickrApi.getUserId(function () {
                                    V.flickrApi.getPhotos(initCallback)
                                })
                            } else {
                                V.flickrApi.getPhotos(initCallback)
                            }
                        } else {
                            initCallback()
                        }
                    }
                    function showTopNavmenuBk() {
                        $('#' + S + 'sv-nav-topmenu-links').show();
                        if ($.browser.msie && $.browser.version >= 9) {
                            return
                        }
                        $('#' + S + 'sv-nav-topmenu-left, #' + S + 'sv-nav-topmenu-right').show()
                    }
                    function showTopmenuBk() {
                        $('#' + S + 'sv-topmenu-links').show();
                        if ($.browser.msie && $.browser.version >= 9) {
                            return
                        }
                        $('#' + S + 'sv-topmenu-left, #' + S + 'sv-topmenu-right').show()
                    }
                    function initCallback() {
                        var i, photoHtml;
                        if (!Y.images || Y.images.length === 0) {
                            errorMessage('No Images Specified in Gallery XML.');
                            return
                        }
                        if (separateNavPanel()) {
                            bf.panelMode = 'navigation';
                            $('#' + S + 'sv-photo-detail').hide();
                            $('#' + S + 'sv-photo-navigation').show();
                            if (Y.mobileshowthumbs) {
                                showTopmenuBk();
                                var f = $('#' + S + 'sv-go-nav-panel');
                                f.show();
                                $('#' + S + 'sv-topmenu-links').width(37);
                                f.click(function () {
                                    var b = $('#' + S + 'sv-photo-detail');
                                    b.fadeOut(250, function () {
                                        b.hide();
                                        var a = $('#' + S + 'sv-photo-navigation');
                                        a.show();
                                        a.fadeIn(250)
                                    });
                                    return false
                                })
                            } else {
                                $('#' + S + 'sv-go-nav-panel').hide()
                            }
                        }
                        setPanelsScale();
                        calculateMvSize();
                        if (bf.displayMode === 'embed' && Y.showfullscreenbutton && !isInIframe()) {
                            var g = '';
                            if (isOnRoot(Y.baseurl)) {
                                g = Y.baseurl
                            } else {
                                g = encodeURIComponent(svCoreURL !== '' && svCoreURL !== 'svcore/' ? window.location.href.substr(0, window.location.href.lastIndexOf('/') + 1) : '../');
                                if (Y.baseurl) {
                                    g += Y.baseurl
                                }
                                if (!isEndedWithSlash(g)) {
                                    g += '/'
                                }
                            }
                            if (Y.imagepath) {
                                if (!isOnRoot(Y.imagepath)) {
                                    Y.imagepath = g + Y.imagepath
                                }
                                if (!isEndedWithSlash(Y.imagepath)) {
                                    Y.imagepath += '/'
                                }
                            }
                            if (Y.thumbpath) {
                                if (!isOnRoot(Y.thumbpath)) {
                                    Y.thumbpath = g + Y.thumbpath
                                }
                                if (!isEndedWithSlash(Y.thumbpath)) {
                                    Y.thumbpath += '/'
                                }
                            }
                            var h = Y && Y.galleryurl ? Y.galleryurl : 'gallery.xml';
                            var k = Y.preseturl ? Y.preseturl : '';
                            if (!isOnRoot(h)) {
                                h = g + h
                            }
                            if (k && !isOnRoot(k)) {
                                k = g + k
                            }
                            if (k) {
                                k = '&presetURL=' + k
                            }
                            var l = getAddQueryParam4FS(Y);
                            var m = svCoreURL + 'full.html?bg=' + E.replace(/#/g, '') + '&galleryURL=' + h + k + (Y.baseurl ? '&baseURL=' + g : '') + (Y.imagepath ? '&imagePath=' + Y.imagepath : '') + (Y.thumbpath ? '&thumbPath=' + Y.thumbpath : '') + l;
                            $('#' + S + 'sv-go-fullscreen, #' + S + 'sv-nav-go-fullscreen').attr('href', m);
                            $('#' + S + 'sv-topmenu-links').width($('#' + S + 'sv-topmenu-links').width() + 37);
                            $('#' + S + 'sv-nav-topmenu-links').width($('#' + S + 'sv-nav-topmenu-links').width() + 37);
                            showTopmenuBk();
                            showTopNavmenuBk();
                            $('#' + S + 'sv-go-fullscreen, #' + S + 'sv-nav-go-fullscreen, #' + S + 'sv-nav-topmenu').show();
                            $('#' + S + 'sv-go-fullscreen, #' + S + 'sv-nav-go-fullscreen').click(function (a) {
                                SV.simpleviewer.saveCurrentPage();
                                return true
                            })
                        }
                        if (Y.showopenbutton) {
                            showTopmenuBk();
                            $('#' + S + 'sv-topmenu-links').width($('#' + S + 'sv-topmenu-links').width() + 37);
                            $('#' + S + 'sv-open-window').show()
                        }
                        if (typeof svMobile !== 'undefined' && svMobile) {
                            var n = $('#' + S + 'sv-go-fullscreen, #' + S + 'sv-nav-go-fullscreen');
                            if (document.referrer) {
                                n.attr('href', document.referrer)
                            }
                            n.click(function (a) {
                                SV.simpleviewer.saveCurrentPage();
                                if (document.referrer) {
                                    return true
                                }
                                history.back();
                                return false
                            });
                            if (!$.browser.msie || $.browser.version >= 8) {
                                $('#' + S + 'sv-topmenu-links').width($('#' + S + 'sv-topmenu-links').width() + 37);
                                $('#' + S + 'sv-nav-topmenu-links').width($('#' + S + 'sv-nav-topmenu-links').width() + 37)
                            }
                            showTopmenuBk();
                            showTopNavmenuBk();
                            $('#' + S + 'sv-go-fullscreen, #' + S + 'sv-nav-go-fullscreen, #' + S + 'sv-nav-topmenu').show()
                        }
                        if (isSwipable(Y)) {
                            initializeSwipe($)
                        }
                        $('#' + S + 'sv-nav-page-prev').click(function () {
                            var a = bc.navListIndex;
                            if (a <= 0) {
                                return false
                            }
                            bc.navListIndex--;
                            move2NavListPnl(a, bc.navListIndex);
                            return false
                        });
                        $('#' + S + 'sv-nav-page-next').click(function () {
                            var a = bc.navListIndex;
                            if (a >= bc.totalPage - 1) {
                                return false
                            }
                            bc.navListIndex++;
                            move2NavListPnl(a, bc.navListIndex);
                            return false
                        });
                        Y.firstimageindex++;
                        var o = (Q && Y.firstimageindex) ? parseInt(Y.firstimageindex) : 0;
                        if (o > U || o < 0) {
                            o = 0
                        }
                        if (o <= 0 && !Y.mobileshowthumbs) {
                            o = 1
                        }
                        var p = true;
                        var q = getCurrentImgIdxFromCookie();
                        var r;
                        if (q) {
                            bj = adjCurrentIndex(q.crntImgIdx);
                            bc.navListIndex = q.crntNavIdx;
                            r = q.thumbnailPageCount;
                            p = q.navPnlVisible;
                            bb.showOverlay = q.showOverlay;
                            if (q.visitedImages) {
                                var s = q.visitedImages.split(',');
                                var t, j;
                                for (j = 0; j < s.length; j++) {
                                    t = parseInt(s[j]);
                                    if (t < 0 || t >= Y.images.length) {
                                        continue
                                    }
                                    if (Y.images[t]) {
                                        Y.images[t].visited = true
                                    }
                                }
                            }
                        } else {
                            bj = 1;
                            bc.navListIndex = 0;
                            if (o > 0) {
                                bj = o;
                                p = false
                            }
                            r = bc.thumbCountPerPage
                        }
                        if (p === false) {
                            $('#' + S + 'sv-photo-navigation').hide();
                            $('#' + S + 'sv-photo-detail').show()
                        }
                        Y.images[bj - 1].visited = true;
                        if (r === bc.thumbCountPerPage) {
                            populatePhotoList(bc.navListIndex)
                        } else {
                            populatePhotoListByImageIndex(bj - 1)
                        }
                        populatePhotoFrame(bj - 1);
                        showOverlayControls(bb.showOverlay);
                        setNavControls(bc.navListIndex, bj - 1);
                        if (supportWebkitAnim()) {
                            initializePhotoFrameObjs()
                        }
                        if (isSwipable(Y)) {
                            var u = getSlideDuration();
                            var v = bk;
                            var w = bb.width;
                            var x = $('#' + S + 'sv-next-photo, #' + S + 'sv-prev-photo');
                            x.detectFlicks({
                                axis: 'x',
                                threshold: 5,
                                flickMove: function (d) {
                                    var a = bj - 1;
                                    var b = document.getElementById(S + 'sv-photo-' + (a - 1));
                                    var c = document.getElementById(S + 'sv-photo-' + a);
                                    var e = document.getElementById(S + 'sv-photo-' + (a + 1));
                                    onSwiping(d, b, c, e)
                                },
                                flickEvent: function (d) {
                                    var a = bj - 1;
                                    var b = document.getElementById(S + 'sv-photo-' + (a - 1));
                                    var c = document.getElementById(S + 'sv-photo-' + a);
                                    var e = document.getElementById(S + 'sv-photo-' + (a + 1));
                                    u.d = getDurationWithSwipeSpeed(d, bc.width);
                                    afterSwiping(a, u, d, b, c, e)
                                },
                                clickEvent: function () {
                                    if (!useClickableOverlay()) {
                                        return
                                    }
                                    toggleOverlay();
                                    showOverlayControlsAnim(bb.showOverlay)
                                }
                            });
                            setVerticalScroll(bf.displayMode, x)
                        } else if (!useClickableOverlay()) {
                            $('#' + S + 'sv-next-photo, #' + S + 'sv-prev-photo, #' + S + 'sv-topmenu').hover(function () {
                                bb.showOverlay = true;
                                setOverlay(bb.showOverlay)
                            }, function () {
                                bb.showOverlay = false;
                                setOverlay(bb.showOverlay)
                            })
                        }
                        $('#' + S + 'sv-open-window').attr('href', Y.images[bj - 1].imageFullURL).attr('target', Y.images[bj - 1].linkTarget);
                        if (!Y.mobileshowcaption) {
                            $('#' + S + 'sv-photos .sv-photo .sv-caption').hide()
                        }
                        if (useClickableOverlay()) {
                            $('#' + S + 'sv-prev-photo span').click(function (a) {
                                if (bj > 1) {
                                    V.prevImage()
                                }
                                a.preventDefault()
                            });
                            $('#' + S + 'sv-next-photo span').click(function (a) {
                                if (Y.images.length > bj) {
                                    V.nextImage()
                                }
                                a.preventDefault()
                            })
                        } else {
                            $('#' + S + 'sv-prev-photo').click(function (a) {
                                if (bj > 1) {
                                    V.prevImage()
                                }
                                a.preventDefault()
                            });
                            $('#' + S + 'sv-next-photo').click(function (a) {
                                if (Y.images.length > bj) {
                                    V.nextImage()
                                }
                                a.preventDefault()
                            })
                        }
                        $(window).bind('resize', resizeViewer);
                        window.setTimeout(hideUrlBar.AfterIni, 1000);
                        window.setInterval(checkForResize, 1000)
                    }
                },
                error: function (a, b, c) {
                    if (navigator.userAgent.indexOf('Chrome') > -1 && (window.location.href.indexOf('http://') === -1 && window.location.href.indexOf('https://') === -1)) {
                        errorMessage('SimpleViewer does not display locally in Google Chrome.')
                    } else {
                        errorMessage('Gallery XML Not Found.')
                    }
                }
            })
        },
        saveCrntPg: function () {
            setCurrentImgIdxCookie(bj)
        },
        flickrApi: (function () {
            var g;
            var h = 1;
            var j = 0;
            var k = 'http://api.flickr.com/services/rest/?method=';
            var l = '&api_key=b40dc56c795c0103c6170731e6271e04';
            var m = {
                FLICKR_SEARCH: 'flickr.photos.search',
                FLICKR_INTERESTINGNESS: 'flickr.interestingness.getList',
                FLICKR_SET: 'flickr.photosets.getPhotos',
                FLICKR_GROUP: 'flickr.groups.pools.getPhotos',
                FLICKR_FIND_USER: 'flickr.people.findByUsername',
                FLICKR_PHOTO_INFO: 'flickr.photos.getInfo',
                FLICKR_PEOPLE_FIND: 'flickr.people.findByUsername'
            };

            function getFlickrBaseUrl(a) {
                return k + m[a] + l
            }
            function getFlickrSearchUrl(a) {
                return getFlickrBaseUrl('FLICKR_SEARCH') + (Y.flickrtags ? '&tags=' + Y.flickrtags : '') + (Y.flickruserid ? '&user_id=' + Y.flickruserid : '') + '&page=' + h + '&per_page=' + a + '&sort=' + Y.flickrsort.toLowerCase() + '&tag_mode=' + Y.flickrgagmode.toLowerCase() + (Y.flickrextraparams ? '&' + Y.flickrextraparams.replace(/,/g, '&') : '') + '&media=photos&extras=url_sq,url_m,url_l,url_o,original_format&format=json&jsoncallback=?'
            }
            function getFlickrSetUrl(a) {
                return getFlickrBaseUrl('FLICKR_SET') + '&photoset_id=' + Y.flickrsetid + (Y.flickrtags ? '&tags=' + Y.flickrtags : '') + '&page=' + h + '&per_page=' + a + '&tag_mode=' + Y.flickrgagmode.toLowerCase() + '&media=photos&extras=url_sq,url_m,url_l,url_o,original_format&format=json&jsoncallback=?'
            }
            function getFlickrGroupUrl(a) {
                return getFlickrBaseUrl('FLICKR_GROUP') + '&group_id=' + Y.flickrgroupid + (Y.flickrtags ? '&tags=' + Y.flickrtags : '') + '&page=' + h + '&per_page=' + a + '&tag_mode=' + Y.flickrgagmode.toLowerCase() + '&extras=url_sq,url_m,url_l,url_o,original_format&format=json&jsoncallback=?'
            }
            function getFlickrInterestingnessUrl(a) {
                return getFlickrBaseUrl('FLICKR_INTERESTINGNESS') + '&page=' + h + '&per_page=' + a + '&extras=url_sq, url_m, url_l,url_o,original_format&format=json&jsoncallback=?'
            }
            function getFlickrPeopleFindUrl() {
                return getFlickrBaseUrl('FLICKR_PEOPLE_FIND') + '&username=' + Y.flickrusername + '&format=json&jsoncallback=?'
            }
            function getFlickrUrl(a) {
                if (!Q) {
                    if (Y.flickrtags || Y.flickrusername) {
                        return getFlickrSearchUrl(a)
                    } else {
                        return getFlickrInterestingnessUrl(a)
                    }
                }
                if (Y.flickrsetid) {
                    return getFlickrSetUrl(a)
                } else if (Y.flickrgroupid) {
                    return getFlickrGroupUrl(a)
                } else if (Y.flickruserid) {
                    return getFlickrSearchUrl(a)
                } else if (Y.flickrusername) {
                    return getFlickrSearchUrl()
                } else if (Y.flickrtags) {
                    return getFlickrSearchUrl()
                } else {
                    return getFlickrInterestingnessUrl(a)
                }
            }
            function getPhotoPageUrl(a, b) {
                return 'http://www.flickr.com/photos/' + a + '/' + b
            }
            function getThumbUrl(a, b, c, d) {
                return 'http://farm' + a + '.static.flickr.com/' + b + '/' + d + '_' + c + '_s.jpg'
            }
            function getMediumUrl(a, b, c, d) {
                return 'http://farm' + a + '.static.flickr.com/' + b + '/' + d + '_' + c + '.jpg'
            }
            function getLargeUrl(a, b, c, d) {
                return 'http://farm' + a + '.static.flickr.com/' + b + '/' + d + '_' + c + '_b.jpg'
            }
            function getOriginalUrl(a, b, c, d) {
                return 'http://farm' + a + '.static.flickr.com/' + b + '/' + d + '_' + c + '_o.jpg'
            }
            g = {
                getUserId: function (d) {
                    var e = getFlickrPeopleFindUrl();
                    $.ajax({
                        url: e,
                        dataType: 'json',
                        success: function (a) {
                            if (a.stat === 'ok') {
                                Y.flickruserid = a.user.id;
                                if (d) {
                                    d()
                                }
                            } else {
                                errorMessage('Cannot load from Flickr.')
                            }
                        },
                        error: function (a, b, c) {
                            errorMessage('Cannot load from Flickr.')
                        }
                    })
                },
                getPhotos: function (d) {
                    var e = (Q ? parseInt(be.flickrimagecount) : T.maxItemCount);
                    var f = getFlickrUrl(e);
                    $.ajax({
                        url: f,
                        dataType: 'json',
                        success: function (a) {
                            if (a.photos) {
                                U = Math.min(a.photos.total, e);
                                j = a.photos.pages
                            } else if (a.photoset) {
                                U = Math.min(a.photoset.total, e);
                                j = a.photoset.pages
                            }
                            if (a.stat === 'ok') {
                                if (Q || Y.flickrtags || Y.flickrusername) {
                                    g.parseFlickrResponse(a)
                                } else {
                                    Y.images = g.parseFlickrResponse4Reg(a)
                                }
                                if (d) {
                                    d()
                                }
                            } else {
                                errorMessage('Cannot load from Flickr.')
                            }
                        },
                        error: function (a, b, c) {
                            errorMessage('Cannot load from Flickr.')
                        }
                    })
                },
                nextPage: function () {
                    if (h < j) {
                        h += 1;
                        return true
                    }
                    return false
                },
                prevPage: function () {
                    if (h > 1) {
                        h -= 1
                    }
                },
                parseFlickrResponse4Reg: function (a) {
                    var b, i, items, item;
                    b = a.photos.photo;
                    items = [];
                    if (U > b.length) {
                        U = b.length
                    }
                    for (i = 0; i < b.length; i += 1) {
                        item = {
                            thumbURL: getThumbUrl(b[i].farm, b[i].server, b[i].secret, b[i].id),
                            imageFullURL: getPhotoPageUrl(b[i].owner, b[i].id),
                            linkTarget: '_blank',
                            caption: b[i].title || '',
                            description: '',
                            preloadedImage: null,
                            preloaded: false
                        };
                        if (b[i].url_l) {
                            item.imageURL = b[i].url_l
                        } else {
                            item.imageURL = b[i].url_m
                        }
                        items.push(item)
                    }
                    return items
                },
                parseFlickrResponse: function (a) {
                    var b, i, item;
                    var c = 0;
                    var d = "";
                    if (a.photos) {
                        b = a.photos.photo
                    } else if (a.photoset) {
                        b = a.photoset.photo;
                        d = a.photoset.owner
                    }
                    for (i = 0; i < b.length; i += 1) {
                        if (Y.images.length < U) {
                            item = {
                                thumbURL: getThumbUrl(b[i].farm, b[i].server, b[i].secret, b[i].id),
                                imageFullURL: getPhotoPageUrl(b[i].owner || d, b[i].id),
                                linkTarget: '_blank',
                                caption: b[i].title || '',
                                description: '',
                                preloadedImage: null,
                                preloaded: false
                            };
                            if (Y.flickrimagesize.toLowerCase() === 'original' && b[i].url_o) {
                                item.imageURL = b[i].url_o
                            } else if ((Y.flickrimagesize.toLowerCase() === 'large' || Y.flickrimagesize.toLowerCase() === 'original') && b[i].url_l) {
                                item.imageURL = b[i].url_l
                            } else {
                                item.imageURL = b[i].url_m
                            }
                            Y.images.push(item);
                            c += 1
                        }
                    }
                }
            };
            return g
        })(),
        refreshPhoto: function () {
            var a = adjCurrentIndex(bj) - 1;
            $('#' + S + 'sv-photo-' + bj + '.loading').addClass("loading");
            Y.images[a].preloadSet = false;
            Y.images[a].preloaded = false;
            delete Y.images[a].preloadedImage;
            Y.images[a].preloadedImage = null;
            preloadImages(a, 1);
            return false
        },
        nextImage: function (a) {
            if (bj + 1 > Y.images.length) {
                return
            }
            bj += 1;
            bj = adjCurrentIndex(bj);
            move2Photo(bj - 2, bj - 1)
        },
        prevImage: function (a) {
            if (bj <= 1) {
                return
            }
            bj -= 1;
            bj = adjCurrentIndex(bj);
            move2Photo(bj, bj - 1)
        },
        debug: function (a) {
            eval(a)
        }
    };
    return V
};

function initializeSwipe($) {
    $.fn.detectFlicks = function (d) {
        var f;
        var g = 'left2right',
            RightToLeft = 'right2left',
            UpToDown = 'up2down',
            DownToUp = 'down2up';
        var h = {
            direction: '',
            maxMove: 0,
            isFlick: false
        };
        var i = {
            threshold: 5,
            axis: 'x',
            flickEvent: function () {
                return true
            },
            flickMove: function () {
                return true
            }
        };
        d = $.extend(i, d);
        h.touchStart = function (e) {
            var a = $(e.target);
            this.isFlick = false;
            this.maxMove = 0;
            this.startX = event.targetTouches[0].clientX;
            this.startY = event.targetTouches[0].clientY;
            if (d.axis === 'y') {
                a.bind('touchmove', h.touchMoveY)
            } else {
                a.bind('touchmove', h.touchMoveX)
            }
            h.direction = '';
            a.bind('touchend', h.touchEnd);
            f = new Date()
        };
        h.touchMoveX = function (e) {
            event.preventDefault();
            this.movedX = event.targetTouches[0].clientX;
            var a = Math.abs(Math.abs(this.movedX) - Math.abs(this.startX));
            if (a > this.maxMove) {
                this.maxMove = a
            }
            if (a > d.threshold) {
                this.isFlick = true;
                if (this.movedX > this.startX) {
                    h.direction = g;
                    h.moveDistance = this.movedX - this.startX
                } else {
                    h.direction = RightToLeft;
                    h.moveDistance = this.startX - this.movedX
                }
                d.flickMove({
                    direction: h.direction,
                    distance: h.moveDistance
                })
            }
        };
        h.touchMoveY = function (e) {
            event.preventDefault();
            this.movedY = event.targetTouches[0].clientY;
            var a = Math.abs(Math.abs(this.movedY) - Math.abs(this.startY));
            var b = Math.abs(Math.abs(event.targetTouches[0].clientX) - Math.abs(this.startX));
            if (a > d.threshold && a > 1.6 * b) {
                this.isFlick = true;
                if (this.movedY > this.startY) {
                    h.direction = UpToDown;
                    h.moveDistance = a
                } else {
                    h.direction = DownToUp;
                    h.moveDistance = a
                }
                d.flickMove({
                    direction: h.direction,
                    distance: h.moveDistance
                })
            }
        };
        h.touchEnd = function (e) {
            var a = $(e.target);
            if (this.isFlick) {
                var b = new Date();
                var c = b.valueOf() - f.valueOf();
                d.flickEvent({
                    direction: h.direction,
                    distance: h.moveDistance,
                    timerValue: c
                })
            } else if (d.clickEvent && this.maxMove < d.threshold) {
                d.clickEvent()
            }
            a.unbind('touchmove touchend')
        };
        obj = $(this);
        obj.bind('touchstart', h.touchStart);
        return h
    }
}