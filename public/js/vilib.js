/**
 * @license almond 0.3.1 Copyright (c) 2011-2014, The Dojo Foundation All Rights Reserved.
 * Available via the MIT or new BSD license.
 * see: http://github.com/jrburke/almond for details
 */
/*!
 * jQuery JavaScript Library v1.11.3
 * http://jquery.com/
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 *
 * Copyright 2005, 2014 jQuery Foundation, Inc. and other contributors
 * Released under the MIT license
 * http://jquery.org/license
 *
 * Date: 2015-04-28T16:19Z
 */
/*!
 * Sizzle CSS Selector Engine v2.2.0-pre
 * http://sizzlejs.com/
 *
 * Copyright 2008, 2014 jQuery Foundation, Inc. and other contributors
 * Released under the MIT license
 * http://jquery.org/license
 *
 * Date: 2014-12-16
 */
/*!
 * JavaScript Cookie v2.0.4
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
/**
 * Owl Carousel v2.1.6
 * Copyright 2013-2016 David Deutsch
 * Licensed under MIT (https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE)
 */
//     Underscore.js 1.8.3
//     http://underscorejs.org
//     (c) 2009-2015 Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
//     Underscore may be freely distributed under the MIT license.
/*!
 * jQuery Raty FA - A Star Rating Plugin with Font Awesome
 *
 * Licensed under The MIT License
 *
 * @author  : Jacob Overgaard
 * @doc     : http://jacob87.github.io/raty-fa/
 * @version : 0.1.1
 *
 */
/*!
 * imagesLoaded PACKAGED v4.1.1
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */
/*!
 * Masonry PACKAGED v4.1.1
 * Cascading grid layout library
 * http://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */
/**
 * Bridget makes jQuery widgets
 * v2.0.1
 * MIT license
 */
! function() {
    var requirejs, require, define;
    ! function(e) {
        function t(e, t) {
            return v.call(e, t)
        }

        function n(e, t) {
            var n, i, o, r, a, s, l, c, u, d, p, h = t && t.split("/"),
                f = m.map,
                g = f && f["*"] || {};
            if (e && "." === e.charAt(0))
                if (t) {
                    for (e = e.split("/"), a = e.length - 1, m.nodeIdCompat && b.test(e[a]) && (e[a] = e[a].replace(b, "")), e = h.slice(0, h.length - 1).concat(e), u = 0; u < e.length; u += 1)
                        if (p = e[u], "." === p) e.splice(u, 1), u -= 1;
                        else if (".." === p) {
                        if (1 === u && (".." === e[2] || ".." === e[0])) break;
                        u > 0 && (e.splice(u - 1, 2), u -= 2)
                    }
                    e = e.join("/")
                } else 0 === e.indexOf("./") && (e = e.substring(2));
            if ((h || g) && f) {
                for (n = e.split("/"), u = n.length; u > 0; u -= 1) {
                    if (i = n.slice(0, u).join("/"), h)
                        for (d = h.length; d > 0; d -= 1)
                            if (o = f[h.slice(0, d).join("/")], o && (o = o[i])) {
                                r = o, s = u;
                                break
                            }
                    if (r) break;
                    !l && g && g[i] && (l = g[i], c = u)
                }!r && l && (r = l, s = c), r && (n.splice(0, s, r), e = n.join("/"))
            }
            return e
        }

        function i(t, n) {
            return function() {
                var i = y.call(arguments, 0);
                return "string" != typeof i[0] && 1 === i.length && i.push(null), u.apply(e, i.concat([t, n]))
            }
        }

        function o(e) {
            return function(t) {
                return n(t, e)
            }
        }

        function r(e) {
            return function(t) {
                h[e] = t
            }
        }

        function a(n) {
            if (t(f, n)) {
                var i = f[n];
                delete f[n], g[n] = !0, c.apply(e, i)
            }
            if (!t(h, n) && !t(g, n)) throw new Error("No " + n);
            return h[n]
        }

        function s(e) {
            var t, n = e ? e.indexOf("!") : -1;
            return n > -1 && (t = e.substring(0, n), e = e.substring(n + 1, e.length)), [t, e]
        }

        function l(e) {
            return function() {
                return m && m.config && m.config[e] || {}
            }
        }
        var c, u, d, p, h = {},
            f = {},
            m = {},
            g = {},
            v = Object.prototype.hasOwnProperty,
            y = [].slice,
            b = /\.js$/;
        d = function(e, t) {
            var i, r = s(e),
                l = r[0];
            return e = r[1], l && (l = n(l, t), i = a(l)), l ? e = i && i.normalize ? i.normalize(e, o(t)) : n(e, t) : (e = n(e, t), r = s(e), l = r[0], e = r[1], l && (i = a(l))), {
                f: l ? l + "!" + e : e,
                n: e,
                pr: l,
                p: i
            }
        }, p = {
            require: function(e) {
                return i(e)
            },
            exports: function(e) {
                var t = h[e];
                return "undefined" != typeof t ? t : h[e] = {}
            },
            module: function(e) {
                return {
                    id: e,
                    uri: "",
                    exports: h[e],
                    config: l(e)
                }
            }
        }, c = function(n, o, s, l) {
            var c, u, m, v, y, b, x = [],
                w = typeof s;
            if (l = l || n, "undefined" === w || "function" === w) {
                for (o = !o.length && s.length ? ["require", "exports", "module"] : o, y = 0; y < o.length; y += 1)
                    if (v = d(o[y], l), u = v.f, "require" === u) x[y] = p.require(n);
                    else if ("exports" === u) x[y] = p.exports(n), b = !0;
                else if ("module" === u) c = x[y] = p.module(n);
                else if (t(h, u) || t(f, u) || t(g, u)) x[y] = a(u);
                else {
                    if (!v.p) throw new Error(n + " missing " + u);
                    v.p.load(v.n, i(l, !0), r(u), {}), x[y] = h[u]
                }
                m = s ? s.apply(h[n], x) : void 0, n && (c && c.exports !== e && c.exports !== h[n] ? h[n] = c.exports : m === e && b || (h[n] = m))
            } else n && (h[n] = s)
        }, requirejs = require = u = function(t, n, i, o, r) {
            if ("string" == typeof t) return p[t] ? p[t](n) : a(d(t, n).f);
            if (!t.splice) {
                if (m = t, m.deps && u(m.deps, m.callback), !n) return;
                n.splice ? (t = n, n = i, i = null) : t = e
            }
            return n = n || function() {}, "function" == typeof i && (i = o, o = r), o ? c(e, t, n, i) : setTimeout(function() {
                c(e, t, n, i)
            }, 4), u
        }, u.config = function(e) {
            return u(e)
        }, requirejs._defined = h, define = function(e, n, i) {
            if ("string" != typeof e) throw new Error("See almond README: incorrect module build, no module name");
            n.splice || (i = n, n = []), t(h, e) || t(f, e) || (f[e] = [e, n, i])
        }, define.amd = {
            jQuery: !0
        }
    }(), define("almond", function() {}),
        function(e, t) {
            "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
                if (!e.document) throw new Error("jQuery requires a window with a document");
                return t(e)
            } : t(e)
        }("undefined" != typeof window ? window : this, function(e, t) {
            function n(e) {
                var t = "length" in e && e.length,
                    n = ot.type(e);
                return "function" === n || ot.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e
            }

            function i(e, t, n) {
                if (ot.isFunction(t)) return ot.grep(e, function(e, i) {
                    return !!t.call(e, i, e) !== n
                });
                if (t.nodeType) return ot.grep(e, function(e) {
                    return e === t !== n
                });
                if ("string" == typeof t) {
                    if (pt.test(t)) return ot.filter(t, e, n);
                    t = ot.filter(t, e)
                }
                return ot.grep(e, function(e) {
                    return ot.inArray(e, t) >= 0 !== n
                })
            }

            function o(e, t) {
                do e = e[t]; while (e && 1 !== e.nodeType);
                return e
            }

            function r(e) {
                var t = xt[e] = {};
                return ot.each(e.match(bt) || [], function(e, n) {
                    t[n] = !0
                }), t
            }

            function a() {
                ft.addEventListener ? (ft.removeEventListener("DOMContentLoaded", s, !1), e.removeEventListener("load", s, !1)) : (ft.detachEvent("onreadystatechange", s), e.detachEvent("onload", s))
            }

            function s() {
                (ft.addEventListener || "load" === event.type || "complete" === ft.readyState) && (a(), ot.ready())
            }

            function l(e, t, n) {
                if (void 0 === n && 1 === e.nodeType) {
                    var i = "data-" + t.replace(Tt, "-$1").toLowerCase();
                    if (n = e.getAttribute(i), "string" == typeof n) {
                        try {
                            n = "true" === n ? !0 : "false" === n ? !1 : "null" === n ? null : +n + "" === n ? +n : Ct.test(n) ? ot.parseJSON(n) : n
                        } catch (o) {}
                        ot.data(e, t, n)
                    } else n = void 0
                }
                return n
            }

            function c(e) {
                var t;
                for (t in e)
                    if (("data" !== t || !ot.isEmptyObject(e[t])) && "toJSON" !== t) return !1;
                return !0
            }

            function u(e, t, n, i) {
                if (ot.acceptData(e)) {
                    var o, r, a = ot.expando,
                        s = e.nodeType,
                        l = s ? ot.cache : e,
                        c = s ? e[a] : e[a] && a;
                    if (c && l[c] && (i || l[c].data) || void 0 !== n || "string" != typeof t) return c || (c = s ? e[a] = V.pop() || ot.guid++ : a), l[c] || (l[c] = s ? {} : {
                        toJSON: ot.noop
                    }), ("object" == typeof t || "function" == typeof t) && (i ? l[c] = ot.extend(l[c], t) : l[c].data = ot.extend(l[c].data, t)), r = l[c], i || (r.data || (r.data = {}), r = r.data), void 0 !== n && (r[ot.camelCase(t)] = n), "string" == typeof t ? (o = r[t], null == o && (o = r[ot.camelCase(t)])) : o = r, o
                }
            }

            function d(e, t, n) {
                if (ot.acceptData(e)) {
                    var i, o, r = e.nodeType,
                        a = r ? ot.cache : e,
                        s = r ? e[ot.expando] : ot.expando;
                    if (a[s]) {
                        if (t && (i = n ? a[s] : a[s].data)) {
                            ot.isArray(t) ? t = t.concat(ot.map(t, ot.camelCase)) : t in i ? t = [t] : (t = ot.camelCase(t), t = t in i ? [t] : t.split(" ")), o = t.length;
                            for (; o--;) delete i[t[o]];
                            if (n ? !c(i) : !ot.isEmptyObject(i)) return
                        }(n || (delete a[s].data, c(a[s]))) && (r ? ot.cleanData([e], !0) : nt.deleteExpando || a != a.window ? delete a[s] : a[s] = null)
                    }
                }
            }

            function p() {
                return !0
            }

            function h() {
                return !1
            }

            function f() {
                try {
                    return ft.activeElement
                } catch (e) {}
            }

            function m(e) {
                var t = Lt.split("|"),
                    n = e.createDocumentFragment();
                if (n.createElement)
                    for (; t.length;) n.createElement(t.pop());
                return n
            }

            function g(e, t) {
                var n, i, o = 0,
                    r = typeof e.getElementsByTagName !== _t ? e.getElementsByTagName(t || "*") : typeof e.querySelectorAll !== _t ? e.querySelectorAll(t || "*") : void 0;
                if (!r)
                    for (r = [], n = e.childNodes || e; null != (i = n[o]); o++) !t || ot.nodeName(i, t) ? r.push(i) : ot.merge(r, g(i, t));
                return void 0 === t || t && ot.nodeName(e, t) ? ot.merge([e], r) : r
            }

            function v(e) {
                Ot.test(e.type) && (e.defaultChecked = e.checked)
            }

            function y(e, t) {
                return ot.nodeName(e, "table") && ot.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
            }

            function b(e) {
                return e.type = (null !== ot.find.attr(e, "type")) + "/" + e.type, e
            }

            function x(e) {
                var t = Jt.exec(e.type);
                return t ? e.type = t[1] : e.removeAttribute("type"), e
            }

            function w(e, t) {
                for (var n, i = 0; null != (n = e[i]); i++) ot._data(n, "globalEval", !t || ot._data(t[i], "globalEval"))
            }

            function k(e, t) {
                if (1 === t.nodeType && ot.hasData(e)) {
                    var n, i, o, r = ot._data(e),
                        a = ot._data(t, r),
                        s = r.events;
                    if (s) {
                        delete a.handle, a.events = {};
                        for (n in s)
                            for (i = 0, o = s[n].length; o > i; i++) ot.event.add(t, n, s[n][i])
                    }
                    a.data && (a.data = ot.extend({}, a.data))
                }
            }

            function _(e, t) {
                var n, i, o;
                if (1 === t.nodeType) {
                    if (n = t.nodeName.toLowerCase(), !nt.noCloneEvent && t[ot.expando]) {
                        o = ot._data(t);
                        for (i in o.events) ot.removeEvent(t, i, o.handle);
                        t.removeAttribute(ot.expando)
                    }
                    "script" === n && t.text !== e.text ? (b(t).text = e.text, x(t)) : "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), nt.html5Clone && e.innerHTML && !ot.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && Ot.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.defaultSelected = t.selected = e.defaultSelected : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
                }
            }

            function C(t, n) {
                var i, o = ot(n.createElement(t)).appendTo(n.body),
                    r = e.getDefaultComputedStyle && (i = e.getDefaultComputedStyle(o[0])) ? i.display : ot.css(o[0], "display");
                return o.detach(), r
            }

            function T(e) {
                var t = ft,
                    n = Zt[e];
                return n || (n = C(e, t), "none" !== n && n || (Kt = (Kt || ot("<iframe frameborder='0' width='0' height='0'/>")).appendTo(t.documentElement), t = (Kt[0].contentWindow || Kt[0].contentDocument).document, t.write(), t.close(), n = C(e, t), Kt.detach()), Zt[e] = n), n
            }

            function S(e, t) {
                return {
                    get: function() {
                        var n = e();
                        if (null != n) return n ? void delete this.get : (this.get = t).apply(this, arguments)
                    }
                }
            }

            function j(e, t) {
                if (t in e) return t;
                for (var n = t.charAt(0).toUpperCase() + t.slice(1), i = t, o = hn.length; o--;)
                    if (t = hn[o] + n, t in e) return t;
                return i
            }

            function E(e, t) {
                for (var n, i, o, r = [], a = 0, s = e.length; s > a; a++) i = e[a], i.style && (r[a] = ot._data(i, "olddisplay"), n = i.style.display, t ? (r[a] || "none" !== n || (i.style.display = ""), "" === i.style.display && Et(i) && (r[a] = ot._data(i, "olddisplay", T(i.nodeName)))) : (o = Et(i), (n && "none" !== n || !o) && ot._data(i, "olddisplay", o ? n : ot.css(i, "display"))));
                for (a = 0; s > a; a++) i = e[a], i.style && (t && "none" !== i.style.display && "" !== i.style.display || (i.style.display = t ? r[a] || "" : "none"));
                return e
            }

            function $(e, t, n) {
                var i = cn.exec(t);
                return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : t
            }

            function O(e, t, n, i, o) {
                for (var r = n === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0, a = 0; 4 > r; r += 2) "margin" === n && (a += ot.css(e, n + jt[r], !0, o)), i ? ("content" === n && (a -= ot.css(e, "padding" + jt[r], !0, o)), "margin" !== n && (a -= ot.css(e, "border" + jt[r] + "Width", !0, o))) : (a += ot.css(e, "padding" + jt[r], !0, o), "padding" !== n && (a += ot.css(e, "border" + jt[r] + "Width", !0, o)));
                return a
            }

            function D(e, t, n) {
                var i = !0,
                    o = "width" === t ? e.offsetWidth : e.offsetHeight,
                    r = en(e),
                    a = nt.boxSizing && "border-box" === ot.css(e, "boxSizing", !1, r);
                if (0 >= o || null == o) {
                    if (o = tn(e, t, r), (0 > o || null == o) && (o = e.style[t]), on.test(o)) return o;
                    i = a && (nt.boxSizingReliable() || o === e.style[t]), o = parseFloat(o) || 0
                }
                return o + O(e, t, n || (a ? "border" : "content"), i, r) + "px"
            }

            function N(e, t, n, i, o) {
                return new N.prototype.init(e, t, n, i, o)
            }

            function I() {
                return setTimeout(function() {
                    fn = void 0
                }), fn = ot.now()
            }

            function q(e, t) {
                var n, i = {
                        height: e
                    },
                    o = 0;
                for (t = t ? 1 : 0; 4 > o; o += 2 - t) n = jt[o], i["margin" + n] = i["padding" + n] = e;
                return t && (i.opacity = i.width = e), i
            }

            function A(e, t, n) {
                for (var i, o = (xn[t] || []).concat(xn["*"]), r = 0, a = o.length; a > r; r++)
                    if (i = o[r].call(n, t, e)) return i
            }

            function L(e, t, n) {
                var i, o, r, a, s, l, c, u, d = this,
                    p = {},
                    h = e.style,
                    f = e.nodeType && Et(e),
                    m = ot._data(e, "fxshow");
                n.queue || (s = ot._queueHooks(e, "fx"), null == s.unqueued && (s.unqueued = 0, l = s.empty.fire, s.empty.fire = function() {
                    s.unqueued || l()
                }), s.unqueued++, d.always(function() {
                    d.always(function() {
                        s.unqueued--, ot.queue(e, "fx").length || s.empty.fire()
                    })
                })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [h.overflow, h.overflowX, h.overflowY], c = ot.css(e, "display"), u = "none" === c ? ot._data(e, "olddisplay") || T(e.nodeName) : c, "inline" === u && "none" === ot.css(e, "float") && (nt.inlineBlockNeedsLayout && "inline" !== T(e.nodeName) ? h.zoom = 1 : h.display = "inline-block")), n.overflow && (h.overflow = "hidden", nt.shrinkWrapBlocks() || d.always(function() {
                    h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
                }));
                for (i in t)
                    if (o = t[i], gn.exec(o)) {
                        if (delete t[i], r = r || "toggle" === o, o === (f ? "hide" : "show")) {
                            if ("show" !== o || !m || void 0 === m[i]) continue;
                            f = !0
                        }
                        p[i] = m && m[i] || ot.style(e, i)
                    } else c = void 0;
                if (ot.isEmptyObject(p)) "inline" === ("none" === c ? T(e.nodeName) : c) && (h.display = c);
                else {
                    m ? "hidden" in m && (f = m.hidden) : m = ot._data(e, "fxshow", {}), r && (m.hidden = !f), f ? ot(e).show() : d.done(function() {
                        ot(e).hide()
                    }), d.done(function() {
                        var t;
                        ot._removeData(e, "fxshow");
                        for (t in p) ot.style(e, t, p[t])
                    });
                    for (i in p) a = A(f ? m[i] : 0, i, d), i in m || (m[i] = a.start, f && (a.end = a.start, a.start = "width" === i || "height" === i ? 1 : 0))
                }
            }

            function H(e, t) {
                var n, i, o, r, a;
                for (n in e)
                    if (i = ot.camelCase(n), o = t[i], r = e[n], ot.isArray(r) && (o = r[1], r = e[n] = r[0]), n !== i && (e[i] = r, delete e[n]), a = ot.cssHooks[i], a && "expand" in a) {
                        r = a.expand(r), delete e[i];
                        for (n in r) n in e || (e[n] = r[n], t[n] = o)
                    } else t[i] = o
            }

            function z(e, t, n) {
                var i, o, r = 0,
                    a = bn.length,
                    s = ot.Deferred().always(function() {
                        delete l.elem
                    }),
                    l = function() {
                        if (o) return !1;
                        for (var t = fn || I(), n = Math.max(0, c.startTime + c.duration - t), i = n / c.duration || 0, r = 1 - i, a = 0, l = c.tweens.length; l > a; a++) c.tweens[a].run(r);
                        return s.notifyWith(e, [c, r, n]), 1 > r && l ? n : (s.resolveWith(e, [c]), !1)
                    },
                    c = s.promise({
                        elem: e,
                        props: ot.extend({}, t),
                        opts: ot.extend(!0, {
                            specialEasing: {}
                        }, n),
                        originalProperties: t,
                        originalOptions: n,
                        startTime: fn || I(),
                        duration: n.duration,
                        tweens: [],
                        createTween: function(t, n) {
                            var i = ot.Tween(e, c.opts, t, n, c.opts.specialEasing[t] || c.opts.easing);
                            return c.tweens.push(i), i
                        },
                        stop: function(t) {
                            var n = 0,
                                i = t ? c.tweens.length : 0;
                            if (o) return this;
                            for (o = !0; i > n; n++) c.tweens[n].run(1);
                            return t ? s.resolveWith(e, [c, t]) : s.rejectWith(e, [c, t]), this
                        }
                    }),
                    u = c.props;
                for (H(u, c.opts.specialEasing); a > r; r++)
                    if (i = bn[r].call(c, e, u, c.opts)) return i;
                return ot.map(u, A, c), ot.isFunction(c.opts.start) && c.opts.start.call(e, c), ot.fx.timer(ot.extend(l, {
                    elem: e,
                    anim: c,
                    queue: c.opts.queue
                })), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always)
            }

            function B(e) {
                return function(t, n) {
                    "string" != typeof t && (n = t, t = "*");
                    var i, o = 0,
                        r = t.toLowerCase().match(bt) || [];
                    if (ot.isFunction(n))
                        for (; i = r[o++];) "+" === i.charAt(0) ? (i = i.slice(1) || "*", (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n)
                }
            }

            function P(e, t, n, i) {
                function o(s) {
                    var l;
                    return r[s] = !0, ot.each(e[s] || [], function(e, s) {
                        var c = s(t, n, i);
                        return "string" != typeof c || a || r[c] ? a ? !(l = c) : void 0 : (t.dataTypes.unshift(c), o(c), !1)
                    }), l
                }
                var r = {},
                    a = e === Wn;
                return o(t.dataTypes[0]) || !r["*"] && o("*")
            }

            function R(e, t) {
                var n, i, o = ot.ajaxSettings.flatOptions || {};
                for (i in t) void 0 !== t[i] && ((o[i] ? e : n || (n = {}))[i] = t[i]);
                return n && ot.extend(!0, e, n), e
            }

            function M(e, t, n) {
                for (var i, o, r, a, s = e.contents, l = e.dataTypes;
                    "*" === l[0];) l.shift(), void 0 === o && (o = e.mimeType || t.getResponseHeader("Content-Type"));
                if (o)
                    for (a in s)
                        if (s[a] && s[a].test(o)) {
                            l.unshift(a);
                            break
                        }
                if (l[0] in n) r = l[0];
                else {
                    for (a in n) {
                        if (!l[0] || e.converters[a + " " + l[0]]) {
                            r = a;
                            break
                        }
                        i || (i = a)
                    }
                    r = r || i
                }
                return r ? (r !== l[0] && l.unshift(r), n[r]) : void 0
            }

            function F(e, t, n, i) {
                var o, r, a, s, l, c = {},
                    u = e.dataTypes.slice();
                if (u[1])
                    for (a in e.converters) c[a.toLowerCase()] = e.converters[a];
                for (r = u.shift(); r;)
                    if (e.responseFields[r] && (n[e.responseFields[r]] = t), !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = r, r = u.shift())
                        if ("*" === r) r = l;
                        else if ("*" !== l && l !== r) {
                    if (a = c[l + " " + r] || c["* " + r], !a)
                        for (o in c)
                            if (s = o.split(" "), s[1] === r && (a = c[l + " " + s[0]] || c["* " + s[0]])) {
                                a === !0 ? a = c[o] : c[o] !== !0 && (r = s[0], u.unshift(s[1]));
                                break
                            }
                    if (a !== !0)
                        if (a && e["throws"]) t = a(t);
                        else try {
                            t = a(t)
                        } catch (d) {
                            return {
                                state: "parsererror",
                                error: a ? d : "No conversion from " + l + " to " + r
                            }
                        }
                }
                return {
                    state: "success",
                    data: t
                }
            }

            function W(e, t, n, i) {
                var o;
                if (ot.isArray(t)) ot.each(t, function(t, o) {
                    n || Vn.test(e) ? i(e, o) : W(e + "[" + ("object" == typeof o ? t : "") + "]", o, n, i)
                });
                else if (n || "object" !== ot.type(t)) i(e, t);
                else
                    for (o in t) W(e + "[" + o + "]", t[o], n, i)
            }

            function U() {
                try {
                    return new e.XMLHttpRequest
                } catch (t) {}
            }

            function X() {
                try {
                    return new e.ActiveXObject("Microsoft.XMLHTTP")
                } catch (t) {}
            }

            function J(e) {
                return ot.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
            }
            var V = [],
                Q = V.slice,
                G = V.concat,
                Y = V.push,
                K = V.indexOf,
                Z = {},
                et = Z.toString,
                tt = Z.hasOwnProperty,
                nt = {},
                it = "1.11.3",
                ot = function(e, t) {
                    return new ot.fn.init(e, t)
                },
                rt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
                at = /^-ms-/,
                st = /-([\da-z])/gi,
                lt = function(e, t) {
                    return t.toUpperCase()
                };
            ot.fn = ot.prototype = {
                jquery: it,
                constructor: ot,
                selector: "",
                length: 0,
                toArray: function() {
                    return Q.call(this)
                },
                get: function(e) {
                    return null != e ? 0 > e ? this[e + this.length] : this[e] : Q.call(this)
                },
                pushStack: function(e) {
                    var t = ot.merge(this.constructor(), e);
                    return t.prevObject = this, t.context = this.context, t
                },
                each: function(e, t) {
                    return ot.each(this, e, t)
                },
                map: function(e) {
                    return this.pushStack(ot.map(this, function(t, n) {
                        return e.call(t, n, t)
                    }))
                },
                slice: function() {
                    return this.pushStack(Q.apply(this, arguments))
                },
                first: function() {
                    return this.eq(0)
                },
                last: function() {
                    return this.eq(-1)
                },
                eq: function(e) {
                    var t = this.length,
                        n = +e + (0 > e ? t : 0);
                    return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
                },
                end: function() {
                    return this.prevObject || this.constructor(null)
                },
                push: Y,
                sort: V.sort,
                splice: V.splice
            }, ot.extend = ot.fn.extend = function() {
                var e, t, n, i, o, r, a = arguments[0] || {},
                    s = 1,
                    l = arguments.length,
                    c = !1;
                for ("boolean" == typeof a && (c = a, a = arguments[s] || {}, s++), "object" == typeof a || ot.isFunction(a) || (a = {}), s === l && (a = this, s--); l > s; s++)
                    if (null != (o = arguments[s]))
                        for (i in o) e = a[i], n = o[i], a !== n && (c && n && (ot.isPlainObject(n) || (t = ot.isArray(n))) ? (t ? (t = !1, r = e && ot.isArray(e) ? e : []) : r = e && ot.isPlainObject(e) ? e : {}, a[i] = ot.extend(c, r, n)) : void 0 !== n && (a[i] = n));
                return a
            }, ot.extend({
                expando: "jQuery" + (it + Math.random()).replace(/\D/g, ""),
                isReady: !0,
                error: function(e) {
                    throw new Error(e)
                },
                noop: function() {},
                isFunction: function(e) {
                    return "function" === ot.type(e)
                },
                isArray: Array.isArray || function(e) {
                    return "array" === ot.type(e)
                },
                isWindow: function(e) {
                    return null != e && e == e.window
                },
                isNumeric: function(e) {
                    return !ot.isArray(e) && e - parseFloat(e) + 1 >= 0
                },
                isEmptyObject: function(e) {
                    var t;
                    for (t in e) return !1;
                    return !0
                },
                isPlainObject: function(e) {
                    var t;
                    if (!e || "object" !== ot.type(e) || e.nodeType || ot.isWindow(e)) return !1;
                    try {
                        if (e.constructor && !tt.call(e, "constructor") && !tt.call(e.constructor.prototype, "isPrototypeOf")) return !1
                    } catch (n) {
                        return !1
                    }
                    if (nt.ownLast)
                        for (t in e) return tt.call(e, t);
                    for (t in e);
                    return void 0 === t || tt.call(e, t)
                },
                type: function(e) {
                    return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? Z[et.call(e)] || "object" : typeof e
                },
                globalEval: function(t) {
                    t && ot.trim(t) && (e.execScript || function(t) {
                        e.eval.call(e, t)
                    })(t)
                },
                camelCase: function(e) {
                    return e.replace(at, "ms-").replace(st, lt)
                },
                nodeName: function(e, t) {
                    return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
                },
                each: function(e, t, i) {
                    var o, r = 0,
                        a = e.length,
                        s = n(e);
                    if (i) {
                        if (s)
                            for (; a > r && (o = t.apply(e[r], i), o !== !1); r++);
                        else
                            for (r in e)
                                if (o = t.apply(e[r], i), o === !1) break
                    } else if (s)
                        for (; a > r && (o = t.call(e[r], r, e[r]), o !== !1); r++);
                    else
                        for (r in e)
                            if (o = t.call(e[r], r, e[r]), o === !1) break; return e
                },
                trim: function(e) {
                    return null == e ? "" : (e + "").replace(rt, "")
                },
                makeArray: function(e, t) {
                    var i = t || [];
                    return null != e && (n(Object(e)) ? ot.merge(i, "string" == typeof e ? [e] : e) : Y.call(i, e)), i
                },
                inArray: function(e, t, n) {
                    var i;
                    if (t) {
                        if (K) return K.call(t, e, n);
                        for (i = t.length, n = n ? 0 > n ? Math.max(0, i + n) : n : 0; i > n; n++)
                            if (n in t && t[n] === e) return n
                    }
                    return -1
                },
                merge: function(e, t) {
                    for (var n = +t.length, i = 0, o = e.length; n > i;) e[o++] = t[i++];
                    if (n !== n)
                        for (; void 0 !== t[i];) e[o++] = t[i++];
                    return e.length = o, e
                },
                grep: function(e, t, n) {
                    for (var i, o = [], r = 0, a = e.length, s = !n; a > r; r++) i = !t(e[r], r), i !== s && o.push(e[r]);
                    return o
                },
                map: function(e, t, i) {
                    var o, r = 0,
                        a = e.length,
                        s = n(e),
                        l = [];
                    if (s)
                        for (; a > r; r++) o = t(e[r], r, i), null != o && l.push(o);
                    else
                        for (r in e) o = t(e[r], r, i), null != o && l.push(o);
                    return G.apply([], l)
                },
                guid: 1,
                proxy: function(e, t) {
                    var n, i, o;
                    return "string" == typeof t && (o = e[t], t = e, e = o), ot.isFunction(e) ? (n = Q.call(arguments, 2), i = function() {
                        return e.apply(t || this, n.concat(Q.call(arguments)))
                    }, i.guid = e.guid = e.guid || ot.guid++, i) : void 0
                },
                now: function() {
                    return +new Date
                },
                support: nt
            }), ot.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
                Z["[object " + t + "]"] = t.toLowerCase()
            });
            var ct = function(e) {
                function t(e, t, n, i) {
                    var o, r, a, s, l, c, d, h, f, m;
                    if ((t ? t.ownerDocument || t : P) !== N && D(t), t = t || N, n = n || [], s = t.nodeType, "string" != typeof e || !e || 1 !== s && 9 !== s && 11 !== s) return n;
                    if (!i && q) {
                        if (11 !== s && (o = yt.exec(e)))
                            if (a = o[1]) {
                                if (9 === s) {
                                    if (r = t.getElementById(a), !r || !r.parentNode) return n;
                                    if (r.id === a) return n.push(r), n
                                } else if (t.ownerDocument && (r = t.ownerDocument.getElementById(a)) && z(t, r) && r.id === a) return n.push(r), n
                            } else {
                                if (o[2]) return K.apply(n, t.getElementsByTagName(e)), n;
                                if ((a = o[3]) && w.getElementsByClassName) return K.apply(n, t.getElementsByClassName(a)), n
                            }
                        if (w.qsa && (!A || !A.test(e))) {
                            if (h = d = B, f = t, m = 1 !== s && e, 1 === s && "object" !== t.nodeName.toLowerCase()) {
                                for (c = T(e), (d = t.getAttribute("id")) ? h = d.replace(xt, "\\$&") : t.setAttribute("id", h), h = "[id='" + h + "'] ", l = c.length; l--;) c[l] = h + p(c[l]);
                                f = bt.test(e) && u(t.parentNode) || t, m = c.join(",")
                            }
                            if (m) try {
                                return K.apply(n, f.querySelectorAll(m)), n
                            } catch (g) {} finally {
                                d || t.removeAttribute("id")
                            }
                        }
                    }
                    return j(e.replace(lt, "$1"), t, n, i)
                }

                function n() {
                    function e(n, i) {
                        return t.push(n + " ") > k.cacheLength && delete e[t.shift()], e[n + " "] = i
                    }
                    var t = [];
                    return e
                }

                function i(e) {
                    return e[B] = !0, e
                }

                function o(e) {
                    var t = N.createElement("div");
                    try {
                        return !!e(t)
                    } catch (n) {
                        return !1
                    } finally {
                        t.parentNode && t.parentNode.removeChild(t), t = null
                    }
                }

                function r(e, t) {
                    for (var n = e.split("|"), i = e.length; i--;) k.attrHandle[n[i]] = t
                }

                function a(e, t) {
                    var n = t && e,
                        i = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || J) - (~e.sourceIndex || J);
                    if (i) return i;
                    if (n)
                        for (; n = n.nextSibling;)
                            if (n === t) return -1;
                    return e ? 1 : -1
                }

                function s(e) {
                    return function(t) {
                        var n = t.nodeName.toLowerCase();
                        return "input" === n && t.type === e
                    }
                }

                function l(e) {
                    return function(t) {
                        var n = t.nodeName.toLowerCase();
                        return ("input" === n || "button" === n) && t.type === e
                    }
                }

                function c(e) {
                    return i(function(t) {
                        return t = +t, i(function(n, i) {
                            for (var o, r = e([], n.length, t), a = r.length; a--;) n[o = r[a]] && (n[o] = !(i[o] = n[o]))
                        })
                    })
                }

                function u(e) {
                    return e && "undefined" != typeof e.getElementsByTagName && e
                }

                function d() {}

                function p(e) {
                    for (var t = 0, n = e.length, i = ""; n > t; t++) i += e[t].value;
                    return i
                }

                function h(e, t, n) {
                    var i = t.dir,
                        o = n && "parentNode" === i,
                        r = M++;
                    return t.first ? function(t, n, r) {
                        for (; t = t[i];)
                            if (1 === t.nodeType || o) return e(t, n, r)
                    } : function(t, n, a) {
                        var s, l, c = [R, r];
                        if (a) {
                            for (; t = t[i];)
                                if ((1 === t.nodeType || o) && e(t, n, a)) return !0
                        } else
                            for (; t = t[i];)
                                if (1 === t.nodeType || o) {
                                    if (l = t[B] || (t[B] = {}), (s = l[i]) && s[0] === R && s[1] === r) return c[2] = s[2];
                                    if (l[i] = c, c[2] = e(t, n, a)) return !0
                                }
                    }
                }

                function f(e) {
                    return e.length > 1 ? function(t, n, i) {
                        for (var o = e.length; o--;)
                            if (!e[o](t, n, i)) return !1;
                        return !0
                    } : e[0]
                }

                function m(e, n, i) {
                    for (var o = 0, r = n.length; r > o; o++) t(e, n[o], i);
                    return i
                }

                function g(e, t, n, i, o) {
                    for (var r, a = [], s = 0, l = e.length, c = null != t; l > s; s++)(r = e[s]) && (!n || n(r, i, o)) && (a.push(r), c && t.push(s));
                    return a
                }

                function v(e, t, n, o, r, a) {
                    return o && !o[B] && (o = v(o)), r && !r[B] && (r = v(r, a)), i(function(i, a, s, l) {
                        var c, u, d, p = [],
                            h = [],
                            f = a.length,
                            v = i || m(t || "*", s.nodeType ? [s] : s, []),
                            y = !e || !i && t ? v : g(v, p, e, s, l),
                            b = n ? r || (i ? e : f || o) ? [] : a : y;
                        if (n && n(y, b, s, l), o)
                            for (c = g(b, h), o(c, [], s, l), u = c.length; u--;)(d = c[u]) && (b[h[u]] = !(y[h[u]] = d));
                        if (i) {
                            if (r || e) {
                                if (r) {
                                    for (c = [], u = b.length; u--;)(d = b[u]) && c.push(y[u] = d);
                                    r(null, b = [], c, l)
                                }
                                for (u = b.length; u--;)(d = b[u]) && (c = r ? et(i, d) : p[u]) > -1 && (i[c] = !(a[c] = d))
                            }
                        } else b = g(b === a ? b.splice(f, b.length) : b), r ? r(null, a, b, l) : K.apply(a, b)
                    })
                }

                function y(e) {
                    for (var t, n, i, o = e.length, r = k.relative[e[0].type], a = r || k.relative[" "], s = r ? 1 : 0, l = h(function(e) {
                            return e === t
                        }, a, !0), c = h(function(e) {
                            return et(t, e) > -1
                        }, a, !0), u = [function(e, n, i) {
                            var o = !r && (i || n !== E) || ((t = n).nodeType ? l(e, n, i) : c(e, n, i));
                            return t = null, o
                        }]; o > s; s++)
                        if (n = k.relative[e[s].type]) u = [h(f(u), n)];
                        else {
                            if (n = k.filter[e[s].type].apply(null, e[s].matches), n[B]) {
                                for (i = ++s; o > i && !k.relative[e[i].type]; i++);
                                return v(s > 1 && f(u), s > 1 && p(e.slice(0, s - 1).concat({
                                    value: " " === e[s - 2].type ? "*" : ""
                                })).replace(lt, "$1"), n, i > s && y(e.slice(s, i)), o > i && y(e = e.slice(i)), o > i && p(e))
                            }
                            u.push(n)
                        }
                    return f(u)
                }

                function b(e, n) {
                    var o = n.length > 0,
                        r = e.length > 0,
                        a = function(i, a, s, l, c) {
                            var u, d, p, h = 0,
                                f = "0",
                                m = i && [],
                                v = [],
                                y = E,
                                b = i || r && k.find.TAG("*", c),
                                x = R += null == y ? 1 : Math.random() || .1,
                                w = b.length;
                            for (c && (E = a !== N && a); f !== w && null != (u = b[f]); f++) {
                                if (r && u) {
                                    for (d = 0; p = e[d++];)
                                        if (p(u, a, s)) {
                                            l.push(u);
                                            break
                                        }
                                    c && (R = x)
                                }
                                o && ((u = !p && u) && h--, i && m.push(u))
                            }
                            if (h += f, o && f !== h) {
                                for (d = 0; p = n[d++];) p(m, v, a, s);
                                if (i) {
                                    if (h > 0)
                                        for (; f--;) m[f] || v[f] || (v[f] = G.call(l));
                                    v = g(v)
                                }
                                K.apply(l, v), c && !i && v.length > 0 && h + n.length > 1 && t.uniqueSort(l)
                            }
                            return c && (R = x, E = y), m
                        };
                    return o ? i(a) : a
                }
                var x, w, k, _, C, T, S, j, E, $, O, D, N, I, q, A, L, H, z, B = "sizzle" + 1 * new Date,
                    P = e.document,
                    R = 0,
                    M = 0,
                    F = n(),
                    W = n(),
                    U = n(),
                    X = function(e, t) {
                        return e === t && (O = !0), 0
                    },
                    J = 1 << 31,
                    V = {}.hasOwnProperty,
                    Q = [],
                    G = Q.pop,
                    Y = Q.push,
                    K = Q.push,
                    Z = Q.slice,
                    et = function(e, t) {
                        for (var n = 0, i = e.length; i > n; n++)
                            if (e[n] === t) return n;
                        return -1
                    },
                    tt = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                    nt = "[\\x20\\t\\r\\n\\f]",
                    it = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                    ot = it.replace("w", "w#"),
                    rt = "\\[" + nt + "*(" + it + ")(?:" + nt + "*([*^$|!~]?=)" + nt + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + ot + "))|)" + nt + "*\\]",
                    at = ":(" + it + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + rt + ")*)|.*)\\)|)",
                    st = new RegExp(nt + "+", "g"),
                    lt = new RegExp("^" + nt + "+|((?:^|[^\\\\])(?:\\\\.)*)" + nt + "+$", "g"),
                    ct = new RegExp("^" + nt + "*," + nt + "*"),
                    ut = new RegExp("^" + nt + "*([>+~]|" + nt + ")" + nt + "*"),
                    dt = new RegExp("=" + nt + "*([^\\]'\"]*?)" + nt + "*\\]", "g"),
                    pt = new RegExp(at),
                    ht = new RegExp("^" + ot + "$"),
                    ft = {
                        ID: new RegExp("^#(" + it + ")"),
                        CLASS: new RegExp("^\\.(" + it + ")"),
                        TAG: new RegExp("^(" + it.replace("w", "w*") + ")"),
                        ATTR: new RegExp("^" + rt),
                        PSEUDO: new RegExp("^" + at),
                        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + nt + "*(even|odd|(([+-]|)(\\d*)n|)" + nt + "*(?:([+-]|)" + nt + "*(\\d+)|))" + nt + "*\\)|)", "i"),
                        bool: new RegExp("^(?:" + tt + ")$", "i"),
                        needsContext: new RegExp("^" + nt + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + nt + "*((?:-\\d)?\\d*)" + nt + "*\\)|)(?=[^-]|$)", "i")
                    },
                    mt = /^(?:input|select|textarea|button)$/i,
                    gt = /^h\d$/i,
                    vt = /^[^{]+\{\s*\[native \w/,
                    yt = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                    bt = /[+~]/,
                    xt = /'|\\/g,
                    wt = new RegExp("\\\\([\\da-f]{1,6}" + nt + "?|(" + nt + ")|.)", "ig"),
                    kt = function(e, t, n) {
                        var i = "0x" + t - 65536;
                        return i !== i || n ? t : 0 > i ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
                    },
                    _t = function() {
                        D()
                    };
                try {
                    K.apply(Q = Z.call(P.childNodes), P.childNodes), Q[P.childNodes.length].nodeType
                } catch (Ct) {
                    K = {
                        apply: Q.length ? function(e, t) {
                            Y.apply(e, Z.call(t))
                        } : function(e, t) {
                            for (var n = e.length, i = 0; e[n++] = t[i++];);
                            e.length = n - 1
                        }
                    }
                }
                w = t.support = {}, C = t.isXML = function(e) {
                    var t = e && (e.ownerDocument || e).documentElement;
                    return t ? "HTML" !== t.nodeName : !1
                }, D = t.setDocument = function(e) {
                    var t, n, i = e ? e.ownerDocument || e : P;
                    return i !== N && 9 === i.nodeType && i.documentElement ? (N = i, I = i.documentElement, n = i.defaultView, n && n !== n.top && (n.addEventListener ? n.addEventListener("unload", _t, !1) : n.attachEvent && n.attachEvent("onunload", _t)), q = !C(i), w.attributes = o(function(e) {
                        return e.className = "i", !e.getAttribute("className")
                    }), w.getElementsByTagName = o(function(e) {
                        return e.appendChild(i.createComment("")), !e.getElementsByTagName("*").length
                    }), w.getElementsByClassName = vt.test(i.getElementsByClassName), w.getById = o(function(e) {
                        return I.appendChild(e).id = B, !i.getElementsByName || !i.getElementsByName(B).length
                    }), w.getById ? (k.find.ID = function(e, t) {
                        if ("undefined" != typeof t.getElementById && q) {
                            var n = t.getElementById(e);
                            return n && n.parentNode ? [n] : []
                        }
                    }, k.filter.ID = function(e) {
                        var t = e.replace(wt, kt);
                        return function(e) {
                            return e.getAttribute("id") === t
                        }
                    }) : (delete k.find.ID, k.filter.ID = function(e) {
                        var t = e.replace(wt, kt);
                        return function(e) {
                            var n = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
                            return n && n.value === t
                        }
                    }), k.find.TAG = w.getElementsByTagName ? function(e, t) {
                        return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : w.qsa ? t.querySelectorAll(e) : void 0
                    } : function(e, t) {
                        var n, i = [],
                            o = 0,
                            r = t.getElementsByTagName(e);
                        if ("*" === e) {
                            for (; n = r[o++];) 1 === n.nodeType && i.push(n);
                            return i
                        }
                        return r
                    }, k.find.CLASS = w.getElementsByClassName && function(e, t) {
                        return q ? t.getElementsByClassName(e) : void 0
                    }, L = [], A = [], (w.qsa = vt.test(i.querySelectorAll)) && (o(function(e) {
                        I.appendChild(e).innerHTML = "<a id='" + B + "'></a><select id='" + B + "-\f]' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && A.push("[*^$]=" + nt + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || A.push("\\[" + nt + "*(?:value|" + tt + ")"), e.querySelectorAll("[id~=" + B + "-]").length || A.push("~="), e.querySelectorAll(":checked").length || A.push(":checked"), e.querySelectorAll("a#" + B + "+*").length || A.push(".#.+[+~]")
                    }), o(function(e) {
                        var t = i.createElement("input");
                        t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && A.push("name" + nt + "*[*^$|!~]?="), e.querySelectorAll(":enabled").length || A.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), A.push(",.*:")
                    })), (w.matchesSelector = vt.test(H = I.matches || I.webkitMatchesSelector || I.mozMatchesSelector || I.oMatchesSelector || I.msMatchesSelector)) && o(function(e) {
                        w.disconnectedMatch = H.call(e, "div"), H.call(e, "[s!='']:x"), L.push("!=", at)
                    }), A = A.length && new RegExp(A.join("|")), L = L.length && new RegExp(L.join("|")), t = vt.test(I.compareDocumentPosition), z = t || vt.test(I.contains) ? function(e, t) {
                        var n = 9 === e.nodeType ? e.documentElement : e,
                            i = t && t.parentNode;
                        return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
                    } : function(e, t) {
                        if (t)
                            for (; t = t.parentNode;)
                                if (t === e) return !0;
                        return !1
                    }, X = t ? function(e, t) {
                        if (e === t) return O = !0, 0;
                        var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
                        return n ? n : (n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1, 1 & n || !w.sortDetached && t.compareDocumentPosition(e) === n ? e === i || e.ownerDocument === P && z(P, e) ? -1 : t === i || t.ownerDocument === P && z(P, t) ? 1 : $ ? et($, e) - et($, t) : 0 : 4 & n ? -1 : 1)
                    } : function(e, t) {
                        if (e === t) return O = !0, 0;
                        var n, o = 0,
                            r = e.parentNode,
                            s = t.parentNode,
                            l = [e],
                            c = [t];
                        if (!r || !s) return e === i ? -1 : t === i ? 1 : r ? -1 : s ? 1 : $ ? et($, e) - et($, t) : 0;
                        if (r === s) return a(e, t);
                        for (n = e; n = n.parentNode;) l.unshift(n);
                        for (n = t; n = n.parentNode;) c.unshift(n);
                        for (; l[o] === c[o];) o++;
                        return o ? a(l[o], c[o]) : l[o] === P ? -1 : c[o] === P ? 1 : 0
                    }, i) : N
                }, t.matches = function(e, n) {
                    return t(e, null, null, n)
                }, t.matchesSelector = function(e, n) {
                    if ((e.ownerDocument || e) !== N && D(e), n = n.replace(dt, "='$1']"), !(!w.matchesSelector || !q || L && L.test(n) || A && A.test(n))) try {
                        var i = H.call(e, n);
                        if (i || w.disconnectedMatch || e.document && 11 !== e.document.nodeType) return i
                    } catch (o) {}
                    return t(n, N, null, [e]).length > 0
                }, t.contains = function(e, t) {
                    return (e.ownerDocument || e) !== N && D(e), z(e, t)
                }, t.attr = function(e, t) {
                    (e.ownerDocument || e) !== N && D(e);
                    var n = k.attrHandle[t.toLowerCase()],
                        i = n && V.call(k.attrHandle, t.toLowerCase()) ? n(e, t, !q) : void 0;
                    return void 0 !== i ? i : w.attributes || !q ? e.getAttribute(t) : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
                }, t.error = function(e) {
                    throw new Error("Syntax error, unrecognized expression: " + e)
                }, t.uniqueSort = function(e) {
                    var t, n = [],
                        i = 0,
                        o = 0;
                    if (O = !w.detectDuplicates, $ = !w.sortStable && e.slice(0), e.sort(X), O) {
                        for (; t = e[o++];) t === e[o] && (i = n.push(o));
                        for (; i--;) e.splice(n[i], 1)
                    }
                    return $ = null, e
                }, _ = t.getText = function(e) {
                    var t, n = "",
                        i = 0,
                        o = e.nodeType;
                    if (o) {
                        if (1 === o || 9 === o || 11 === o) {
                            if ("string" == typeof e.textContent) return e.textContent;
                            for (e = e.firstChild; e; e = e.nextSibling) n += _(e)
                        } else if (3 === o || 4 === o) return e.nodeValue
                    } else
                        for (; t = e[i++];) n += _(t);
                    return n
                }, k = t.selectors = {
                    cacheLength: 50,
                    createPseudo: i,
                    match: ft,
                    attrHandle: {},
                    find: {},
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: !0
                        },
                        " ": {
                            dir: "parentNode"
                        },
                        "+": {
                            dir: "previousSibling",
                            first: !0
                        },
                        "~": {
                            dir: "previousSibling"
                        }
                    },
                    preFilter: {
                        ATTR: function(e) {
                            return e[1] = e[1].replace(wt, kt), e[3] = (e[3] || e[4] || e[5] || "").replace(wt, kt), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                        },
                        CHILD: function(e) {
                            return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || t.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && t.error(e[0]), e
                        },
                        PSEUDO: function(e) {
                            var t, n = !e[6] && e[2];
                            return ft.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && pt.test(n) && (t = T(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                        }
                    },
                    filter: {
                        TAG: function(e) {
                            var t = e.replace(wt, kt).toLowerCase();
                            return "*" === e ? function() {
                                return !0
                            } : function(e) {
                                return e.nodeName && e.nodeName.toLowerCase() === t
                            }
                        },
                        CLASS: function(e) {
                            var t = F[e + " "];
                            return t || (t = new RegExp("(^|" + nt + ")" + e + "(" + nt + "|$)")) && F(e, function(e) {
                                return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "")
                            })
                        },
                        ATTR: function(e, n, i) {
                            return function(o) {
                                var r = t.attr(o, e);
                                return null == r ? "!=" === n : n ? (r += "", "=" === n ? r === i : "!=" === n ? r !== i : "^=" === n ? i && 0 === r.indexOf(i) : "*=" === n ? i && r.indexOf(i) > -1 : "$=" === n ? i && r.slice(-i.length) === i : "~=" === n ? (" " + r.replace(st, " ") + " ").indexOf(i) > -1 : "|=" === n ? r === i || r.slice(0, i.length + 1) === i + "-" : !1) : !0
                            }
                        },
                        CHILD: function(e, t, n, i, o) {
                            var r = "nth" !== e.slice(0, 3),
                                a = "last" !== e.slice(-4),
                                s = "of-type" === t;
                            return 1 === i && 0 === o ? function(e) {
                                return !!e.parentNode
                            } : function(t, n, l) {
                                var c, u, d, p, h, f, m = r !== a ? "nextSibling" : "previousSibling",
                                    g = t.parentNode,
                                    v = s && t.nodeName.toLowerCase(),
                                    y = !l && !s;
                                if (g) {
                                    if (r) {
                                        for (; m;) {
                                            for (d = t; d = d[m];)
                                                if (s ? d.nodeName.toLowerCase() === v : 1 === d.nodeType) return !1;
                                            f = m = "only" === e && !f && "nextSibling"
                                        }
                                        return !0
                                    }
                                    if (f = [a ? g.firstChild : g.lastChild], a && y) {
                                        for (u = g[B] || (g[B] = {}), c = u[e] || [], h = c[0] === R && c[1], p = c[0] === R && c[2], d = h && g.childNodes[h]; d = ++h && d && d[m] || (p = h = 0) || f.pop();)
                                            if (1 === d.nodeType && ++p && d === t) {
                                                u[e] = [R, h, p];
                                                break
                                            }
                                    } else if (y && (c = (t[B] || (t[B] = {}))[e]) && c[0] === R) p = c[1];
                                    else
                                        for (;
                                            (d = ++h && d && d[m] || (p = h = 0) || f.pop()) && ((s ? d.nodeName.toLowerCase() !== v : 1 !== d.nodeType) || !++p || (y && ((d[B] || (d[B] = {}))[e] = [R, p]), d !== t)););
                                    return p -= o, p === i || p % i === 0 && p / i >= 0
                                }
                            }
                        },
                        PSEUDO: function(e, n) {
                            var o, r = k.pseudos[e] || k.setFilters[e.toLowerCase()] || t.error("unsupported pseudo: " + e);
                            return r[B] ? r(n) : r.length > 1 ? (o = [e, e, "", n], k.setFilters.hasOwnProperty(e.toLowerCase()) ? i(function(e, t) {
                                for (var i, o = r(e, n), a = o.length; a--;) i = et(e, o[a]), e[i] = !(t[i] = o[a])
                            }) : function(e) {
                                return r(e, 0, o)
                            }) : r
                        }
                    },
                    pseudos: {
                        not: i(function(e) {
                            var t = [],
                                n = [],
                                o = S(e.replace(lt, "$1"));
                            return o[B] ? i(function(e, t, n, i) {
                                for (var r, a = o(e, null, i, []), s = e.length; s--;)(r = a[s]) && (e[s] = !(t[s] = r))
                            }) : function(e, i, r) {
                                return t[0] = e, o(t, null, r, n), t[0] = null, !n.pop()
                            }
                        }),
                        has: i(function(e) {
                            return function(n) {
                                return t(e, n).length > 0
                            }
                        }),
                        contains: i(function(e) {
                            return e = e.replace(wt, kt),
                                function(t) {
                                    return (t.textContent || t.innerText || _(t)).indexOf(e) > -1
                                }
                        }),
                        lang: i(function(e) {
                            return ht.test(e || "") || t.error("unsupported lang: " + e), e = e.replace(wt, kt).toLowerCase(),
                                function(t) {
                                    var n;
                                    do
                                        if (n = q ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-");
                                    while ((t = t.parentNode) && 1 === t.nodeType);
                                    return !1
                                }
                        }),
                        target: function(t) {
                            var n = e.location && e.location.hash;
                            return n && n.slice(1) === t.id
                        },
                        root: function(e) {
                            return e === I
                        },
                        focus: function(e) {
                            return e === N.activeElement && (!N.hasFocus || N.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                        },
                        enabled: function(e) {
                            return e.disabled === !1
                        },
                        disabled: function(e) {
                            return e.disabled === !0
                        },
                        checked: function(e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && !!e.checked || "option" === t && !!e.selected
                        },
                        selected: function(e) {
                            return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                        },
                        empty: function(e) {
                            for (e = e.firstChild; e; e = e.nextSibling)
                                if (e.nodeType < 6) return !1;
                            return !0
                        },
                        parent: function(e) {
                            return !k.pseudos.empty(e)
                        },
                        header: function(e) {
                            return gt.test(e.nodeName)
                        },
                        input: function(e) {
                            return mt.test(e.nodeName)
                        },
                        button: function(e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && "button" === e.type || "button" === t
                        },
                        text: function(e) {
                            var t;
                            return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                        },
                        first: c(function() {
                            return [0]
                        }),
                        last: c(function(e, t) {
                            return [t - 1]
                        }),
                        eq: c(function(e, t, n) {
                            return [0 > n ? n + t : n]
                        }),
                        even: c(function(e, t) {
                            for (var n = 0; t > n; n += 2) e.push(n);
                            return e
                        }),
                        odd: c(function(e, t) {
                            for (var n = 1; t > n; n += 2) e.push(n);
                            return e
                        }),
                        lt: c(function(e, t, n) {
                            for (var i = 0 > n ? n + t : n; --i >= 0;) e.push(i);
                            return e
                        }),
                        gt: c(function(e, t, n) {
                            for (var i = 0 > n ? n + t : n; ++i < t;) e.push(i);
                            return e
                        })
                    }
                }, k.pseudos.nth = k.pseudos.eq;
                for (x in {
                        radio: !0,
                        checkbox: !0,
                        file: !0,
                        password: !0,
                        image: !0
                    }) k.pseudos[x] = s(x);
                for (x in {
                        submit: !0,
                        reset: !0
                    }) k.pseudos[x] = l(x);
                return d.prototype = k.filters = k.pseudos, k.setFilters = new d, T = t.tokenize = function(e, n) {
                    var i, o, r, a, s, l, c, u = W[e + " "];
                    if (u) return n ? 0 : u.slice(0);
                    for (s = e, l = [], c = k.preFilter; s;) {
                        (!i || (o = ct.exec(s))) && (o && (s = s.slice(o[0].length) || s), l.push(r = [])), i = !1, (o = ut.exec(s)) && (i = o.shift(), r.push({
                            value: i,
                            type: o[0].replace(lt, " ")
                        }), s = s.slice(i.length));
                        for (a in k.filter) !(o = ft[a].exec(s)) || c[a] && !(o = c[a](o)) || (i = o.shift(), r.push({
                            value: i,
                            type: a,
                            matches: o
                        }), s = s.slice(i.length));
                        if (!i) break
                    }
                    return n ? s.length : s ? t.error(e) : W(e, l).slice(0)
                }, S = t.compile = function(e, t) {
                    var n, i = [],
                        o = [],
                        r = U[e + " "];
                    if (!r) {
                        for (t || (t = T(e)), n = t.length; n--;) r = y(t[n]), r[B] ? i.push(r) : o.push(r);
                        r = U(e, b(o, i)), r.selector = e
                    }
                    return r
                }, j = t.select = function(e, t, n, i) {
                    var o, r, a, s, l, c = "function" == typeof e && e,
                        d = !i && T(e = c.selector || e);
                    if (n = n || [], 1 === d.length) {
                        if (r = d[0] = d[0].slice(0), r.length > 2 && "ID" === (a = r[0]).type && w.getById && 9 === t.nodeType && q && k.relative[r[1].type]) {
                            if (t = (k.find.ID(a.matches[0].replace(wt, kt), t) || [])[0], !t) return n;
                            c && (t = t.parentNode), e = e.slice(r.shift().value.length)
                        }
                        for (o = ft.needsContext.test(e) ? 0 : r.length; o-- && (a = r[o], !k.relative[s = a.type]);)
                            if ((l = k.find[s]) && (i = l(a.matches[0].replace(wt, kt), bt.test(r[0].type) && u(t.parentNode) || t))) {
                                if (r.splice(o, 1), e = i.length && p(r), !e) return K.apply(n, i), n;
                                break
                            }
                    }
                    return (c || S(e, d))(i, t, !q, n, bt.test(e) && u(t.parentNode) || t), n
                }, w.sortStable = B.split("").sort(X).join("") === B, w.detectDuplicates = !!O, D(), w.sortDetached = o(function(e) {
                    return 1 & e.compareDocumentPosition(N.createElement("div"))
                }), o(function(e) {
                    return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
                }) || r("type|href|height|width", function(e, t, n) {
                    return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
                }), w.attributes && o(function(e) {
                    return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
                }) || r("value", function(e, t, n) {
                    return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
                }), o(function(e) {
                    return null == e.getAttribute("disabled")
                }) || r(tt, function(e, t, n) {
                    var i;
                    return n ? void 0 : e[t] === !0 ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
                }), t
            }(e);
            ot.find = ct, ot.expr = ct.selectors, ot.expr[":"] = ot.expr.pseudos, ot.unique = ct.uniqueSort, ot.text = ct.getText, ot.isXMLDoc = ct.isXML, ot.contains = ct.contains;
            var ut = ot.expr.match.needsContext,
                dt = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
                pt = /^.[^:#\[\.,]*$/;
            ot.filter = function(e, t, n) {
                var i = t[0];
                return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? ot.find.matchesSelector(i, e) ? [i] : [] : ot.find.matches(e, ot.grep(t, function(e) {
                    return 1 === e.nodeType
                }))
            }, ot.fn.extend({
                find: function(e) {
                    var t, n = [],
                        i = this,
                        o = i.length;
                    if ("string" != typeof e) return this.pushStack(ot(e).filter(function() {
                        for (t = 0; o > t; t++)
                            if (ot.contains(i[t], this)) return !0
                    }));
                    for (t = 0; o > t; t++) ot.find(e, i[t], n);
                    return n = this.pushStack(o > 1 ? ot.unique(n) : n), n.selector = this.selector ? this.selector + " " + e : e, n
                },
                filter: function(e) {
                    return this.pushStack(i(this, e || [], !1))
                },
                not: function(e) {
                    return this.pushStack(i(this, e || [], !0))
                },
                is: function(e) {
                    return !!i(this, "string" == typeof e && ut.test(e) ? ot(e) : e || [], !1).length
                }
            });
            var ht, ft = e.document,
                mt = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
                gt = ot.fn.init = function(e, t) {
                    var n, i;
                    if (!e) return this;
                    if ("string" == typeof e) {
                        if (n = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : mt.exec(e), !n || !n[1] && t) return !t || t.jquery ? (t || ht).find(e) : this.constructor(t).find(e);
                        if (n[1]) {
                            if (t = t instanceof ot ? t[0] : t, ot.merge(this, ot.parseHTML(n[1], t && t.nodeType ? t.ownerDocument || t : ft, !0)), dt.test(n[1]) && ot.isPlainObject(t))
                                for (n in t) ot.isFunction(this[n]) ? this[n](t[n]) : this.attr(n, t[n]);
                            return this
                        }
                        if (i = ft.getElementById(n[2]), i && i.parentNode) {
                            if (i.id !== n[2]) return ht.find(e);
                            this.length = 1, this[0] = i
                        }
                        return this.context = ft, this.selector = e, this
                    }
                    return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : ot.isFunction(e) ? "undefined" != typeof ht.ready ? ht.ready(e) : e(ot) : (void 0 !== e.selector && (this.selector = e.selector, this.context = e.context), ot.makeArray(e, this))
                };
            gt.prototype = ot.fn, ht = ot(ft);
            var vt = /^(?:parents|prev(?:Until|All))/,
                yt = {
                    children: !0,
                    contents: !0,
                    next: !0,
                    prev: !0
                };
            ot.extend({
                dir: function(e, t, n) {
                    for (var i = [], o = e[t]; o && 9 !== o.nodeType && (void 0 === n || 1 !== o.nodeType || !ot(o).is(n));) 1 === o.nodeType && i.push(o), o = o[t];
                    return i
                },
                sibling: function(e, t) {
                    for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                    return n
                }
            }), ot.fn.extend({
                has: function(e) {
                    var t, n = ot(e, this),
                        i = n.length;
                    return this.filter(function() {
                        for (t = 0; i > t; t++)
                            if (ot.contains(this, n[t])) return !0
                    })
                },
                closest: function(e, t) {
                    for (var n, i = 0, o = this.length, r = [], a = ut.test(e) || "string" != typeof e ? ot(e, t || this.context) : 0; o > i; i++)
                        for (n = this[i]; n && n !== t; n = n.parentNode)
                            if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && ot.find.matchesSelector(n, e))) {
                                r.push(n);
                                break
                            }
                    return this.pushStack(r.length > 1 ? ot.unique(r) : r)
                },
                index: function(e) {
                    return e ? "string" == typeof e ? ot.inArray(this[0], ot(e)) : ot.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
                },
                add: function(e, t) {
                    return this.pushStack(ot.unique(ot.merge(this.get(), ot(e, t))))
                },
                addBack: function(e) {
                    return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
                }
            }), ot.each({
                parent: function(e) {
                    var t = e.parentNode;
                    return t && 11 !== t.nodeType ? t : null
                },
                parents: function(e) {
                    return ot.dir(e, "parentNode")
                },
                parentsUntil: function(e, t, n) {
                    return ot.dir(e, "parentNode", n)
                },
                next: function(e) {
                    return o(e, "nextSibling")
                },
                prev: function(e) {
                    return o(e, "previousSibling")
                },
                nextAll: function(e) {
                    return ot.dir(e, "nextSibling")
                },
                prevAll: function(e) {
                    return ot.dir(e, "previousSibling")
                },
                nextUntil: function(e, t, n) {
                    return ot.dir(e, "nextSibling", n)
                },
                prevUntil: function(e, t, n) {
                    return ot.dir(e, "previousSibling", n)
                },
                siblings: function(e) {
                    return ot.sibling((e.parentNode || {}).firstChild, e)
                },
                children: function(e) {
                    return ot.sibling(e.firstChild)
                },
                contents: function(e) {
                    return ot.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : ot.merge([], e.childNodes)
                }
            }, function(e, t) {
                ot.fn[e] = function(n, i) {
                    var o = ot.map(this, t, n);
                    return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (o = ot.filter(i, o)), this.length > 1 && (yt[e] || (o = ot.unique(o)), vt.test(e) && (o = o.reverse())), this.pushStack(o)
                }
            });
            var bt = /\S+/g,
                xt = {};
            ot.Callbacks = function(e) {
                e = "string" == typeof e ? xt[e] || r(e) : ot.extend({}, e);
                var t, n, i, o, a, s, l = [],
                    c = !e.once && [],
                    u = function(r) {
                        for (n = e.memory && r, i = !0, a = s || 0, s = 0, o = l.length, t = !0; l && o > a; a++)
                            if (l[a].apply(r[0], r[1]) === !1 && e.stopOnFalse) {
                                n = !1;
                                break
                            }
                        t = !1, l && (c ? c.length && u(c.shift()) : n ? l = [] : d.disable())
                    },
                    d = {
                        add: function() {
                            if (l) {
                                var i = l.length;
                                ! function r(t) {
                                    ot.each(t, function(t, n) {
                                        var i = ot.type(n);
                                        "function" === i ? e.unique && d.has(n) || l.push(n) : n && n.length && "string" !== i && r(n)
                                    })
                                }(arguments), t ? o = l.length : n && (s = i, u(n))
                            }
                            return this
                        },
                        remove: function() {
                            return l && ot.each(arguments, function(e, n) {
                                for (var i;
                                    (i = ot.inArray(n, l, i)) > -1;) l.splice(i, 1), t && (o >= i && o--, a >= i && a--)
                            }), this
                        },
                        has: function(e) {
                            return e ? ot.inArray(e, l) > -1 : !(!l || !l.length)
                        },
                        empty: function() {
                            return l = [], o = 0, this
                        },
                        disable: function() {
                            return l = c = n = void 0, this
                        },
                        disabled: function() {
                            return !l
                        },
                        lock: function() {
                            return c = void 0, n || d.disable(), this
                        },
                        locked: function() {
                            return !c
                        },
                        fireWith: function(e, n) {
                            return !l || i && !c || (n = n || [], n = [e, n.slice ? n.slice() : n], t ? c.push(n) : u(n)), this
                        },
                        fire: function() {
                            return d.fireWith(this, arguments), this
                        },
                        fired: function() {
                            return !!i
                        }
                    };
                return d
            }, ot.extend({
                Deferred: function(e) {
                    var t = [
                            ["resolve", "done", ot.Callbacks("once memory"), "resolved"],
                            ["reject", "fail", ot.Callbacks("once memory"), "rejected"],
                            ["notify", "progress", ot.Callbacks("memory")]
                        ],
                        n = "pending",
                        i = {
                            state: function() {
                                return n
                            },
                            always: function() {
                                return o.done(arguments).fail(arguments), this
                            },
                            then: function() {
                                var e = arguments;
                                return ot.Deferred(function(n) {
                                    ot.each(t, function(t, r) {
                                        var a = ot.isFunction(e[t]) && e[t];
                                        o[r[1]](function() {
                                            var e = a && a.apply(this, arguments);
                                            e && ot.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[r[0] + "With"](this === i ? n.promise() : this, a ? [e] : arguments)
                                        })
                                    }), e = null
                                }).promise()
                            },
                            promise: function(e) {
                                return null != e ? ot.extend(e, i) : i
                            }
                        },
                        o = {};
                    return i.pipe = i.then, ot.each(t, function(e, r) {
                        var a = r[2],
                            s = r[3];
                        i[r[1]] = a.add, s && a.add(function() {
                            n = s
                        }, t[1 ^ e][2].disable, t[2][2].lock), o[r[0]] = function() {
                            return o[r[0] + "With"](this === o ? i : this, arguments), this
                        }, o[r[0] + "With"] = a.fireWith
                    }), i.promise(o), e && e.call(o, o), o
                },
                when: function(e) {
                    var t, n, i, o = 0,
                        r = Q.call(arguments),
                        a = r.length,
                        s = 1 !== a || e && ot.isFunction(e.promise) ? a : 0,
                        l = 1 === s ? e : ot.Deferred(),
                        c = function(e, n, i) {
                            return function(o) {
                                n[e] = this, i[e] = arguments.length > 1 ? Q.call(arguments) : o, i === t ? l.notifyWith(n, i) : --s || l.resolveWith(n, i)
                            }
                        };
                    if (a > 1)
                        for (t = new Array(a), n = new Array(a), i = new Array(a); a > o; o++) r[o] && ot.isFunction(r[o].promise) ? r[o].promise().done(c(o, i, r)).fail(l.reject).progress(c(o, n, t)) : --s;
                    return s || l.resolveWith(i, r), l.promise()
                }
            });
            var wt;
            ot.fn.ready = function(e) {
                return ot.ready.promise().done(e), this
            }, ot.extend({
                isReady: !1,
                readyWait: 1,
                holdReady: function(e) {
                    e ? ot.readyWait++ : ot.ready(!0)
                },
                ready: function(e) {
                    if (e === !0 ? !--ot.readyWait : !ot.isReady) {
                        if (!ft.body) return setTimeout(ot.ready);
                        ot.isReady = !0, e !== !0 && --ot.readyWait > 0 || (wt.resolveWith(ft, [ot]), ot.fn.triggerHandler && (ot(ft).triggerHandler("ready"), ot(ft).off("ready")))
                    }
                }
            }), ot.ready.promise = function(t) {
                if (!wt)
                    if (wt = ot.Deferred(), "complete" === ft.readyState) setTimeout(ot.ready);
                    else if (ft.addEventListener) ft.addEventListener("DOMContentLoaded", s, !1), e.addEventListener("load", s, !1);
                else {
                    ft.attachEvent("onreadystatechange", s), e.attachEvent("onload", s);
                    var n = !1;
                    try {
                        n = null == e.frameElement && ft.documentElement
                    } catch (i) {}
                    n && n.doScroll && ! function o() {
                        if (!ot.isReady) {
                            try {
                                n.doScroll("left")
                            } catch (e) {
                                return setTimeout(o, 50)
                            }
                            a(), ot.ready()
                        }
                    }()
                }
                return wt.promise(t)
            };
            var kt, _t = "undefined";
            for (kt in ot(nt)) break;
            nt.ownLast = "0" !== kt, nt.inlineBlockNeedsLayout = !1, ot(function() {
                    var e, t, n, i;
                    n = ft.getElementsByTagName("body")[0], n && n.style && (t = ft.createElement("div"), i = ft.createElement("div"), i.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", n.appendChild(i).appendChild(t), typeof t.style.zoom !== _t && (t.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1", nt.inlineBlockNeedsLayout = e = 3 === t.offsetWidth, e && (n.style.zoom = 1)), n.removeChild(i))
                }),
                function() {
                    var e = ft.createElement("div");
                    if (null == nt.deleteExpando) {
                        nt.deleteExpando = !0;
                        try {
                            delete e.test
                        } catch (t) {
                            nt.deleteExpando = !1
                        }
                    }
                    e = null
                }(), ot.acceptData = function(e) {
                    var t = ot.noData[(e.nodeName + " ").toLowerCase()],
                        n = +e.nodeType || 1;
                    return 1 !== n && 9 !== n ? !1 : !t || t !== !0 && e.getAttribute("classid") === t
                };
            var Ct = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                Tt = /([A-Z])/g;
            ot.extend({
                cache: {},
                noData: {
                    "applet ": !0,
                    "embed ": !0,
                    "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                },
                hasData: function(e) {
                    return e = e.nodeType ? ot.cache[e[ot.expando]] : e[ot.expando], !!e && !c(e)
                },
                data: function(e, t, n) {
                    return u(e, t, n)
                },
                removeData: function(e, t) {
                    return d(e, t)
                },
                _data: function(e, t, n) {
                    return u(e, t, n, !0)
                },
                _removeData: function(e, t) {
                    return d(e, t, !0)
                }
            }), ot.fn.extend({
                data: function(e, t) {
                    var n, i, o, r = this[0],
                        a = r && r.attributes;
                    if (void 0 === e) {
                        if (this.length && (o = ot.data(r), 1 === r.nodeType && !ot._data(r, "parsedAttrs"))) {
                            for (n = a.length; n--;) a[n] && (i = a[n].name, 0 === i.indexOf("data-") && (i = ot.camelCase(i.slice(5)), l(r, i, o[i])));
                            ot._data(r, "parsedAttrs", !0)
                        }
                        return o
                    }
                    return "object" == typeof e ? this.each(function() {
                        ot.data(this, e)
                    }) : arguments.length > 1 ? this.each(function() {
                        ot.data(this, e, t)
                    }) : r ? l(r, e, ot.data(r, e)) : void 0
                },
                removeData: function(e) {
                    return this.each(function() {
                        ot.removeData(this, e)
                    })
                }
            }), ot.extend({
                queue: function(e, t, n) {
                    var i;
                    return e ? (t = (t || "fx") + "queue", i = ot._data(e, t), n && (!i || ot.isArray(n) ? i = ot._data(e, t, ot.makeArray(n)) : i.push(n)), i || []) : void 0
                },
                dequeue: function(e, t) {
                    t = t || "fx";
                    var n = ot.queue(e, t),
                        i = n.length,
                        o = n.shift(),
                        r = ot._queueHooks(e, t),
                        a = function() {
                            ot.dequeue(e, t)
                        };
                    "inprogress" === o && (o = n.shift(), i--), o && ("fx" === t && n.unshift("inprogress"), delete r.stop, o.call(e, a, r)), !i && r && r.empty.fire()
                },
                _queueHooks: function(e, t) {
                    var n = t + "queueHooks";
                    return ot._data(e, n) || ot._data(e, n, {
                        empty: ot.Callbacks("once memory").add(function() {
                            ot._removeData(e, t + "queue"), ot._removeData(e, n)
                        })
                    })
                }
            }), ot.fn.extend({
                queue: function(e, t) {
                    var n = 2;
                    return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? ot.queue(this[0], e) : void 0 === t ? this : this.each(function() {
                        var n = ot.queue(this, e, t);
                        ot._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && ot.dequeue(this, e)
                    })
                },
                dequeue: function(e) {
                    return this.each(function() {
                        ot.dequeue(this, e)
                    })
                },
                clearQueue: function(e) {
                    return this.queue(e || "fx", [])
                },
                promise: function(e, t) {
                    var n, i = 1,
                        o = ot.Deferred(),
                        r = this,
                        a = this.length,
                        s = function() {
                            --i || o.resolveWith(r, [r])
                        };
                    for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; a--;) n = ot._data(r[a], e + "queueHooks"), n && n.empty && (i++, n.empty.add(s));
                    return s(), o.promise(t)
                }
            });
            var St = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                jt = ["Top", "Right", "Bottom", "Left"],
                Et = function(e, t) {
                    return e = t || e, "none" === ot.css(e, "display") || !ot.contains(e.ownerDocument, e)
                },
                $t = ot.access = function(e, t, n, i, o, r, a) {
                    var s = 0,
                        l = e.length,
                        c = null == n;
                    if ("object" === ot.type(n)) {
                        o = !0;
                        for (s in n) ot.access(e, t, s, n[s], !0, r, a)
                    } else if (void 0 !== i && (o = !0, ot.isFunction(i) || (a = !0), c && (a ? (t.call(e, i), t = null) : (c = t, t = function(e, t, n) {
                            return c.call(ot(e), n)
                        })), t))
                        for (; l > s; s++) t(e[s], n, a ? i : i.call(e[s], s, t(e[s], n)));
                    return o ? e : c ? t.call(e) : l ? t(e[0], n) : r
                },
                Ot = /^(?:checkbox|radio)$/i;
            ! function() {
                var e = ft.createElement("input"),
                    t = ft.createElement("div"),
                    n = ft.createDocumentFragment();
                if (t.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", nt.leadingWhitespace = 3 === t.firstChild.nodeType, nt.tbody = !t.getElementsByTagName("tbody").length, nt.htmlSerialize = !!t.getElementsByTagName("link").length, nt.html5Clone = "<:nav></:nav>" !== ft.createElement("nav").cloneNode(!0).outerHTML, e.type = "checkbox", e.checked = !0, n.appendChild(e), nt.appendChecked = e.checked, t.innerHTML = "<textarea>x</textarea>", nt.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue, n.appendChild(t), t.innerHTML = "<input type='radio' checked='checked' name='t'/>", nt.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked, nt.noCloneEvent = !0, t.attachEvent && (t.attachEvent("onclick", function() {
                        nt.noCloneEvent = !1
                    }), t.cloneNode(!0).click()), null == nt.deleteExpando) {
                    nt.deleteExpando = !0;
                    try {
                        delete t.test
                    } catch (i) {
                        nt.deleteExpando = !1
                    }
                }
            }(),
            function() {
                var t, n, i = ft.createElement("div");
                for (t in {
                        submit: !0,
                        change: !0,
                        focusin: !0
                    }) n = "on" + t, (nt[t + "Bubbles"] = n in e) || (i.setAttribute(n, "t"), nt[t + "Bubbles"] = i.attributes[n].expando === !1);
                i = null
            }();
            var Dt = /^(?:input|select|textarea)$/i,
                Nt = /^key/,
                It = /^(?:mouse|pointer|contextmenu)|click/,
                qt = /^(?:focusinfocus|focusoutblur)$/,
                At = /^([^.]*)(?:\.(.+)|)$/;
            ot.event = {
                global: {},
                add: function(e, t, n, i, o) {
                    var r, a, s, l, c, u, d, p, h, f, m, g = ot._data(e);
                    if (g) {
                        for (n.handler && (l = n, n = l.handler, o = l.selector), n.guid || (n.guid = ot.guid++), (a = g.events) || (a = g.events = {}), (u = g.handle) || (u = g.handle = function(e) {
                                return typeof ot === _t || e && ot.event.triggered === e.type ? void 0 : ot.event.dispatch.apply(u.elem, arguments)
                            }, u.elem = e), t = (t || "").match(bt) || [""], s = t.length; s--;) r = At.exec(t[s]) || [], h = m = r[1], f = (r[2] || "").split(".").sort(), h && (c = ot.event.special[h] || {}, h = (o ? c.delegateType : c.bindType) || h, c = ot.event.special[h] || {}, d = ot.extend({
                            type: h,
                            origType: m,
                            data: i,
                            handler: n,
                            guid: n.guid,
                            selector: o,
                            needsContext: o && ot.expr.match.needsContext.test(o),
                            namespace: f.join(".")
                        }, l), (p = a[h]) || (p = a[h] = [], p.delegateCount = 0, c.setup && c.setup.call(e, i, f, u) !== !1 || (e.addEventListener ? e.addEventListener(h, u, !1) : e.attachEvent && e.attachEvent("on" + h, u))), c.add && (c.add.call(e, d), d.handler.guid || (d.handler.guid = n.guid)), o ? p.splice(p.delegateCount++, 0, d) : p.push(d), ot.event.global[h] = !0);
                        e = null
                    }
                },
                remove: function(e, t, n, i, o) {
                    var r, a, s, l, c, u, d, p, h, f, m, g = ot.hasData(e) && ot._data(e);
                    if (g && (u = g.events)) {
                        for (t = (t || "").match(bt) || [""], c = t.length; c--;)
                            if (s = At.exec(t[c]) || [], h = m = s[1], f = (s[2] || "").split(".").sort(), h) {
                                for (d = ot.event.special[h] || {}, h = (i ? d.delegateType : d.bindType) || h, p = u[h] || [], s = s[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), l = r = p.length; r--;) a = p[r], !o && m !== a.origType || n && n.guid !== a.guid || s && !s.test(a.namespace) || i && i !== a.selector && ("**" !== i || !a.selector) || (p.splice(r, 1), a.selector && p.delegateCount--, d.remove && d.remove.call(e, a));
                                l && !p.length && (d.teardown && d.teardown.call(e, f, g.handle) !== !1 || ot.removeEvent(e, h, g.handle), delete u[h])
                            } else
                                for (h in u) ot.event.remove(e, h + t[c], n, i, !0);
                        ot.isEmptyObject(u) && (delete g.handle, ot._removeData(e, "events"))
                    }
                },
                trigger: function(t, n, i, o) {
                    var r, a, s, l, c, u, d, p = [i || ft],
                        h = tt.call(t, "type") ? t.type : t,
                        f = tt.call(t, "namespace") ? t.namespace.split(".") : [];
                    if (s = u = i = i || ft, 3 !== i.nodeType && 8 !== i.nodeType && !qt.test(h + ot.event.triggered) && (h.indexOf(".") >= 0 && (f = h.split("."), h = f.shift(), f.sort()), a = h.indexOf(":") < 0 && "on" + h, t = t[ot.expando] ? t : new ot.Event(h, "object" == typeof t && t), t.isTrigger = o ? 2 : 3, t.namespace = f.join("."), t.namespace_re = t.namespace ? new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = i), n = null == n ? [t] : ot.makeArray(n, [t]), c = ot.event.special[h] || {}, o || !c.trigger || c.trigger.apply(i, n) !== !1)) {
                        if (!o && !c.noBubble && !ot.isWindow(i)) {
                            for (l = c.delegateType || h, qt.test(l + h) || (s = s.parentNode); s; s = s.parentNode) p.push(s), u = s;
                            u === (i.ownerDocument || ft) && p.push(u.defaultView || u.parentWindow || e)
                        }
                        for (d = 0;
                            (s = p[d++]) && !t.isPropagationStopped();) t.type = d > 1 ? l : c.bindType || h, r = (ot._data(s, "events") || {})[t.type] && ot._data(s, "handle"), r && r.apply(s, n), r = a && s[a], r && r.apply && ot.acceptData(s) && (t.result = r.apply(s, n), t.result === !1 && t.preventDefault());
                        if (t.type = h, !o && !t.isDefaultPrevented() && (!c._default || c._default.apply(p.pop(), n) === !1) && ot.acceptData(i) && a && i[h] && !ot.isWindow(i)) {
                            u = i[a], u && (i[a] = null), ot.event.triggered = h;
                            try {
                                i[h]()
                            } catch (m) {}
                            ot.event.triggered = void 0, u && (i[a] = u)
                        }
                        return t.result
                    }
                },
                dispatch: function(e) {
                    e = ot.event.fix(e);
                    var t, n, i, o, r, a = [],
                        s = Q.call(arguments),
                        l = (ot._data(this, "events") || {})[e.type] || [],
                        c = ot.event.special[e.type] || {};
                    if (s[0] = e, e.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, e) !== !1) {
                        for (a = ot.event.handlers.call(this, e, l), t = 0;
                            (o = a[t++]) && !e.isPropagationStopped();)
                            for (e.currentTarget = o.elem, r = 0;
                                (i = o.handlers[r++]) && !e.isImmediatePropagationStopped();)(!e.namespace_re || e.namespace_re.test(i.namespace)) && (e.handleObj = i, e.data = i.data, n = ((ot.event.special[i.origType] || {}).handle || i.handler).apply(o.elem, s), void 0 !== n && (e.result = n) === !1 && (e.preventDefault(), e.stopPropagation()));
                        return c.postDispatch && c.postDispatch.call(this, e), e.result
                    }
                },
                handlers: function(e, t) {
                    var n, i, o, r, a = [],
                        s = t.delegateCount,
                        l = e.target;
                    if (s && l.nodeType && (!e.button || "click" !== e.type))
                        for (; l != this; l = l.parentNode || this)
                            if (1 === l.nodeType && (l.disabled !== !0 || "click" !== e.type)) {
                                for (o = [], r = 0; s > r; r++) i = t[r], n = i.selector + " ", void 0 === o[n] && (o[n] = i.needsContext ? ot(n, this).index(l) >= 0 : ot.find(n, this, null, [l]).length), o[n] && o.push(i);
                                o.length && a.push({
                                    elem: l,
                                    handlers: o
                                })
                            }
                    return s < t.length && a.push({
                        elem: this,
                        handlers: t.slice(s)
                    }), a
                },
                fix: function(e) {
                    if (e[ot.expando]) return e;
                    var t, n, i, o = e.type,
                        r = e,
                        a = this.fixHooks[o];
                    for (a || (this.fixHooks[o] = a = It.test(o) ? this.mouseHooks : Nt.test(o) ? this.keyHooks : {}), i = a.props ? this.props.concat(a.props) : this.props, e = new ot.Event(r), t = i.length; t--;) n = i[t], e[n] = r[n];
                    return e.target || (e.target = r.srcElement || ft), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, a.filter ? a.filter(e, r) : e
                },
                props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
                fixHooks: {},
                keyHooks: {
                    props: "char charCode key keyCode".split(" "),
                    filter: function(e, t) {
                        return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
                    }
                },
                mouseHooks: {
                    props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                    filter: function(e, t) {
                        var n, i, o, r = t.button,
                            a = t.fromElement;
                        return null == e.pageX && null != t.clientX && (i = e.target.ownerDocument || ft, o = i.documentElement, n = i.body, e.pageX = t.clientX + (o && o.scrollLeft || n && n.scrollLeft || 0) - (o && o.clientLeft || n && n.clientLeft || 0), e.pageY = t.clientY + (o && o.scrollTop || n && n.scrollTop || 0) - (o && o.clientTop || n && n.clientTop || 0)), !e.relatedTarget && a && (e.relatedTarget = a === e.target ? t.toElement : a), e.which || void 0 === r || (e.which = 1 & r ? 1 : 2 & r ? 3 : 4 & r ? 2 : 0), e
                    }
                },
                special: {
                    load: {
                        noBubble: !0
                    },
                    focus: {
                        trigger: function() {
                            if (this !== f() && this.focus) try {
                                return this.focus(), !1
                            } catch (e) {}
                        },
                        delegateType: "focusin"
                    },
                    blur: {
                        trigger: function() {
                            return this === f() && this.blur ? (this.blur(), !1) : void 0
                        },
                        delegateType: "focusout"
                    },
                    click: {
                        trigger: function() {
                            return ot.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                        },
                        _default: function(e) {
                            return ot.nodeName(e.target, "a")
                        }
                    },
                    beforeunload: {
                        postDispatch: function(e) {
                            void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                        }
                    }
                },
                simulate: function(e, t, n, i) {
                    var o = ot.extend(new ot.Event, n, {
                        type: e,
                        isSimulated: !0,
                        originalEvent: {}
                    });
                    i ? ot.event.trigger(o, null, t) : ot.event.dispatch.call(t, o), o.isDefaultPrevented() && n.preventDefault()
                }
            }, ot.removeEvent = ft.removeEventListener ? function(e, t, n) {
                e.removeEventListener && e.removeEventListener(t, n, !1)
            } : function(e, t, n) {
                var i = "on" + t;
                e.detachEvent && (typeof e[i] === _t && (e[i] = null), e.detachEvent(i, n))
            }, ot.Event = function(e, t) {
                return this instanceof ot.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && e.returnValue === !1 ? p : h) : this.type = e, t && ot.extend(this, t), this.timeStamp = e && e.timeStamp || ot.now(), void(this[ot.expando] = !0)) : new ot.Event(e, t)
            }, ot.Event.prototype = {
                isDefaultPrevented: h,
                isPropagationStopped: h,
                isImmediatePropagationStopped: h,
                preventDefault: function() {
                    var e = this.originalEvent;
                    this.isDefaultPrevented = p, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
                },
                stopPropagation: function() {
                    var e = this.originalEvent;
                    this.isPropagationStopped = p, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
                },
                stopImmediatePropagation: function() {
                    var e = this.originalEvent;
                    this.isImmediatePropagationStopped = p, e && e.stopImmediatePropagation && e.stopImmediatePropagation(), this.stopPropagation()
                }
            }, ot.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout"
            }, function(e, t) {
                ot.event.special[e] = {
                    delegateType: t,
                    bindType: t,
                    handle: function(e) {
                        var n, i = this,
                            o = e.relatedTarget,
                            r = e.handleObj;
                        return (!o || o !== i && !ot.contains(i, o)) && (e.type = r.origType, n = r.handler.apply(this, arguments), e.type = t), n
                    }
                }
            }), nt.submitBubbles || (ot.event.special.submit = {
                setup: function() {
                    return ot.nodeName(this, "form") ? !1 : void ot.event.add(this, "click._submit keypress._submit", function(e) {
                        var t = e.target,
                            n = ot.nodeName(t, "input") || ot.nodeName(t, "button") ? t.form : void 0;
                        n && !ot._data(n, "submitBubbles") && (ot.event.add(n, "submit._submit", function(e) {
                            e._submit_bubble = !0
                        }), ot._data(n, "submitBubbles", !0))
                    })
                },
                postDispatch: function(e) {
                    e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && ot.event.simulate("submit", this.parentNode, e, !0))
                },
                teardown: function() {
                    return ot.nodeName(this, "form") ? !1 : void ot.event.remove(this, "._submit")
                }
            }), nt.changeBubbles || (ot.event.special.change = {
                setup: function() {
                    return Dt.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (ot.event.add(this, "propertychange._change", function(e) {
                        "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
                    }), ot.event.add(this, "click._change", function(e) {
                        this._just_changed && !e.isTrigger && (this._just_changed = !1), ot.event.simulate("change", this, e, !0)
                    })), !1) : void ot.event.add(this, "beforeactivate._change", function(e) {
                        var t = e.target;
                        Dt.test(t.nodeName) && !ot._data(t, "changeBubbles") && (ot.event.add(t, "change._change", function(e) {
                            !this.parentNode || e.isSimulated || e.isTrigger || ot.event.simulate("change", this.parentNode, e, !0)
                        }), ot._data(t, "changeBubbles", !0))
                    })
                },
                handle: function(e) {
                    var t = e.target;
                    return this !== t || e.isSimulated || e.isTrigger || "radio" !== t.type && "checkbox" !== t.type ? e.handleObj.handler.apply(this, arguments) : void 0
                },
                teardown: function() {
                    return ot.event.remove(this, "._change"), !Dt.test(this.nodeName)
                }
            }), nt.focusinBubbles || ot.each({
                focus: "focusin",
                blur: "focusout"
            }, function(e, t) {
                var n = function(e) {
                    ot.event.simulate(t, e.target, ot.event.fix(e), !0)
                };
                ot.event.special[t] = {
                    setup: function() {
                        var i = this.ownerDocument || this,
                            o = ot._data(i, t);
                        o || i.addEventListener(e, n, !0), ot._data(i, t, (o || 0) + 1)
                    },
                    teardown: function() {
                        var i = this.ownerDocument || this,
                            o = ot._data(i, t) - 1;
                        o ? ot._data(i, t, o) : (i.removeEventListener(e, n, !0), ot._removeData(i, t))
                    }
                }
            }), ot.fn.extend({
                on: function(e, t, n, i, o) {
                    var r, a;
                    if ("object" == typeof e) {
                        "string" != typeof t && (n = n || t, t = void 0);
                        for (r in e) this.on(r, t, n, e[r], o);
                        return this
                    }
                    if (null == n && null == i ? (i = t, n = t = void 0) : null == i && ("string" == typeof t ? (i = n, n = void 0) : (i = n, n = t, t = void 0)), i === !1) i = h;
                    else if (!i) return this;
                    return 1 === o && (a = i, i = function(e) {
                        return ot().off(e), a.apply(this, arguments)
                    }, i.guid = a.guid || (a.guid = ot.guid++)), this.each(function() {
                        ot.event.add(this, e, i, n, t)
                    })
                },
                one: function(e, t, n, i) {
                    return this.on(e, t, n, i, 1)
                },
                off: function(e, t, n) {
                    var i, o;
                    if (e && e.preventDefault && e.handleObj) return i = e.handleObj, ot(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                    if ("object" == typeof e) {
                        for (o in e) this.off(o, t, e[o]);
                        return this
                    }
                    return (t === !1 || "function" == typeof t) && (n = t, t = void 0), n === !1 && (n = h), this.each(function() {
                        ot.event.remove(this, e, n, t)
                    })
                },
                trigger: function(e, t) {
                    return this.each(function() {
                        ot.event.trigger(e, t, this)
                    })
                },
                triggerHandler: function(e, t) {
                    var n = this[0];
                    return n ? ot.event.trigger(e, t, n, !0) : void 0
                }
            });
            var Lt = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
                Ht = / jQuery\d+="(?:null|\d+)"/g,
                zt = new RegExp("<(?:" + Lt + ")[\\s/>]", "i"),
                Bt = /^\s+/,
                Pt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
                Rt = /<([\w:]+)/,
                Mt = /<tbody/i,
                Ft = /<|&#?\w+;/,
                Wt = /<(?:script|style|link)/i,
                Ut = /checked\s*(?:[^=]|=\s*.checked.)/i,
                Xt = /^$|\/(?:java|ecma)script/i,
                Jt = /^true\/(.*)/,
                Vt = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
                Qt = {
                    option: [1, "<select multiple='multiple'>", "</select>"],
                    legend: [1, "<fieldset>", "</fieldset>"],
                    area: [1, "<map>", "</map>"],
                    param: [1, "<object>", "</object>"],
                    thead: [1, "<table>", "</table>"],
                    tr: [2, "<table><tbody>", "</tbody></table>"],
                    col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
                    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                    _default: nt.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
                },
                Gt = m(ft),
                Yt = Gt.appendChild(ft.createElement("div"));
            Qt.optgroup = Qt.option, Qt.tbody = Qt.tfoot = Qt.colgroup = Qt.caption = Qt.thead, Qt.th = Qt.td, ot.extend({
                clone: function(e, t, n) {
                    var i, o, r, a, s, l = ot.contains(e.ownerDocument, e);
                    if (nt.html5Clone || ot.isXMLDoc(e) || !zt.test("<" + e.nodeName + ">") ? r = e.cloneNode(!0) : (Yt.innerHTML = e.outerHTML, Yt.removeChild(r = Yt.firstChild)), !(nt.noCloneEvent && nt.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || ot.isXMLDoc(e)))
                        for (i = g(r), s = g(e), a = 0; null != (o = s[a]); ++a) i[a] && _(o, i[a]);
                    if (t)
                        if (n)
                            for (s = s || g(e), i = i || g(r), a = 0; null != (o = s[a]); a++) k(o, i[a]);
                        else k(e, r);
                    return i = g(r, "script"), i.length > 0 && w(i, !l && g(e, "script")), i = s = o = null, r
                },
                buildFragment: function(e, t, n, i) {
                    for (var o, r, a, s, l, c, u, d = e.length, p = m(t), h = [], f = 0; d > f; f++)
                        if (r = e[f], r || 0 === r)
                            if ("object" === ot.type(r)) ot.merge(h, r.nodeType ? [r] : r);
                            else if (Ft.test(r)) {
                        for (s = s || p.appendChild(t.createElement("div")), l = (Rt.exec(r) || ["", ""])[1].toLowerCase(), u = Qt[l] || Qt._default, s.innerHTML = u[1] + r.replace(Pt, "<$1></$2>") + u[2], o = u[0]; o--;) s = s.lastChild;
                        if (!nt.leadingWhitespace && Bt.test(r) && h.push(t.createTextNode(Bt.exec(r)[0])), !nt.tbody)
                            for (r = "table" !== l || Mt.test(r) ? "<table>" !== u[1] || Mt.test(r) ? 0 : s : s.firstChild, o = r && r.childNodes.length; o--;) ot.nodeName(c = r.childNodes[o], "tbody") && !c.childNodes.length && r.removeChild(c);
                        for (ot.merge(h, s.childNodes), s.textContent = ""; s.firstChild;) s.removeChild(s.firstChild);
                        s = p.lastChild
                    } else h.push(t.createTextNode(r));
                    for (s && p.removeChild(s), nt.appendChecked || ot.grep(g(h, "input"), v), f = 0; r = h[f++];)
                        if ((!i || -1 === ot.inArray(r, i)) && (a = ot.contains(r.ownerDocument, r), s = g(p.appendChild(r), "script"), a && w(s), n))
                            for (o = 0; r = s[o++];) Xt.test(r.type || "") && n.push(r);
                    return s = null, p
                },
                cleanData: function(e, t) {
                    for (var n, i, o, r, a = 0, s = ot.expando, l = ot.cache, c = nt.deleteExpando, u = ot.event.special; null != (n = e[a]); a++)
                        if ((t || ot.acceptData(n)) && (o = n[s], r = o && l[o])) {
                            if (r.events)
                                for (i in r.events) u[i] ? ot.event.remove(n, i) : ot.removeEvent(n, i, r.handle);
                            l[o] && (delete l[o], c ? delete n[s] : typeof n.removeAttribute !== _t ? n.removeAttribute(s) : n[s] = null, V.push(o))
                        }
                }
            }), ot.fn.extend({
                text: function(e) {
                    return $t(this, function(e) {
                        return void 0 === e ? ot.text(this) : this.empty().append((this[0] && this[0].ownerDocument || ft).createTextNode(e))
                    }, null, e, arguments.length)
                },
                append: function() {
                    return this.domManip(arguments, function(e) {
                        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                            var t = y(this, e);
                            t.appendChild(e)
                        }
                    })
                },
                prepend: function() {
                    return this.domManip(arguments, function(e) {
                        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                            var t = y(this, e);
                            t.insertBefore(e, t.firstChild)
                        }
                    })
                },
                before: function() {
                    return this.domManip(arguments, function(e) {
                        this.parentNode && this.parentNode.insertBefore(e, this)
                    })
                },
                after: function() {
                    return this.domManip(arguments, function(e) {
                        this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
                    })
                },
                remove: function(e, t) {
                    for (var n, i = e ? ot.filter(e, this) : this, o = 0; null != (n = i[o]); o++) t || 1 !== n.nodeType || ot.cleanData(g(n)), n.parentNode && (t && ot.contains(n.ownerDocument, n) && w(g(n, "script")), n.parentNode.removeChild(n));
                    return this
                },
                empty: function() {
                    for (var e, t = 0; null != (e = this[t]); t++) {
                        for (1 === e.nodeType && ot.cleanData(g(e, !1)); e.firstChild;) e.removeChild(e.firstChild);
                        e.options && ot.nodeName(e, "select") && (e.options.length = 0)
                    }
                    return this
                },
                clone: function(e, t) {
                    return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                        return ot.clone(this, e, t)
                    })
                },
                html: function(e) {
                    return $t(this, function(e) {
                        var t = this[0] || {},
                            n = 0,
                            i = this.length;
                        if (void 0 === e) return 1 === t.nodeType ? t.innerHTML.replace(Ht, "") : void 0;
                        if (!("string" != typeof e || Wt.test(e) || !nt.htmlSerialize && zt.test(e) || !nt.leadingWhitespace && Bt.test(e) || Qt[(Rt.exec(e) || ["", ""])[1].toLowerCase()])) {
                            e = e.replace(Pt, "<$1></$2>");
                            try {
                                for (; i > n; n++) t = this[n] || {}, 1 === t.nodeType && (ot.cleanData(g(t, !1)), t.innerHTML = e);
                                t = 0
                            } catch (o) {}
                        }
                        t && this.empty().append(e)
                    }, null, e, arguments.length)
                },
                replaceWith: function() {
                    var e = arguments[0];
                    return this.domManip(arguments, function(t) {
                        e = this.parentNode, ot.cleanData(g(this)), e && e.replaceChild(t, this)
                    }), e && (e.length || e.nodeType) ? this : this.remove()
                },
                detach: function(e) {
                    return this.remove(e, !0)
                },
                domManip: function(e, t) {
                    e = G.apply([], e);
                    var n, i, o, r, a, s, l = 0,
                        c = this.length,
                        u = this,
                        d = c - 1,
                        p = e[0],
                        h = ot.isFunction(p);
                    if (h || c > 1 && "string" == typeof p && !nt.checkClone && Ut.test(p)) return this.each(function(n) {
                        var i = u.eq(n);
                        h && (e[0] = p.call(this, n, i.html())), i.domManip(e, t)
                    });
                    if (c && (s = ot.buildFragment(e, this[0].ownerDocument, !1, this), n = s.firstChild, 1 === s.childNodes.length && (s = n), n)) {
                        for (r = ot.map(g(s, "script"), b), o = r.length; c > l; l++) i = s, l !== d && (i = ot.clone(i, !0, !0), o && ot.merge(r, g(i, "script"))), t.call(this[l], i, l);
                        if (o)
                            for (a = r[r.length - 1].ownerDocument, ot.map(r, x), l = 0; o > l; l++) i = r[l], Xt.test(i.type || "") && !ot._data(i, "globalEval") && ot.contains(a, i) && (i.src ? ot._evalUrl && ot._evalUrl(i.src) : ot.globalEval((i.text || i.textContent || i.innerHTML || "").replace(Vt, "")));
                        s = n = null
                    }
                    return this
                }
            }), ot.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, function(e, t) {
                ot.fn[e] = function(e) {
                    for (var n, i = 0, o = [], r = ot(e), a = r.length - 1; a >= i; i++) n = i === a ? this : this.clone(!0), ot(r[i])[t](n), Y.apply(o, n.get());
                    return this.pushStack(o)
                }
            });
            var Kt, Zt = {};
            ! function() {
                var e;
                nt.shrinkWrapBlocks = function() {
                    if (null != e) return e;
                    e = !1;
                    var t, n, i;
                    return n = ft.getElementsByTagName("body")[0], n && n.style ? (t = ft.createElement("div"), i = ft.createElement("div"), i.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", n.appendChild(i).appendChild(t), typeof t.style.zoom !== _t && (t.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1", t.appendChild(ft.createElement("div")).style.width = "5px", e = 3 !== t.offsetWidth), n.removeChild(i), e) : void 0
                }
            }();
            var en, tn, nn = /^margin/,
                on = new RegExp("^(" + St + ")(?!px)[a-z%]+$", "i"),
                rn = /^(top|right|bottom|left)$/;
            e.getComputedStyle ? (en = function(t) {
                    return t.ownerDocument.defaultView.opener ? t.ownerDocument.defaultView.getComputedStyle(t, null) : e.getComputedStyle(t, null)
                }, tn = function(e, t, n) {
                    var i, o, r, a, s = e.style;
                    return n = n || en(e), a = n ? n.getPropertyValue(t) || n[t] : void 0, n && ("" !== a || ot.contains(e.ownerDocument, e) || (a = ot.style(e, t)), on.test(a) && nn.test(t) && (i = s.width, o = s.minWidth, r = s.maxWidth, s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = i, s.minWidth = o, s.maxWidth = r)), void 0 === a ? a : a + ""
                }) : ft.documentElement.currentStyle && (en = function(e) {
                    return e.currentStyle
                }, tn = function(e, t, n) {
                    var i, o, r, a, s = e.style;
                    return n = n || en(e), a = n ? n[t] : void 0, null == a && s && s[t] && (a = s[t]), on.test(a) && !rn.test(t) && (i = s.left, o = e.runtimeStyle, r = o && o.left, r && (o.left = e.currentStyle.left), s.left = "fontSize" === t ? "1em" : a, a = s.pixelLeft + "px", s.left = i, r && (o.left = r)), void 0 === a ? a : a + "" || "auto"
                }),
                function() {
                    function t() {
                        var t, n, i, o;
                        n = ft.getElementsByTagName("body")[0], n && n.style && (t = ft.createElement("div"), i = ft.createElement("div"), i.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", n.appendChild(i).appendChild(t), t.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", r = a = !1, l = !0, e.getComputedStyle && (r = "1%" !== (e.getComputedStyle(t, null) || {}).top, a = "4px" === (e.getComputedStyle(t, null) || {
                            width: "4px"
                        }).width, o = t.appendChild(ft.createElement("div")), o.style.cssText = t.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", o.style.marginRight = o.style.width = "0", t.style.width = "1px", l = !parseFloat((e.getComputedStyle(o, null) || {}).marginRight), t.removeChild(o)), t.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", o = t.getElementsByTagName("td"), o[0].style.cssText = "margin:0;border:0;padding:0;display:none", s = 0 === o[0].offsetHeight, s && (o[0].style.display = "", o[1].style.display = "none", s = 0 === o[0].offsetHeight), n.removeChild(i))
                    }
                    var n, i, o, r, a, s, l;
                    n = ft.createElement("div"), n.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", o = n.getElementsByTagName("a")[0], i = o && o.style, i && (i.cssText = "float:left;opacity:.5", nt.opacity = "0.5" === i.opacity, nt.cssFloat = !!i.cssFloat, n.style.backgroundClip = "content-box", n.cloneNode(!0).style.backgroundClip = "", nt.clearCloneStyle = "content-box" === n.style.backgroundClip, nt.boxSizing = "" === i.boxSizing || "" === i.MozBoxSizing || "" === i.WebkitBoxSizing, ot.extend(nt, {
                        reliableHiddenOffsets: function() {
                            return null == s && t(), s
                        },
                        boxSizingReliable: function() {
                            return null == a && t(), a
                        },
                        pixelPosition: function() {
                            return null == r && t(), r
                        },
                        reliableMarginRight: function() {
                            return null == l && t(), l
                        }
                    }))
                }(), ot.swap = function(e, t, n, i) {
                    var o, r, a = {};
                    for (r in t) a[r] = e.style[r], e.style[r] = t[r];
                    o = n.apply(e, i || []);
                    for (r in t) e.style[r] = a[r];
                    return o
                };
            var an = /alpha\([^)]*\)/i,
                sn = /opacity\s*=\s*([^)]*)/,
                ln = /^(none|table(?!-c[ea]).+)/,
                cn = new RegExp("^(" + St + ")(.*)$", "i"),
                un = new RegExp("^([+-])=(" + St + ")", "i"),
                dn = {
                    position: "absolute",
                    visibility: "hidden",
                    display: "block"
                },
                pn = {
                    letterSpacing: "0",
                    fontWeight: "400"
                },
                hn = ["Webkit", "O", "Moz", "ms"];
            ot.extend({
                cssHooks: {
                    opacity: {
                        get: function(e, t) {
                            if (t) {
                                var n = tn(e, "opacity");
                                return "" === n ? "1" : n
                            }
                        }
                    }
                },
                cssNumber: {
                    columnCount: !0,
                    fillOpacity: !0,
                    flexGrow: !0,
                    flexShrink: !0,
                    fontWeight: !0,
                    lineHeight: !0,
                    opacity: !0,
                    order: !0,
                    orphans: !0,
                    widows: !0,
                    zIndex: !0,
                    zoom: !0
                },
                cssProps: {
                    "float": nt.cssFloat ? "cssFloat" : "styleFloat"
                },
                style: function(e, t, n, i) {
                    if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                        var o, r, a, s = ot.camelCase(t),
                            l = e.style;
                        if (t = ot.cssProps[s] || (ot.cssProps[s] = j(l, s)), a = ot.cssHooks[t] || ot.cssHooks[s], void 0 === n) return a && "get" in a && void 0 !== (o = a.get(e, !1, i)) ? o : l[t];
                        if (r = typeof n, "string" === r && (o = un.exec(n)) && (n = (o[1] + 1) * o[2] + parseFloat(ot.css(e, t)), r = "number"), null != n && n === n && ("number" !== r || ot.cssNumber[s] || (n += "px"), nt.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), !(a && "set" in a && void 0 === (n = a.set(e, n, i))))) try {
                            l[t] = n
                        } catch (c) {}
                    }
                },
                css: function(e, t, n, i) {
                    var o, r, a, s = ot.camelCase(t);
                    return t = ot.cssProps[s] || (ot.cssProps[s] = j(e.style, s)), a = ot.cssHooks[t] || ot.cssHooks[s], a && "get" in a && (r = a.get(e, !0, n)), void 0 === r && (r = tn(e, t, i)), "normal" === r && t in pn && (r = pn[t]), "" === n || n ? (o = parseFloat(r), n === !0 || ot.isNumeric(o) ? o || 0 : r) : r
                }
            }), ot.each(["height", "width"], function(e, t) {
                ot.cssHooks[t] = {
                    get: function(e, n, i) {
                        return n ? ln.test(ot.css(e, "display")) && 0 === e.offsetWidth ? ot.swap(e, dn, function() {
                            return D(e, t, i)
                        }) : D(e, t, i) : void 0
                    },
                    set: function(e, n, i) {
                        var o = i && en(e);
                        return $(e, n, i ? O(e, t, i, nt.boxSizing && "border-box" === ot.css(e, "boxSizing", !1, o), o) : 0)
                    }
                }
            }), nt.opacity || (ot.cssHooks.opacity = {
                get: function(e, t) {
                    return sn.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
                },
                set: function(e, t) {
                    var n = e.style,
                        i = e.currentStyle,
                        o = ot.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                        r = i && i.filter || n.filter || "";
                    n.zoom = 1, (t >= 1 || "" === t) && "" === ot.trim(r.replace(an, "")) && n.removeAttribute && (n.removeAttribute("filter"), "" === t || i && !i.filter) || (n.filter = an.test(r) ? r.replace(an, o) : r + " " + o)
                }
            }), ot.cssHooks.marginRight = S(nt.reliableMarginRight, function(e, t) {
                return t ? ot.swap(e, {
                    display: "inline-block"
                }, tn, [e, "marginRight"]) : void 0
            }), ot.each({
                margin: "",
                padding: "",
                border: "Width"
            }, function(e, t) {
                ot.cssHooks[e + t] = {
                    expand: function(n) {
                        for (var i = 0, o = {}, r = "string" == typeof n ? n.split(" ") : [n]; 4 > i; i++) o[e + jt[i] + t] = r[i] || r[i - 2] || r[0];
                        return o
                    }
                }, nn.test(e) || (ot.cssHooks[e + t].set = $)
            }), ot.fn.extend({
                css: function(e, t) {
                    return $t(this, function(e, t, n) {
                        var i, o, r = {},
                            a = 0;
                        if (ot.isArray(t)) {
                            for (i = en(e), o = t.length; o > a; a++) r[t[a]] = ot.css(e, t[a], !1, i);
                            return r
                        }
                        return void 0 !== n ? ot.style(e, t, n) : ot.css(e, t)
                    }, e, t, arguments.length > 1)
                },
                show: function() {
                    return E(this, !0)
                },
                hide: function() {
                    return E(this)
                },
                toggle: function(e) {
                    return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                        Et(this) ? ot(this).show() : ot(this).hide()
                    })
                }
            }), ot.Tween = N, N.prototype = {
                constructor: N,
                init: function(e, t, n, i, o, r) {
                    this.elem = e, this.prop = n, this.easing = o || "swing", this.options = t, this.start = this.now = this.cur(), this.end = i, this.unit = r || (ot.cssNumber[n] ? "" : "px")
                },
                cur: function() {
                    var e = N.propHooks[this.prop];
                    return e && e.get ? e.get(this) : N.propHooks._default.get(this)
                },
                run: function(e) {
                    var t, n = N.propHooks[this.prop];
                    return this.pos = t = this.options.duration ? ot.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : N.propHooks._default.set(this), this
                }
            }, N.prototype.init.prototype = N.prototype, N.propHooks = {
                _default: {
                    get: function(e) {
                        var t;
                        return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = ot.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
                    },
                    set: function(e) {
                        ot.fx.step[e.prop] ? ot.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[ot.cssProps[e.prop]] || ot.cssHooks[e.prop]) ? ot.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
                    }
                }
            }, N.propHooks.scrollTop = N.propHooks.scrollLeft = {
                set: function(e) {
                    e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
                }
            }, ot.easing = {
                linear: function(e) {
                    return e
                },
                swing: function(e) {
                    return .5 - Math.cos(e * Math.PI) / 2
                }
            }, ot.fx = N.prototype.init, ot.fx.step = {};
            var fn, mn, gn = /^(?:toggle|show|hide)$/,
                vn = new RegExp("^(?:([+-])=|)(" + St + ")([a-z%]*)$", "i"),
                yn = /queueHooks$/,
                bn = [L],
                xn = {
                    "*": [function(e, t) {
                        var n = this.createTween(e, t),
                            i = n.cur(),
                            o = vn.exec(t),
                            r = o && o[3] || (ot.cssNumber[e] ? "" : "px"),
                            a = (ot.cssNumber[e] || "px" !== r && +i) && vn.exec(ot.css(n.elem, e)),
                            s = 1,
                            l = 20;
                        if (a && a[3] !== r) {
                            r = r || a[3], o = o || [], a = +i || 1;
                            do s = s || ".5", a /= s, ot.style(n.elem, e, a + r); while (s !== (s = n.cur() / i) && 1 !== s && --l)
                        }
                        return o && (a = n.start = +a || +i || 0, n.unit = r, n.end = o[1] ? a + (o[1] + 1) * o[2] : +o[2]), n
                    }]
                };
            ot.Animation = ot.extend(z, {
                    tweener: function(e, t) {
                        ot.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
                        for (var n, i = 0, o = e.length; o > i; i++) n = e[i], xn[n] = xn[n] || [], xn[n].unshift(t)
                    },
                    prefilter: function(e, t) {
                        t ? bn.unshift(e) : bn.push(e)
                    }
                }), ot.speed = function(e, t, n) {
                    var i = e && "object" == typeof e ? ot.extend({}, e) : {
                        complete: n || !n && t || ot.isFunction(e) && e,
                        duration: e,
                        easing: n && t || t && !ot.isFunction(t) && t
                    };
                    return i.duration = ot.fx.off ? 0 : "number" == typeof i.duration ? i.duration : i.duration in ot.fx.speeds ? ot.fx.speeds[i.duration] : ot.fx.speeds._default, (null == i.queue || i.queue === !0) && (i.queue = "fx"), i.old = i.complete, i.complete = function() {
                        ot.isFunction(i.old) && i.old.call(this), i.queue && ot.dequeue(this, i.queue)
                    }, i
                }, ot.fn.extend({
                    fadeTo: function(e, t, n, i) {
                        return this.filter(Et).css("opacity", 0).show().end().animate({
                            opacity: t
                        }, e, n, i)
                    },
                    animate: function(e, t, n, i) {
                        var o = ot.isEmptyObject(e),
                            r = ot.speed(t, n, i),
                            a = function() {
                                var t = z(this, ot.extend({}, e), r);
                                (o || ot._data(this, "finish")) && t.stop(!0)
                            };
                        return a.finish = a, o || r.queue === !1 ? this.each(a) : this.queue(r.queue, a)
                    },
                    stop: function(e, t, n) {
                        var i = function(e) {
                            var t = e.stop;
                            delete e.stop, t(n)
                        };
                        return "string" != typeof e && (n = t, t = e, e = void 0), t && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                            var t = !0,
                                o = null != e && e + "queueHooks",
                                r = ot.timers,
                                a = ot._data(this);
                            if (o) a[o] && a[o].stop && i(a[o]);
                            else
                                for (o in a) a[o] && a[o].stop && yn.test(o) && i(a[o]);
                            for (o = r.length; o--;) r[o].elem !== this || null != e && r[o].queue !== e || (r[o].anim.stop(n), t = !1, r.splice(o, 1));
                            (t || !n) && ot.dequeue(this, e)
                        })
                    },
                    finish: function(e) {
                        return e !== !1 && (e = e || "fx"), this.each(function() {
                            var t, n = ot._data(this),
                                i = n[e + "queue"],
                                o = n[e + "queueHooks"],
                                r = ot.timers,
                                a = i ? i.length : 0;
                            for (n.finish = !0, ot.queue(this, e, []), o && o.stop && o.stop.call(this, !0), t = r.length; t--;) r[t].elem === this && r[t].queue === e && (r[t].anim.stop(!0), r.splice(t, 1));
                            for (t = 0; a > t; t++) i[t] && i[t].finish && i[t].finish.call(this);
                            delete n.finish
                        })
                    }
                }), ot.each(["toggle", "show", "hide"], function(e, t) {
                    var n = ot.fn[t];
                    ot.fn[t] = function(e, i, o) {
                        return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(q(t, !0), e, i, o)
                    }
                }), ot.each({
                    slideDown: q("show"),
                    slideUp: q("hide"),
                    slideToggle: q("toggle"),
                    fadeIn: {
                        opacity: "show"
                    },
                    fadeOut: {
                        opacity: "hide"
                    },
                    fadeToggle: {
                        opacity: "toggle"
                    }
                }, function(e, t) {
                    ot.fn[e] = function(e, n, i) {
                        return this.animate(t, e, n, i)
                    }
                }), ot.timers = [], ot.fx.tick = function() {
                    var e, t = ot.timers,
                        n = 0;
                    for (fn = ot.now(); n < t.length; n++) e = t[n], e() || t[n] !== e || t.splice(n--, 1);
                    t.length || ot.fx.stop(), fn = void 0
                }, ot.fx.timer = function(e) {
                    ot.timers.push(e), e() ? ot.fx.start() : ot.timers.pop()
                }, ot.fx.interval = 13, ot.fx.start = function() {
                    mn || (mn = setInterval(ot.fx.tick, ot.fx.interval))
                }, ot.fx.stop = function() {
                    clearInterval(mn), mn = null
                }, ot.fx.speeds = {
                    slow: 600,
                    fast: 200,
                    _default: 400
                }, ot.fn.delay = function(e, t) {
                    return e = ot.fx ? ot.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                        var i = setTimeout(t, e);
                        n.stop = function() {
                            clearTimeout(i)
                        }
                    })
                },
                function() {
                    var e, t, n, i, o;
                    t = ft.createElement("div"), t.setAttribute("className", "t"), t.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", i = t.getElementsByTagName("a")[0], n = ft.createElement("select"), o = n.appendChild(ft.createElement("option")), e = t.getElementsByTagName("input")[0], i.style.cssText = "top:1px", nt.getSetAttribute = "t" !== t.className, nt.style = /top/.test(i.getAttribute("style")), nt.hrefNormalized = "/a" === i.getAttribute("href"), nt.checkOn = !!e.value, nt.optSelected = o.selected, nt.enctype = !!ft.createElement("form").enctype, n.disabled = !0, nt.optDisabled = !o.disabled, e = ft.createElement("input"), e.setAttribute("value", ""), nt.input = "" === e.getAttribute("value"), e.value = "t", e.setAttribute("type", "radio"), nt.radioValue = "t" === e.value
                }();
            var wn = /\r/g;
            ot.fn.extend({
                val: function(e) {
                    var t, n, i, o = this[0]; {
                        if (arguments.length) return i = ot.isFunction(e), this.each(function(n) {
                            var o;
                            1 === this.nodeType && (o = i ? e.call(this, n, ot(this).val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : ot.isArray(o) && (o = ot.map(o, function(e) {
                                return null == e ? "" : e + ""
                            })), t = ot.valHooks[this.type] || ot.valHooks[this.nodeName.toLowerCase()], t && "set" in t && void 0 !== t.set(this, o, "value") || (this.value = o))
                        });
                        if (o) return t = ot.valHooks[o.type] || ot.valHooks[o.nodeName.toLowerCase()], t && "get" in t && void 0 !== (n = t.get(o, "value")) ? n : (n = o.value, "string" == typeof n ? n.replace(wn, "") : null == n ? "" : n)
                    }
                }
            }), ot.extend({
                valHooks: {
                    option: {
                        get: function(e) {
                            var t = ot.find.attr(e, "value");
                            return null != t ? t : ot.trim(ot.text(e))
                        }
                    },
                    select: {
                        get: function(e) {
                            for (var t, n, i = e.options, o = e.selectedIndex, r = "select-one" === e.type || 0 > o, a = r ? null : [], s = r ? o + 1 : i.length, l = 0 > o ? s : r ? o : 0; s > l; l++)
                                if (n = i[l], !(!n.selected && l !== o || (nt.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && ot.nodeName(n.parentNode, "optgroup"))) {
                                    if (t = ot(n).val(), r) return t;
                                    a.push(t)
                                }
                            return a
                        },
                        set: function(e, t) {
                            for (var n, i, o = e.options, r = ot.makeArray(t), a = o.length; a--;)
                                if (i = o[a], ot.inArray(ot.valHooks.option.get(i), r) >= 0) try {
                                    i.selected = n = !0
                                } catch (s) {
                                    i.scrollHeight
                                } else i.selected = !1;
                            return n || (e.selectedIndex = -1), o
                        }
                    }
                }
            }), ot.each(["radio", "checkbox"], function() {
                ot.valHooks[this] = {
                    set: function(e, t) {
                        return ot.isArray(t) ? e.checked = ot.inArray(ot(e).val(), t) >= 0 : void 0
                    }
                }, nt.checkOn || (ot.valHooks[this].get = function(e) {
                    return null === e.getAttribute("value") ? "on" : e.value
                })
            });
            var kn, _n, Cn = ot.expr.attrHandle,
                Tn = /^(?:checked|selected)$/i,
                Sn = nt.getSetAttribute,
                jn = nt.input;
            ot.fn.extend({
                attr: function(e, t) {
                    return $t(this, ot.attr, e, t, arguments.length > 1)
                },
                removeAttr: function(e) {
                    return this.each(function() {
                        ot.removeAttr(this, e)
                    })
                }
            }), ot.extend({
                attr: function(e, t, n) {
                    var i, o, r = e.nodeType;
                    if (e && 3 !== r && 8 !== r && 2 !== r) return typeof e.getAttribute === _t ? ot.prop(e, t, n) : (1 === r && ot.isXMLDoc(e) || (t = t.toLowerCase(), i = ot.attrHooks[t] || (ot.expr.match.bool.test(t) ? _n : kn)), void 0 === n ? i && "get" in i && null !== (o = i.get(e, t)) ? o : (o = ot.find.attr(e, t), null == o ? void 0 : o) : null !== n ? i && "set" in i && void 0 !== (o = i.set(e, n, t)) ? o : (e.setAttribute(t, n + ""), n) : void ot.removeAttr(e, t))
                },
                removeAttr: function(e, t) {
                    var n, i, o = 0,
                        r = t && t.match(bt);
                    if (r && 1 === e.nodeType)
                        for (; n = r[o++];) i = ot.propFix[n] || n, ot.expr.match.bool.test(n) ? jn && Sn || !Tn.test(n) ? e[i] = !1 : e[ot.camelCase("default-" + n)] = e[i] = !1 : ot.attr(e, n, ""), e.removeAttribute(Sn ? n : i)
                },
                attrHooks: {
                    type: {
                        set: function(e, t) {
                            if (!nt.radioValue && "radio" === t && ot.nodeName(e, "input")) {
                                var n = e.value;
                                return e.setAttribute("type", t), n && (e.value = n), t
                            }
                        }
                    }
                }
            }), _n = {
                set: function(e, t, n) {
                    return t === !1 ? ot.removeAttr(e, n) : jn && Sn || !Tn.test(n) ? e.setAttribute(!Sn && ot.propFix[n] || n, n) : e[ot.camelCase("default-" + n)] = e[n] = !0, n
                }
            }, ot.each(ot.expr.match.bool.source.match(/\w+/g), function(e, t) {
                var n = Cn[t] || ot.find.attr;
                Cn[t] = jn && Sn || !Tn.test(t) ? function(e, t, i) {
                    var o, r;
                    return i || (r = Cn[t], Cn[t] = o, o = null != n(e, t, i) ? t.toLowerCase() : null, Cn[t] = r), o
                } : function(e, t, n) {
                    return n ? void 0 : e[ot.camelCase("default-" + t)] ? t.toLowerCase() : null
                }
            }), jn && Sn || (ot.attrHooks.value = {
                set: function(e, t, n) {
                    return ot.nodeName(e, "input") ? void(e.defaultValue = t) : kn && kn.set(e, t, n)
                }
            }), Sn || (kn = {
                set: function(e, t, n) {
                    var i = e.getAttributeNode(n);
                    return i || e.setAttributeNode(i = e.ownerDocument.createAttribute(n)), i.value = t += "", "value" === n || t === e.getAttribute(n) ? t : void 0
                }
            }, Cn.id = Cn.name = Cn.coords = function(e, t, n) {
                var i;
                return n ? void 0 : (i = e.getAttributeNode(t)) && "" !== i.value ? i.value : null
            }, ot.valHooks.button = {
                get: function(e, t) {
                    var n = e.getAttributeNode(t);
                    return n && n.specified ? n.value : void 0
                },
                set: kn.set
            }, ot.attrHooks.contenteditable = {
                set: function(e, t, n) {
                    kn.set(e, "" === t ? !1 : t, n)
                }
            }, ot.each(["width", "height"], function(e, t) {
                ot.attrHooks[t] = {
                    set: function(e, n) {
                        return "" === n ? (e.setAttribute(t, "auto"), n) : void 0
                    }
                }
            })), nt.style || (ot.attrHooks.style = {
                get: function(e) {
                    return e.style.cssText || void 0
                },
                set: function(e, t) {
                    return e.style.cssText = t + ""
                }
            });
            var En = /^(?:input|select|textarea|button|object)$/i,
                $n = /^(?:a|area)$/i;
            ot.fn.extend({
                prop: function(e, t) {
                    return $t(this, ot.prop, e, t, arguments.length > 1)
                },
                removeProp: function(e) {
                    return e = ot.propFix[e] || e, this.each(function() {
                        try {
                            this[e] = void 0, delete this[e]
                        } catch (t) {}
                    })
                }
            }), ot.extend({
                propFix: {
                    "for": "htmlFor",
                    "class": "className"
                },
                prop: function(e, t, n) {
                    var i, o, r, a = e.nodeType;
                    if (e && 3 !== a && 8 !== a && 2 !== a) return r = 1 !== a || !ot.isXMLDoc(e), r && (t = ot.propFix[t] || t, o = ot.propHooks[t]), void 0 !== n ? o && "set" in o && void 0 !== (i = o.set(e, n, t)) ? i : e[t] = n : o && "get" in o && null !== (i = o.get(e, t)) ? i : e[t]
                },
                propHooks: {
                    tabIndex: {
                        get: function(e) {
                            var t = ot.find.attr(e, "tabindex");
                            return t ? parseInt(t, 10) : En.test(e.nodeName) || $n.test(e.nodeName) && e.href ? 0 : -1
                        }
                    }
                }
            }), nt.hrefNormalized || ot.each(["href", "src"], function(e, t) {
                ot.propHooks[t] = {
                    get: function(e) {
                        return e.getAttribute(t, 4)
                    }
                }
            }), nt.optSelected || (ot.propHooks.selected = {
                get: function(e) {
                    var t = e.parentNode;
                    return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
                }
            }), ot.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
                ot.propFix[this.toLowerCase()] = this
            }), nt.enctype || (ot.propFix.enctype = "encoding");
            var On = /[\t\r\n\f]/g;
            ot.fn.extend({
                addClass: function(e) {
                    var t, n, i, o, r, a, s = 0,
                        l = this.length,
                        c = "string" == typeof e && e;
                    if (ot.isFunction(e)) return this.each(function(t) {
                        ot(this).addClass(e.call(this, t, this.className))
                    });
                    if (c)
                        for (t = (e || "").match(bt) || []; l > s; s++)
                            if (n = this[s], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(On, " ") : " ")) {
                                for (r = 0; o = t[r++];) i.indexOf(" " + o + " ") < 0 && (i += o + " ");
                                a = ot.trim(i), n.className !== a && (n.className = a)
                            }
                    return this
                },
                removeClass: function(e) {
                    var t, n, i, o, r, a, s = 0,
                        l = this.length,
                        c = 0 === arguments.length || "string" == typeof e && e;
                    if (ot.isFunction(e)) return this.each(function(t) {
                        ot(this).removeClass(e.call(this, t, this.className))
                    });
                    if (c)
                        for (t = (e || "").match(bt) || []; l > s; s++)
                            if (n = this[s], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(On, " ") : "")) {
                                for (r = 0; o = t[r++];)
                                    for (; i.indexOf(" " + o + " ") >= 0;) i = i.replace(" " + o + " ", " ");
                                a = e ? ot.trim(i) : "", n.className !== a && (n.className = a)
                            }
                    return this
                },
                toggleClass: function(e, t) {
                    var n = typeof e;
                    return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : this.each(ot.isFunction(e) ? function(n) {
                        ot(this).toggleClass(e.call(this, n, this.className, t), t)
                    } : function() {
                        if ("string" === n)
                            for (var t, i = 0, o = ot(this), r = e.match(bt) || []; t = r[i++];) o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                        else(n === _t || "boolean" === n) && (this.className && ot._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : ot._data(this, "__className__") || "")
                    })
                },
                hasClass: function(e) {
                    for (var t = " " + e + " ", n = 0, i = this.length; i > n; n++)
                        if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(On, " ").indexOf(t) >= 0) return !0;
                    return !1
                }
            }), ot.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
                ot.fn[t] = function(e, n) {
                    return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
                }
            }), ot.fn.extend({
                hover: function(e, t) {
                    return this.mouseenter(e).mouseleave(t || e)
                },
                bind: function(e, t, n) {
                    return this.on(e, null, t, n)
                },
                unbind: function(e, t) {
                    return this.off(e, null, t)
                },
                delegate: function(e, t, n, i) {
                    return this.on(t, e, n, i)
                },
                undelegate: function(e, t, n) {
                    return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                }
            });
            var Dn = ot.now(),
                Nn = /\?/,
                In = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
            ot.parseJSON = function(t) {
                if (e.JSON && e.JSON.parse) return e.JSON.parse(t + "");
                var n, i = null,
                    o = ot.trim(t + "");
                return o && !ot.trim(o.replace(In, function(e, t, o, r) {
                    return n && t && (i = 0), 0 === i ? e : (n = o || t, i += !r - !o, "")
                })) ? Function("return " + o)() : ot.error("Invalid JSON: " + t)
            }, ot.parseXML = function(t) {
                var n, i;
                if (!t || "string" != typeof t) return null;
                try {
                    e.DOMParser ? (i = new DOMParser, n = i.parseFromString(t, "text/xml")) : (n = new ActiveXObject("Microsoft.XMLDOM"), n.async = "false", n.loadXML(t))
                } catch (o) {
                    n = void 0
                }
                return n && n.documentElement && !n.getElementsByTagName("parsererror").length || ot.error("Invalid XML: " + t), n
            };
            var qn, An, Ln = /#.*$/,
                Hn = /([?&])_=[^&]*/,
                zn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
                Bn = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
                Pn = /^(?:GET|HEAD)$/,
                Rn = /^\/\//,
                Mn = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
                Fn = {},
                Wn = {},
                Un = "*/".concat("*");
            try {
                An = location.href
            } catch (Xn) {
                An = ft.createElement("a"), An.href = "", An = An.href
            }
            qn = Mn.exec(An.toLowerCase()) || [], ot.extend({
                active: 0,
                lastModified: {},
                etag: {},
                ajaxSettings: {
                    url: An,
                    type: "GET",
                    isLocal: Bn.test(qn[1]),
                    global: !0,
                    processData: !0,
                    async: !0,
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    accepts: {
                        "*": Un,
                        text: "text/plain",
                        html: "text/html",
                        xml: "application/xml, text/xml",
                        json: "application/json, text/javascript"
                    },
                    contents: {
                        xml: /xml/,
                        html: /html/,
                        json: /json/
                    },
                    responseFields: {
                        xml: "responseXML",
                        text: "responseText",
                        json: "responseJSON"
                    },
                    converters: {
                        "* text": String,
                        "text html": !0,
                        "text json": ot.parseJSON,
                        "text xml": ot.parseXML
                    },
                    flatOptions: {
                        url: !0,
                        context: !0
                    }
                },
                ajaxSetup: function(e, t) {
                    return t ? R(R(e, ot.ajaxSettings), t) : R(ot.ajaxSettings, e)
                },
                ajaxPrefilter: B(Fn),
                ajaxTransport: B(Wn),
                ajax: function(e, t) {
                    function n(e, t, n, i) {
                        var o, u, v, y, x, k = t;
                        2 !== b && (b = 2, s && clearTimeout(s), c = void 0, a = i || "", w.readyState = e > 0 ? 4 : 0, o = e >= 200 && 300 > e || 304 === e, n && (y = M(d, w, n)), y = F(d, y, w, o), o ? (d.ifModified && (x = w.getResponseHeader("Last-Modified"), x && (ot.lastModified[r] = x), x = w.getResponseHeader("etag"), x && (ot.etag[r] = x)), 204 === e || "HEAD" === d.type ? k = "nocontent" : 304 === e ? k = "notmodified" : (k = y.state, u = y.data, v = y.error, o = !v)) : (v = k, (e || !k) && (k = "error", 0 > e && (e = 0))), w.status = e, w.statusText = (t || k) + "", o ? f.resolveWith(p, [u, k, w]) : f.rejectWith(p, [w, k, v]), w.statusCode(g), g = void 0, l && h.trigger(o ? "ajaxSuccess" : "ajaxError", [w, d, o ? u : v]), m.fireWith(p, [w, k]), l && (h.trigger("ajaxComplete", [w, d]), --ot.active || ot.event.trigger("ajaxStop")))
                    }
                    "object" == typeof e && (t = e, e = void 0), t = t || {};
                    var i, o, r, a, s, l, c, u, d = ot.ajaxSetup({}, t),
                        p = d.context || d,
                        h = d.context && (p.nodeType || p.jquery) ? ot(p) : ot.event,
                        f = ot.Deferred(),
                        m = ot.Callbacks("once memory"),
                        g = d.statusCode || {},
                        v = {},
                        y = {},
                        b = 0,
                        x = "canceled",
                        w = {
                            readyState: 0,
                            getResponseHeader: function(e) {
                                var t;
                                if (2 === b) {
                                    if (!u)
                                        for (u = {}; t = zn.exec(a);) u[t[1].toLowerCase()] = t[2];
                                    t = u[e.toLowerCase()]
                                }
                                return null == t ? null : t
                            },
                            getAllResponseHeaders: function() {
                                return 2 === b ? a : null
                            },
                            setRequestHeader: function(e, t) {
                                var n = e.toLowerCase();
                                return b || (e = y[n] = y[n] || e, v[e] = t), this
                            },
                            overrideMimeType: function(e) {
                                return b || (d.mimeType = e), this
                            },
                            statusCode: function(e) {
                                var t;
                                if (e)
                                    if (2 > b)
                                        for (t in e) g[t] = [g[t], e[t]];
                                    else w.always(e[w.status]);
                                return this
                            },
                            abort: function(e) {
                                var t = e || x;
                                return c && c.abort(t), n(0, t), this
                            }
                        };
                    if (f.promise(w).complete = m.add, w.success = w.done, w.error = w.fail, d.url = ((e || d.url || An) + "").replace(Ln, "").replace(Rn, qn[1] + "//"), d.type = t.method || t.type || d.method || d.type, d.dataTypes = ot.trim(d.dataType || "*").toLowerCase().match(bt) || [""], null == d.crossDomain && (i = Mn.exec(d.url.toLowerCase()), d.crossDomain = !(!i || i[1] === qn[1] && i[2] === qn[2] && (i[3] || ("http:" === i[1] ? "80" : "443")) === (qn[3] || ("http:" === qn[1] ? "80" : "443")))), d.data && d.processData && "string" != typeof d.data && (d.data = ot.param(d.data, d.traditional)), P(Fn, d, t, w), 2 === b) return w;
                    l = ot.event && d.global, l && 0 === ot.active++ && ot.event.trigger("ajaxStart"), d.type = d.type.toUpperCase(), d.hasContent = !Pn.test(d.type), r = d.url, d.hasContent || (d.data && (r = d.url += (Nn.test(r) ? "&" : "?") + d.data, delete d.data), d.cache === !1 && (d.url = Hn.test(r) ? r.replace(Hn, "$1_=" + Dn++) : r + (Nn.test(r) ? "&" : "?") + "_=" + Dn++)), d.ifModified && (ot.lastModified[r] && w.setRequestHeader("If-Modified-Since", ot.lastModified[r]), ot.etag[r] && w.setRequestHeader("If-None-Match", ot.etag[r])), (d.data && d.hasContent && d.contentType !== !1 || t.contentType) && w.setRequestHeader("Content-Type", d.contentType), w.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + Un + "; q=0.01" : "") : d.accepts["*"]);
                    for (o in d.headers) w.setRequestHeader(o, d.headers[o]);
                    if (d.beforeSend && (d.beforeSend.call(p, w, d) === !1 || 2 === b)) return w.abort();
                    x = "abort";
                    for (o in {
                            success: 1,
                            error: 1,
                            complete: 1
                        }) w[o](d[o]);
                    if (c = P(Wn, d, t, w)) {
                        w.readyState = 1, l && h.trigger("ajaxSend", [w, d]), d.async && d.timeout > 0 && (s = setTimeout(function() {
                            w.abort("timeout")
                        }, d.timeout));
                        try {
                            b = 1, c.send(v, n)
                        } catch (k) {
                            if (!(2 > b)) throw k;
                            n(-1, k)
                        }
                    } else n(-1, "No Transport");
                    return w
                },
                getJSON: function(e, t, n) {
                    return ot.get(e, t, n, "json")
                },
                getScript: function(e, t) {
                    return ot.get(e, void 0, t, "script")
                }
            }), ot.each(["get", "post"], function(e, t) {
                ot[t] = function(e, n, i, o) {
                    return ot.isFunction(n) && (o = o || i, i = n, n = void 0), ot.ajax({
                        url: e,
                        type: t,
                        dataType: o,
                        data: n,
                        success: i
                    })
                }
            }), ot._evalUrl = function(e) {
                return ot.ajax({
                    url: e,
                    type: "GET",
                    dataType: "script",
                    async: !1,
                    global: !1,
                    "throws": !0
                })
            }, ot.fn.extend({
                wrapAll: function(e) {
                    if (ot.isFunction(e)) return this.each(function(t) {
                        ot(this).wrapAll(e.call(this, t))
                    });
                    if (this[0]) {
                        var t = ot(e, this[0].ownerDocument).eq(0).clone(!0);
                        this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                            for (var e = this; e.firstChild && 1 === e.firstChild.nodeType;) e = e.firstChild;
                            return e
                        }).append(this)
                    }
                    return this
                },
                wrapInner: function(e) {
                    return this.each(ot.isFunction(e) ? function(t) {
                        ot(this).wrapInner(e.call(this, t))
                    } : function() {
                        var t = ot(this),
                            n = t.contents();
                        n.length ? n.wrapAll(e) : t.append(e)
                    })
                },
                wrap: function(e) {
                    var t = ot.isFunction(e);
                    return this.each(function(n) {
                        ot(this).wrapAll(t ? e.call(this, n) : e)
                    })
                },
                unwrap: function() {
                    return this.parent().each(function() {
                        ot.nodeName(this, "body") || ot(this).replaceWith(this.childNodes)
                    }).end()
                }
            }), ot.expr.filters.hidden = function(e) {
                return e.offsetWidth <= 0 && e.offsetHeight <= 0 || !nt.reliableHiddenOffsets() && "none" === (e.style && e.style.display || ot.css(e, "display"))
            }, ot.expr.filters.visible = function(e) {
                return !ot.expr.filters.hidden(e)
            };
            var Jn = /%20/g,
                Vn = /\[\]$/,
                Qn = /\r?\n/g,
                Gn = /^(?:submit|button|image|reset|file)$/i,
                Yn = /^(?:input|select|textarea|keygen)/i;
            ot.param = function(e, t) {
                var n, i = [],
                    o = function(e, t) {
                        t = ot.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
                    };
                if (void 0 === t && (t = ot.ajaxSettings && ot.ajaxSettings.traditional), ot.isArray(e) || e.jquery && !ot.isPlainObject(e)) ot.each(e, function() {
                    o(this.name, this.value)
                });
                else
                    for (n in e) W(n, e[n], t, o);
                return i.join("&").replace(Jn, "+")
            }, ot.fn.extend({
                serialize: function() {
                    return ot.param(this.serializeArray())
                },
                serializeArray: function() {
                    return this.map(function() {
                        var e = ot.prop(this, "elements");
                        return e ? ot.makeArray(e) : this
                    }).filter(function() {
                        var e = this.type;
                        return this.name && !ot(this).is(":disabled") && Yn.test(this.nodeName) && !Gn.test(e) && (this.checked || !Ot.test(e))
                    }).map(function(e, t) {
                        var n = ot(this).val();
                        return null == n ? null : ot.isArray(n) ? ot.map(n, function(e) {
                            return {
                                name: t.name,
                                value: e.replace(Qn, "\r\n")
                            }
                        }) : {
                            name: t.name,
                            value: n.replace(Qn, "\r\n")
                        }
                    }).get()
                }
            }), ot.ajaxSettings.xhr = void 0 !== e.ActiveXObject ? function() {
                return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && U() || X()
            } : U;
            var Kn = 0,
                Zn = {},
                ei = ot.ajaxSettings.xhr();
            e.attachEvent && e.attachEvent("onunload", function() {
                for (var e in Zn) Zn[e](void 0, !0)
            }), nt.cors = !!ei && "withCredentials" in ei, ei = nt.ajax = !!ei, ei && ot.ajaxTransport(function(e) {
                if (!e.crossDomain || nt.cors) {
                    var t;
                    return {
                        send: function(n, i) {
                            var o, r = e.xhr(),
                                a = ++Kn;
                            if (r.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)
                                for (o in e.xhrFields) r[o] = e.xhrFields[o];
                            e.mimeType && r.overrideMimeType && r.overrideMimeType(e.mimeType), e.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest");
                            for (o in n) void 0 !== n[o] && r.setRequestHeader(o, n[o] + "");
                            r.send(e.hasContent && e.data || null), t = function(n, o) {
                                var s, l, c;
                                if (t && (o || 4 === r.readyState))
                                    if (delete Zn[a], t = void 0, r.onreadystatechange = ot.noop, o) 4 !== r.readyState && r.abort();
                                    else {
                                        c = {}, s = r.status, "string" == typeof r.responseText && (c.text = r.responseText);
                                        try {
                                            l = r.statusText
                                        } catch (u) {
                                            l = ""
                                        }
                                        s || !e.isLocal || e.crossDomain ? 1223 === s && (s = 204) : s = c.text ? 200 : 404
                                    }
                                c && i(s, l, c, r.getAllResponseHeaders())
                            }, e.async ? 4 === r.readyState ? setTimeout(t) : r.onreadystatechange = Zn[a] = t : t()
                        },
                        abort: function() {
                            t && t(void 0, !0)
                        }
                    }
                }
            }), ot.ajaxSetup({
                accepts: {
                    script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
                },
                contents: {
                    script: /(?:java|ecma)script/
                },
                converters: {
                    "text script": function(e) {
                        return ot.globalEval(e), e
                    }
                }
            }), ot.ajaxPrefilter("script", function(e) {
                void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
            }), ot.ajaxTransport("script", function(e) {
                if (e.crossDomain) {
                    var t, n = ft.head || ot("head")[0] || ft.documentElement;
                    return {
                        send: function(i, o) {
                            t = ft.createElement("script"), t.async = !0, e.scriptCharset && (t.charset = e.scriptCharset), t.src = e.url, t.onload = t.onreadystatechange = function(e, n) {
                                (n || !t.readyState || /loaded|complete/.test(t.readyState)) && (t.onload = t.onreadystatechange = null, t.parentNode && t.parentNode.removeChild(t), t = null, n || o(200, "success"))
                            }, n.insertBefore(t, n.firstChild)
                        },
                        abort: function() {
                            t && t.onload(void 0, !0)
                        }
                    }
                }
            });
            var ti = [],
                ni = /(=)\?(?=&|$)|\?\?/;
            ot.ajaxSetup({
                jsonp: "callback",
                jsonpCallback: function() {
                    var e = ti.pop() || ot.expando + "_" + Dn++;
                    return this[e] = !0, e
                }
            }), ot.ajaxPrefilter("json jsonp", function(t, n, i) {
                var o, r, a, s = t.jsonp !== !1 && (ni.test(t.url) ? "url" : "string" == typeof t.data && !(t.contentType || "").indexOf("application/x-www-form-urlencoded") && ni.test(t.data) && "data");
                return s || "jsonp" === t.dataTypes[0] ? (o = t.jsonpCallback = ot.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, s ? t[s] = t[s].replace(ni, "$1" + o) : t.jsonp !== !1 && (t.url += (Nn.test(t.url) ? "&" : "?") + t.jsonp + "=" + o), t.converters["script json"] = function() {
                    return a || ot.error(o + " was not called"), a[0]
                }, t.dataTypes[0] = "json", r = e[o], e[o] = function() {
                    a = arguments
                }, i.always(function() {
                    e[o] = r, t[o] && (t.jsonpCallback = n.jsonpCallback, ti.push(o)), a && ot.isFunction(r) && r(a[0]), a = r = void 0
                }), "script") : void 0
            }), ot.parseHTML = function(e, t, n) {
                if (!e || "string" != typeof e) return null;
                "boolean" == typeof t && (n = t, t = !1), t = t || ft;
                var i = dt.exec(e),
                    o = !n && [];
                return i ? [t.createElement(i[1])] : (i = ot.buildFragment([e], t, o), o && o.length && ot(o).remove(), ot.merge([], i.childNodes))
            };
            var ii = ot.fn.load;
            ot.fn.load = function(e, t, n) {
                if ("string" != typeof e && ii) return ii.apply(this, arguments);
                var i, o, r, a = this,
                    s = e.indexOf(" ");
                return s >= 0 && (i = ot.trim(e.slice(s, e.length)), e = e.slice(0, s)), ot.isFunction(t) ? (n = t, t = void 0) : t && "object" == typeof t && (r = "POST"), a.length > 0 && ot.ajax({
                    url: e,
                    type: r,
                    dataType: "html",
                    data: t
                }).done(function(e) {
                    o = arguments, a.html(i ? ot("<div>").append(ot.parseHTML(e)).find(i) : e)
                }).complete(n && function(e, t) {
                    a.each(n, o || [e.responseText, t, e])
                }), this
            }, ot.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
                ot.fn[t] = function(e) {
                    return this.on(t, e)
                }
            }), ot.expr.filters.animated = function(e) {
                return ot.grep(ot.timers, function(t) {
                    return e === t.elem
                }).length
            };
            var oi = e.document.documentElement;
            ot.offset = {
                setOffset: function(e, t, n) {
                    var i, o, r, a, s, l, c, u = ot.css(e, "position"),
                        d = ot(e),
                        p = {};
                    "static" === u && (e.style.position = "relative"), s = d.offset(), r = ot.css(e, "top"), l = ot.css(e, "left"), c = ("absolute" === u || "fixed" === u) && ot.inArray("auto", [r, l]) > -1, c ? (i = d.position(), a = i.top, o = i.left) : (a = parseFloat(r) || 0, o = parseFloat(l) || 0), ot.isFunction(t) && (t = t.call(e, n, s)), null != t.top && (p.top = t.top - s.top + a), null != t.left && (p.left = t.left - s.left + o), "using" in t ? t.using.call(e, p) : d.css(p)
                }
            }, ot.fn.extend({
                offset: function(e) {
                    if (arguments.length) return void 0 === e ? this : this.each(function(t) {
                        ot.offset.setOffset(this, e, t)
                    });
                    var t, n, i = {
                            top: 0,
                            left: 0
                        },
                        o = this[0],
                        r = o && o.ownerDocument;
                    if (r) return t = r.documentElement, ot.contains(t, o) ? (typeof o.getBoundingClientRect !== _t && (i = o.getBoundingClientRect()), n = J(r), {
                        top: i.top + (n.pageYOffset || t.scrollTop) - (t.clientTop || 0),
                        left: i.left + (n.pageXOffset || t.scrollLeft) - (t.clientLeft || 0)
                    }) : i
                },
                position: function() {
                    if (this[0]) {
                        var e, t, n = {
                                top: 0,
                                left: 0
                            },
                            i = this[0];
                        return "fixed" === ot.css(i, "position") ? t = i.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), ot.nodeName(e[0], "html") || (n = e.offset()), n.top += ot.css(e[0], "borderTopWidth", !0), n.left += ot.css(e[0], "borderLeftWidth", !0)), {
                            top: t.top - n.top - ot.css(i, "marginTop", !0),
                            left: t.left - n.left - ot.css(i, "marginLeft", !0)
                        }
                    }
                },
                offsetParent: function() {
                    return this.map(function() {
                        for (var e = this.offsetParent || oi; e && !ot.nodeName(e, "html") && "static" === ot.css(e, "position");) e = e.offsetParent;
                        return e || oi
                    })
                }
            }), ot.each({
                scrollLeft: "pageXOffset",
                scrollTop: "pageYOffset"
            }, function(e, t) {
                var n = /Y/.test(t);
                ot.fn[e] = function(i) {
                    return $t(this, function(e, i, o) {
                        var r = J(e);
                        return void 0 === o ? r ? t in r ? r[t] : r.document.documentElement[i] : e[i] : void(r ? r.scrollTo(n ? ot(r).scrollLeft() : o, n ? o : ot(r).scrollTop()) : e[i] = o)
                    }, e, i, arguments.length, null)
                }
            }), ot.each(["top", "left"], function(e, t) {
                ot.cssHooks[t] = S(nt.pixelPosition, function(e, n) {
                    return n ? (n = tn(e, t), on.test(n) ? ot(e).position()[t] + "px" : n) : void 0
                })
            }), ot.each({
                Height: "height",
                Width: "width"
            }, function(e, t) {
                ot.each({
                    padding: "inner" + e,
                    content: t,
                    "": "outer" + e
                }, function(n, i) {
                    ot.fn[i] = function(i, o) {
                        var r = arguments.length && (n || "boolean" != typeof i),
                            a = n || (i === !0 || o === !0 ? "margin" : "border");
                        return $t(this, function(t, n, i) {
                            var o;
                            return ot.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement, Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? ot.css(t, n, a) : ot.style(t, n, i, a)
                        }, t, r ? i : void 0, r, null)
                    }
                })
            }), ot.fn.size = function() {
                return this.length
            }, ot.fn.andSelf = ot.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function() {
                return ot
            });
            var ri = e.jQuery,
                ai = e.$;
            return ot.noConflict = function(t) {
                return e.$ === ot && (e.$ = ai), t && e.jQuery === ot && (e.jQuery = ri), ot
            }, typeof t === _t && (e.jQuery = e.$ = ot), ot
        }),
        function(e) {
            if ("function" == typeof define && define.amd) define("js-cookie", e);
            else if ("object" == typeof exports) module.exports = e();
            else {
                var t = window.Cookies,
                    n = window.Cookies = e();
                n.noConflict = function() {
                    return window.Cookies = t, n
                }
            }
        }(function() {
            function e() {
                for (var e = 0, t = {}; e < arguments.length; e++) {
                    var n = arguments[e];
                    for (var i in n) t[i] = n[i]
                }
                return t
            }

            function t(n) {
                function i(t, o, r) {
                    var a;
                    if (arguments.length > 1) {
                        if (r = e({
                                path: "/"
                            }, i.defaults, r), "number" == typeof r.expires) {
                            var s = new Date;
                            s.setMilliseconds(s.getMilliseconds() + 864e5 * r.expires), r.expires = s
                        }
                        try {
                            a = JSON.stringify(o), /^[\{\[]/.test(a) && (o = a)
                        } catch (l) {}
                        return o = encodeURIComponent(String(o)), o = o.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), t = encodeURIComponent(String(t)), t = t.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent), t = t.replace(/[\(\)]/g, escape), document.cookie = [t, "=", o, r.expires && "; expires=" + r.expires.toUTCString(), r.path && "; path=" + r.path, r.domain && "; domain=" + r.domain, r.secure ? "; secure" : ""].join("")
                    }
                    t || (a = {});
                    for (var c = document.cookie ? document.cookie.split("; ") : [], u = /(%[0-9A-Z]{2})+/g, d = 0; d < c.length; d++) {
                        var p = c[d].split("="),
                            h = p[0].replace(u, decodeURIComponent),
                            f = p.slice(1).join("=");
                        '"' === f.charAt(0) && (f = f.slice(1, -1));
                        try {
                            if (f = n && n(f, h) || f.replace(u, decodeURIComponent), this.json) try {
                                f = JSON.parse(f)
                            } catch (l) {}
                            if (t === h) {
                                a = f;
                                break
                            }
                            t || (a[h] = f)
                        } catch (l) {}
                    }
                    return a
                }
                return i.get = i.set = i, i.getJSON = function() {
                    return i.apply({
                        json: !0
                    }, [].slice.call(arguments))
                }, i.defaults = {}, i.remove = function(t, n) {
                    i(t, "", e(n, {
                        expires: -1
                    }))
                }, i.withConverter = t, i
            }
            return t()
        }), define("components/track", ["require"], function() {
            "use strict";
            var e, t = {},
                n = function(e, t, n) {
                    var i = [e, t];
                    return n && i.push(n), i.join(":")
                },
                i = function() {
                    $(".track-tag").each(function() {
                        e.event("Content", "Tag", $(this).data("track-tag-label"))
                    })
                };
            return {
                page: function(e, t) {
                    ga("send", {
                        hitType: "pageview",
                        page: e,
                        title: t
                    })
                },
                event: function(e, t, n, i) {
                    ga("send", "event", e, t, n, i)
                },
                transaction: function() {},
                startTiming: function(e, i, o) {
                    t[n(e, i, o)] = (new Date).getTime()
                },
                haveTiming: function(e, i, o) {
                    return "number" == typeof t[n(e, i, o)]
                },
                clearTiming: function(e, i, o) {
                    delete t[n(e, i, o)]
                },
                stopTiming: function(e, i, o) {
                    var r = t[n(e, i, o)];
                    "number" == typeof r && ga("send", "timing", e, i, (new Date).getTime() - r, o), this.clearTiming(e, i, o)
                },
                user: function(e) {
                    ga("set", "userId", e)
                },
                init: function() {
                    e = this, i()
                }
            }
        }),
        function(e) {
            "function" == typeof define && define.amd ? define("sticky", ["jquery"], e) : "object" == typeof module && module.exports ? module.exports = e(require("jquery")) : e(jQuery)
        }(function(e) {
            var t = Array.prototype.slice,
                n = Array.prototype.splice,
                i = {
                    topSpacing: 0,
                    bottomSpacing: 0,
                    className: "is-sticky",
                    wrapperClassName: "sticky-wrapper",
                    center: !1,
                    getWidthFrom: "",
                    widthFromWrapper: !0,
                    responsiveWidth: !1
                },
                o = e(window),
                r = e(document),
                a = [],
                s = o.height(),
                l = function() {
                    for (var t = o.scrollTop(), n = r.height(), i = n - s, l = t > i ? i - t : 0, c = 0, u = a.length; u > c; c++) {
                        var d = a[c],
                            p = d.stickyWrapper.offset().top,
                            h = p - d.topSpacing - l;
                        if (d.stickyWrapper.css("height", d.stickyElement.outerHeight()), h >= t) null !== d.currentTop && (d.stickyElement.css({
                            width: "",
                            position: "",
                            top: ""
                        }), d.stickyElement.parent().removeClass(d.className), d.stickyElement.trigger("sticky-end", [d]), d.currentTop = null);
                        else {
                            var f = n - d.stickyElement.outerHeight() - d.topSpacing - d.bottomSpacing - t - l;
                            if (0 > f ? f += d.topSpacing : f = d.topSpacing, d.currentTop !== f) {
                                var m;
                                d.getWidthFrom ? m = e(d.getWidthFrom).width() || null : d.widthFromWrapper && (m = d.stickyWrapper.width()), null == m && (m = d.stickyElement.width()), d.stickyElement.css("width", m).css("position", "fixed").css("top", f), d.stickyElement.parent().addClass(d.className), null === d.currentTop ? d.stickyElement.trigger("sticky-start", [d]) : d.stickyElement.trigger("sticky-update", [d]), d.currentTop === d.topSpacing && d.currentTop > f || null === d.currentTop && f < d.topSpacing ? d.stickyElement.trigger("sticky-bottom-reached", [d]) : null !== d.currentTop && f === d.topSpacing && d.currentTop < f && d.stickyElement.trigger("sticky-bottom-unreached", [d]), d.currentTop = f
                            }
                        }
                    }
                },
                c = function() {
                    s = o.height();
                    for (var t = 0, n = a.length; n > t; t++) {
                        var i = a[t],
                            r = null;
                        i.getWidthFrom ? i.responsiveWidth && (r = e(i.getWidthFrom).width()) : i.widthFromWrapper && (r = i.stickyWrapper.width()), null != r && i.stickyElement.css("width", r)
                    }
                },
                u = {
                    init: function(t) {
                        var n = e.extend({}, i, t);
                        return this.each(function() {
                            var t = e(this),
                                o = t.attr("id"),
                                r = t.outerHeight(),
                                s = o ? o + "-" + i.wrapperClassName : i.wrapperClassName,
                                l = e("<div></div>").attr("id", s).addClass(n.wrapperClassName);
                            t.wrapAll(l);
                            var c = t.parent();
                            n.center && c.css({
                                width: t.outerWidth(),
                                marginLeft: "auto",
                                marginRight: "auto"
                            }), "right" === t.css("float") && t.css({
                                "float": "none"
                            }).parent().css({
                                "float": "right"
                            }), c.css("height", r), n.stickyElement = t, n.stickyWrapper = c, n.currentTop = null, a.push(n)
                        })
                    },
                    update: l,
                    unstick: function() {
                        return this.each(function() {
                            for (var t = this, i = e(t), o = -1, r = a.length; r-- > 0;) a[r].stickyElement.get(0) === t && (n.call(a, r, 1), o = r); - 1 !== o && (i.unwrap(), i.css({
                                width: "",
                                position: "",
                                top: "",
                                "float": ""
                            }))
                        })
                    }
                };
            window.addEventListener ? (window.addEventListener("scroll", l, !1), window.addEventListener("resize", c, !1)) : window.attachEvent && (window.attachEvent("onscroll", l), window.attachEvent("onresize", c)), e.fn.sticky = function(n) {
                return u[n] ? u[n].apply(this, t.call(arguments, 1)) : "object" != typeof n && n ? void e.error("Method " + n + " does not exist on jQuery.sticky") : u.init.apply(this, arguments)
            }, e.fn.unstick = function(n) {
                return u[n] ? u[n].apply(this, t.call(arguments, 1)) : "object" != typeof n && n ? void e.error("Method " + n + " does not exist on jQuery.sticky") : u.unstick.apply(this, arguments)
            }, e(function() {
                setTimeout(l, 0)
            })
        }), define("components/util", ["require"], function() {
            "use strict";
            var e = function(e) {
                    switch (e) {
                        case 0:
                            return "Chủ Nhật";
                        case 1:
                            return "Thứ Hai";
                        case 2:
                            return "Thứ Ba";
                        case 3:
                            return "Thứ Tư";
                        case 4:
                            return "Thứ Năm";
                        case 5:
                            return "Thứ Sáu";
                        case 6:
                            return "Thứ Bảy"
                    }
                },
                t = function(e) {
                    return e * (Math.PI / 180)
                };
            return {
                truncate: function(e, t, n) {
                    var i = e.length > t,
                        o = i ? e.substr(0, t - 1) : e;
                    return o = n && i ? o.substr(0, o.lastIndexOf(" ")) : o, i ? o + "&hellip;" : o
                },
                datetimeObjectToUiDay: function(t) {
                    return e(t.getDay())
                },
                datetimeObjectToUiDate: function(e) {
                    return ("0" + e.getDate()).slice(-2) + "-" + ("0" + (e.getMonth() + 1)).slice(-2) + "-" + e.getFullYear()
                },
                datetimeObjectToUiShortDate: function(e) {
                    return ("0" + e.getDate()).slice(-2) + "-" + ("0" + (e.getMonth() + 1)).slice(-2)
                },
                datetimeObjectToUiTime: function(e) {
                    return ("0" + e.getHours()).slice(-2) + "h" + ("0" + e.getMinutes()).slice(-2)
                },
                datetimeObjectToUiFullDateTime: function(e) {
                    return ("0" + e.getHours()).slice(-2) + "h" + ("0" + e.getMinutes()).slice(-2) + " " + ("0" + e.getDate()).slice(-2) + "-" + ("0" + (e.getMonth() + 1)).slice(-2) + "-" + e.getFullYear()
                },
                getParamValue: function(e, t) {
                    t || (t = window.location.href), e = e.replace(/[\[\]]/g, "\\$&");
                    var n = new RegExp("[?&]" + e + "(=([^&#]*)|&|#|$)"),
                        i = n.exec(t);
                    return i ? i[2] ? decodeURIComponent(i[2].replace(/\+/g, " ")) : "" : null
                },
                isTouchDevice: function() {
                    return "ontouchstart" in window || navigator.MaxTouchPoints > 0 || navigator.msMaxTouchPoints > 0
                },
                getDistanceFromLatLonInKm: function(e, n, i, o) {
                    var r = 6371,
                        a = t(i - e),
                        s = t(o - n),
                        l = Math.sin(a / 2) * Math.sin(a / 2) + Math.cos(t(e)) * Math.cos(t(i)) * Math.sin(s / 2) * Math.sin(s / 2),
                        c = 2 * Math.atan2(Math.sqrt(l), Math.sqrt(1 - l)),
                        u = r * c;
                    return u.toFixed(1)
                },
                addParamToUrl: function(e, t, n, i) {
                    var o, r, a = !0;
                    if (e.indexOf("#") > 0) {
                        var s = e.indexOf("#");
                        o = e.substring(e.indexOf("#"), e.length)
                    } else o = "", s = e.length;
                    r = e.substring(0, s);
                    var l = r.split("?"),
                        c = "";
                    if (l.length > 1)
                        for (var u = l[1].split("&"), d = 0; d < u.length; d++) {
                            var p = u[d].split("=");
                            a && p[0] == t || ("" == c ? c = "?" : c += "&", c += p[0] + "=" + (p[1] ? p[1] : ""))
                        }
                    return "" == c && (c = "?"), i ? c = "?" + t + "=" + n + (c.length > 1 ? "&" + c.substring(1) : "") : ("" !== c && "?" != c && (c += "&"), c += t + "=" + (n ? n : "")), l[0] + c + o
                },
                removeParamFromUrl: function(e, t) {
                    var n = e.split("?");
                    if (n.length >= 2) {
                        for (var i = encodeURIComponent(t) + "=", o = n[1].split(/[&;]/g), r = o.length; r-- > 0;) - 1 !== o[r].lastIndexOf(i, 0) && o.splice(r, 1);
                        return e = n[0] + (o.length > 0 ? "?" + o.join("&") : "")
                    }
                    return e
                },
                removeElemFromArray: function(e) {
                    for (var t, n, i = arguments, o = i.length; o > 1 && e.length;)
                        for (t = i[--o]; - 1 !== (n = e.indexOf(t));) e.splice(n, 1);
                    return e
                },
                removeVnAccents: function(e) {
                    return e = e.normalize("NFKC"), e = e.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/gi, "a"), e = e.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ë)/gi, "e"), e = e.replace(/(ì|í|ị|ỉ|ĩ)/gi, "i"), e = e.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/gi, "o"), e = e.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/gi, "u"), e = e.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/gi, "y"), e = e.replace(/(đ)/gi, "d")
                },
                scrollTo: function(e, t, n) {
                    n || (n = $("html, body")), n.animate({
                        scrollTop: e
                    }, t)
                }
            }
        }), define("components/map", ["require", "sticky", "components/util"], function(e) {
            "use strict";
            e("sticky");
            var t, n = e("components/util"),
                i = 500,
                o = function(e) {
                    return {
                        zoom: 16,
                        center: new google.maps.LatLng(e.lat, e["long"]),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: !1,
                        mapTypeControl: !1,
                        streetViewControl: !1
                    }
                },
                r = function() {
                    t = parseInt($("header").height())
                },
                a = function() {
                    $(window).on("resize", function() {
                        var e = window.getComputedStyle($("body").get(0), ":after").content;
                        $("#list aside .map, #collection-detail aside .map").each(e.search("no-sticky-map") > -1 ? function() {
                            $(this).unstick()
                        } : function() {
                            $(this).parent().hasClass("sticky-wrapper") || $(this).sticky({
                                topSpacing: parseInt($("header").height()) + parseInt($(this).closest("aside").css("padding-top").replace("px", "")),
                                bottomSpacing: parseInt($("footer").outerHeight()) + parseInt($(this).closest("aside").css("padding-bottom").replace("px", ""))
                            })
                        })
                    }).trigger("resize")
                },
                s = function(e) {
                    var o = $(".has-map-marker").removeClass("active"),
                        r = o.filter('[data-map-marker="' + e + '"]').addClass("active");
                    n.scrollTo(r.offset().top - t, i)
                },
                l = function(e, t) {
                    var i = $(".has-map-marker");
                    n.isTouchDevice() || i.hover(function() {
                        for (var n = 0; n < t.length; n++) t[n].markerObject.infowindow.close();
                        i.removeClass("active");
                        for (var o = $(this).attr("data-map-marker"), n = 0; n < t.length; n++) t[n].id == o && t[n].markerObject.infowindow.open(e, t[n].markerObject)
                    }, function() {
                        var e = $(".has-map-marker").index(this);
                        t[e].markerObject.setIcon(), t[e].markerObject.infowindow.close()
                    })
                };
            return {
                init: function() {
                    0 != $(".map").size() && (r(), $("body").append($('<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&callback=initMap" />')), window.initMap = function() {
                        $(".map").each(function() {
                            var e = $(this).find("script");
                            if (0 != e.size()) {
                                var t = JSON.parse(e.text());
                                if (!t || 0 == t.length) return void $(this).html("");
                                var n, i = $(this).get(0),
                                    r = new google.maps.Map(i, o(t[0])),
                                    a = new google.maps.LatLngBounds,
                                    c = [];
                                $.each(t, function(e, t) {
                                    if (!isNaN(parseFloat(t.lat)) && !isNaN(parseFloat(t["long"]))) {
                                        var i = new google.maps.Marker({
                                            map: r,
                                            position: new google.maps.LatLng(t.lat, t["long"])
                                        });
                                        i.infowindow = new google.maps.InfoWindow({
                                            content: "<b>" + t.name + "</b><br/>" + t.address
                                        }), a.extend(i.position), google.maps.event.addListener(i, "click", function() {
                                            for (var e = 0; e < c.length; e++) c[e].markerObject.infowindow.close();
                                            i.infowindow.open(r, i), s(t.id)
                                        }), n = i, c.push({
                                            id: t.id,
                                            markerObject: i
                                        })
                                    }
                                }), t.length > 1 ? r.fitBounds(a) : 1 == t.length && n.infowindow.open(r, n), l(r, c)
                            }
                        }).addClass("rendered")
                    }, a())
                }
            }
        }), define("components/nav", ["require"], function() {
            "use strict";
            var e = function() {
                    $("header .search-toggle").click(function(e) {
                        $("header").toggleClass("showing-search"), e.preventDefault()
                    })
                },
                t = function() {
                    $("header .sidenav-trigger, header .sidenav").on("click", function(e) {
                        $("header .sidenav").toggleClass("active"), e.preventDefault()
                    }), $("header .sidenav nav").on("click", function(e) {
                        e.stopPropagation()
                    })
                },
                n = function() {
                    var e = $(window).scrollTop(),
                        t = $("body"),
                        n = $("header").height();
                    $(window).scroll(function() {
                        var i = $(this).scrollTop();
                        i > e && i > n ? t.addClass("header-collapsed") : t.hasClass("header-collapsed") && t.removeClass("header-collapsed"), e = i
                    })
                };
            return {
                init: function() {
                    t(), e(), n()
                }
            }
        }), define("components/sticky-nav", ["require", "sticky"], function(e) {
            "use strict";
            e("sticky");
            var t = function(e) {
                e.sticky({
                    topSpacing: parseInt($("header").height())
                })
            };
            return {
                init: function() {
                    $(".sticky-nav").each(function() {
                        t($(this))
                    }), $(".sticky-nav-link").click(function(e) {
                        $('.sticky-nav [href="' + $(this).attr("href") + '"]').click(), e.preventDefault()
                    })
                }
            }
        }), ! function(e, t, n, i) {
            function o(t, n) {
                this.settings = null, this.options = e.extend({}, o.Defaults, n), this.$element = e(t), this._handlers = {}, this._plugins = {}, this._supress = {}, this._current = null, this._speed = null, this._coordinates = [], this._breakpoint = null, this._width = null, this._items = [], this._clones = [], this._mergers = [], this._widths = [], this._invalidated = {}, this._pipe = [], this._drag = {
                    time: null,
                    target: null,
                    pointer: null,
                    stage: {
                        start: null,
                        current: null
                    },
                    direction: null
                }, this._states = {
                    current: {},
                    tags: {
                        initializing: ["busy"],
                        animating: ["busy"],
                        dragging: ["interacting"]
                    }
                }, e.each(["onResize", "onThrottledResize"], e.proxy(function(t, n) {
                    this._handlers[n] = e.proxy(this[n], this)
                }, this)), e.each(o.Plugins, e.proxy(function(e, t) {
                    this._plugins[e.charAt(0).toLowerCase() + e.slice(1)] = new t(this)
                }, this)), e.each(o.Workers, e.proxy(function(t, n) {
                    this._pipe.push({
                        filter: n.filter,
                        run: e.proxy(n.run, this)
                    })
                }, this)), this.setup(), this.initialize()
            }
            o.Defaults = {
                items: 3,
                loop: !1,
                center: !1,
                rewind: !1,
                mouseDrag: !0,
                touchDrag: !0,
                pullDrag: !0,
                freeDrag: !1,
                margin: 0,
                stagePadding: 0,
                merge: !1,
                mergeFit: !0,
                autoWidth: !1,
                startPosition: 0,
                rtl: !1,
                smartSpeed: 250,
                fluidSpeed: !1,
                dragEndSpeed: !1,
                responsive: {},
                responsiveRefreshRate: 200,
                responsiveBaseElement: t,
                fallbackEasing: "swing",
                info: !1,
                nestedItemSelector: !1,
                itemElement: "div",
                stageElement: "div",
                refreshClass: "owl-refresh",
                loadedClass: "owl-loaded",
                loadingClass: "owl-loading",
                rtlClass: "owl-rtl",
                responsiveClass: "owl-responsive",
                dragClass: "owl-drag",
                itemClass: "owl-item",
                stageClass: "owl-stage",
                stageOuterClass: "owl-stage-outer",
                grabClass: "owl-grab"
            }, o.Width = {
                Default: "default",
                Inner: "inner",
                Outer: "outer"
            }, o.Type = {
                Event: "event",
                State: "state"
            }, o.Plugins = {}, o.Workers = [{
                filter: ["width", "settings"],
                run: function() {
                    this._width = this.$element.width()
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(e) {
                    e.current = this._items && this._items[this.relative(this._current)]
                }
            }, {
                filter: ["items", "settings"],
                run: function() {
                    this.$stage.children(".cloned").remove()
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(e) {
                    var t = this.settings.margin || "",
                        n = !this.settings.autoWidth,
                        i = this.settings.rtl,
                        o = {
                            width: "auto",
                            "margin-left": i ? t : "",
                            "margin-right": i ? "" : t
                        };
                    !n && this.$stage.children().css(o), e.css = o
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(e) {
                    var t = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
                        n = null,
                        i = this._items.length,
                        o = !this.settings.autoWidth,
                        r = [];
                    for (e.items = {
                            merge: !1,
                            width: t
                        }; i--;) n = this._mergers[i], n = this.settings.mergeFit && Math.min(n, this.settings.items) || n, e.items.merge = n > 1 || e.items.merge, r[i] = o ? t * n : this._items[i].width();
                    this._widths = r
                }
            }, {
                filter: ["items", "settings"],
                run: function() {
                    var t = [],
                        n = this._items,
                        i = this.settings,
                        o = Math.max(2 * i.items, 4),
                        r = 2 * Math.ceil(n.length / 2),
                        a = i.loop && n.length ? i.rewind ? o : Math.max(o, r) : 0,
                        s = "",
                        l = "";
                    for (a /= 2; a--;) t.push(this.normalize(t.length / 2, !0)), s += n[t[t.length - 1]][0].outerHTML, t.push(this.normalize(n.length - 1 - (t.length - 1) / 2, !0)), l = n[t[t.length - 1]][0].outerHTML + l;
                    this._clones = t, e(s).addClass("cloned").appendTo(this.$stage), e(l).addClass("cloned").prependTo(this.$stage)
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function() {
                    for (var e = this.settings.rtl ? 1 : -1, t = this._clones.length + this._items.length, n = -1, i = 0, o = 0, r = []; ++n < t;) i = r[n - 1] || 0, o = this._widths[this.relative(n)] + this.settings.margin, r.push(i + o * e);
                    this._coordinates = r
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function() {
                    var e = this.settings.stagePadding,
                        t = this._coordinates,
                        n = {
                            width: Math.ceil(Math.abs(t[t.length - 1])) + 2 * e,
                            "padding-left": e || "",
                            "padding-right": e || ""
                        };
                    this.$stage.css(n)
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(e) {
                    var t = this._coordinates.length,
                        n = !this.settings.autoWidth,
                        i = this.$stage.children();
                    if (n && e.items.merge)
                        for (; t--;) e.css.width = this._widths[this.relative(t)], i.eq(t).css(e.css);
                    else n && (e.css.width = e.items.width, i.css(e.css))
                }
            }, {
                filter: ["items"],
                run: function() {
                    this._coordinates.length < 1 && this.$stage.removeAttr("style")
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(e) {
                    e.current = e.current ? this.$stage.children().index(e.current) : 0, e.current = Math.max(this.minimum(), Math.min(this.maximum(), e.current)), this.reset(e.current)
                }
            }, {
                filter: ["position"],
                run: function() {
                    this.animate(this.coordinates(this._current))
                }
            }, {
                filter: ["width", "position", "items", "settings"],
                run: function() {
                    var e, t, n, i, o = this.settings.rtl ? 1 : -1,
                        r = 2 * this.settings.stagePadding,
                        a = this.coordinates(this.current()) + r,
                        s = a + this.width() * o,
                        l = [];
                    for (n = 0, i = this._coordinates.length; i > n; n++) e = this._coordinates[n - 1] || 0, t = Math.abs(this._coordinates[n]) + r * o, (this.op(e, "<=", a) && this.op(e, ">", s) || this.op(t, "<", a) && this.op(t, ">", s)) && l.push(n);
                    this.$stage.children(".active").removeClass("active"), this.$stage.children(":eq(" + l.join("), :eq(") + ")").addClass("active"), this.settings.center && (this.$stage.children(".center").removeClass("center"), this.$stage.children().eq(this.current()).addClass("center"))
                }
            }], o.prototype.initialize = function() {
                if (this.enter("initializing"), this.trigger("initialize"), this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl), this.settings.autoWidth && !this.is("pre-loading")) {
                    var t, n, o;
                    t = this.$element.find("img"), n = this.settings.nestedItemSelector ? "." + this.settings.nestedItemSelector : i, o = this.$element.children(n).width(), t.length && 0 >= o && this.preloadAutoWidthImages(t)
                }
                this.$element.addClass(this.options.loadingClass), this.$stage = e("<" + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>').wrap('<div class="' + this.settings.stageOuterClass + '"/>'), this.$element.append(this.$stage.parent()), this.replace(this.$element.children().not(this.$stage.parent())), this.$element.is(":visible") ? this.refresh() : this.invalidate("width"), this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass), this.registerEventHandlers(), this.leave("initializing"), this.trigger("initialized")
            }, o.prototype.setup = function() {
                var t = this.viewport(),
                    n = this.options.responsive,
                    i = -1,
                    o = null;
                n ? (e.each(n, function(e) {
                    t >= e && e > i && (i = Number(e))
                }), o = e.extend({}, this.options, n[i]), "function" == typeof o.stagePadding && (o.stagePadding = o.stagePadding()), delete o.responsive, o.responsiveClass && this.$element.attr("class", this.$element.attr("class").replace(new RegExp("(" + this.options.responsiveClass + "-)\\S+\\s", "g"), "$1" + i))) : o = e.extend({}, this.options), this.trigger("change", {
                    property: {
                        name: "settings",
                        value: o
                    }
                }), this._breakpoint = i, this.settings = o, this.invalidate("settings"), this.trigger("changed", {
                    property: {
                        name: "settings",
                        value: this.settings
                    }
                })
            }, o.prototype.optionsLogic = function() {
                this.settings.autoWidth && (this.settings.stagePadding = !1, this.settings.merge = !1)
            }, o.prototype.prepare = function(t) {
                var n = this.trigger("prepare", {
                    content: t
                });
                return n.data || (n.data = e("<" + this.settings.itemElement + "/>").addClass(this.options.itemClass).append(t)), this.trigger("prepared", {
                    content: n.data
                }), n.data
            }, o.prototype.update = function() {
                for (var t = 0, n = this._pipe.length, i = e.proxy(function(e) {
                        return this[e]
                    }, this._invalidated), o = {}; n > t;)(this._invalidated.all || e.grep(this._pipe[t].filter, i).length > 0) && this._pipe[t].run(o), t++;
                this._invalidated = {}, !this.is("valid") && this.enter("valid")
            }, o.prototype.width = function(e) {
                switch (e = e || o.Width.Default) {
                    case o.Width.Inner:
                    case o.Width.Outer:
                        return this._width;
                    default:
                        return this._width - 2 * this.settings.stagePadding + this.settings.margin
                }
            }, o.prototype.refresh = function() {
                this.enter("refreshing"), this.trigger("refresh"), this.setup(), this.optionsLogic(), this.$element.addClass(this.options.refreshClass), this.update(), this.$element.removeClass(this.options.refreshClass), this.leave("refreshing"), this.trigger("refreshed")
            }, o.prototype.onThrottledResize = function() {
                t.clearTimeout(this.resizeTimer), this.resizeTimer = t.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate)
            }, o.prototype.onResize = function() {
                return this._items.length ? this._width === this.$element.width() ? !1 : this.$element.is(":visible") ? (this.enter("resizing"), this.trigger("resize").isDefaultPrevented() ? (this.leave("resizing"), !1) : (this.invalidate("width"), this.refresh(), this.leave("resizing"), void this.trigger("resized"))) : !1 : !1
            }, o.prototype.registerEventHandlers = function() {
                e.support.transition && this.$stage.on(e.support.transition.end + ".owl.core", e.proxy(this.onTransitionEnd, this)), this.settings.responsive !== !1 && this.on(t, "resize", this._handlers.onThrottledResize), this.settings.mouseDrag && (this.$element.addClass(this.options.dragClass), this.$stage.on("mousedown.owl.core", e.proxy(this.onDragStart, this)), this.$stage.on("dragstart.owl.core selectstart.owl.core", function() {
                    return !1
                })), this.settings.touchDrag && (this.$stage.on("touchstart.owl.core", e.proxy(this.onDragStart, this)), this.$stage.on("touchcancel.owl.core", e.proxy(this.onDragEnd, this)))
            }, o.prototype.onDragStart = function(t) {
                var i = null;
                3 !== t.which && (e.support.transform ? (i = this.$stage.css("transform").replace(/.*\(|\)| /g, "").split(","), i = {
                    x: i[16 === i.length ? 12 : 4],
                    y: i[16 === i.length ? 13 : 5]
                }) : (i = this.$stage.position(), i = {
                    x: this.settings.rtl ? i.left + this.$stage.width() - this.width() + this.settings.margin : i.left,
                    y: i.top
                }), this.is("animating") && (e.support.transform ? this.animate(i.x) : this.$stage.stop(), this.invalidate("position")), this.$element.toggleClass(this.options.grabClass, "mousedown" === t.type), this.speed(0), this._drag.time = (new Date).getTime(), this._drag.target = e(t.target), this._drag.stage.start = i, this._drag.stage.current = i, this._drag.pointer = this.pointer(t), e(n).on("mouseup.owl.core touchend.owl.core", e.proxy(this.onDragEnd, this)), e(n).one("mousemove.owl.core touchmove.owl.core", e.proxy(function(t) {
                    var i = this.difference(this._drag.pointer, this.pointer(t));
                    e(n).on("mousemove.owl.core touchmove.owl.core", e.proxy(this.onDragMove, this)), Math.abs(i.x) < Math.abs(i.y) && this.is("valid") || (t.preventDefault(), this.enter("dragging"), this.trigger("drag"))
                }, this)))
            }, o.prototype.onDragMove = function(e) {
                var t = null,
                    n = null,
                    i = null,
                    o = this.difference(this._drag.pointer, this.pointer(e)),
                    r = this.difference(this._drag.stage.start, o);
                this.is("dragging") && (e.preventDefault(), this.settings.loop ? (t = this.coordinates(this.minimum()), n = this.coordinates(this.maximum() + 1) - t, r.x = ((r.x - t) % n + n) % n + t) : (t = this.coordinates(this.settings.rtl ? this.maximum() : this.minimum()), n = this.coordinates(this.settings.rtl ? this.minimum() : this.maximum()), i = this.settings.pullDrag ? -1 * o.x / 5 : 0, r.x = Math.max(Math.min(r.x, t + i), n + i)), this._drag.stage.current = r, this.animate(r.x))
            }, o.prototype.onDragEnd = function(t) {
                var i = this.difference(this._drag.pointer, this.pointer(t)),
                    o = this._drag.stage.current,
                    r = i.x > 0 ^ this.settings.rtl ? "left" : "right";
                e(n).off(".owl.core"), this.$element.removeClass(this.options.grabClass), (0 !== i.x && this.is("dragging") || !this.is("valid")) && (this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed), this.current(this.closest(o.x, 0 !== i.x ? r : this._drag.direction)), this.invalidate("position"), this.update(), this._drag.direction = r, (Math.abs(i.x) > 3 || (new Date).getTime() - this._drag.time > 300) && this._drag.target.one("click.owl.core", function() {
                    return !1
                })), this.is("dragging") && (this.leave("dragging"), this.trigger("dragged"))
            }, o.prototype.closest = function(t, n) {
                var i = -1,
                    o = 30,
                    r = this.width(),
                    a = this.coordinates();
                return this.settings.freeDrag || e.each(a, e.proxy(function(e, s) {
                    return "left" === n && t > s - o && s + o > t ? i = e : "right" === n && t > s - r - o && s - r + o > t ? i = e + 1 : this.op(t, "<", s) && this.op(t, ">", a[e + 1] || s - r) && (i = "left" === n ? e + 1 : e), -1 === i
                }, this)), this.settings.loop || (this.op(t, ">", a[this.minimum()]) ? i = t = this.minimum() : this.op(t, "<", a[this.maximum()]) && (i = t = this.maximum())), i
            }, o.prototype.animate = function(t) {
                var n = this.speed() > 0;
                this.is("animating") && this.onTransitionEnd(), n && (this.enter("animating"), this.trigger("translate")), e.support.transform3d && e.support.transition ? this.$stage.css({
                    transform: "translate3d(" + t + "px,0px,0px)",
                    transition: this.speed() / 1e3 + "s"
                }) : n ? this.$stage.animate({
                    left: t + "px"
                }, this.speed(), this.settings.fallbackEasing, e.proxy(this.onTransitionEnd, this)) : this.$stage.css({
                    left: t + "px"
                })
            }, o.prototype.is = function(e) {
                return this._states.current[e] && this._states.current[e] > 0
            }, o.prototype.current = function(e) {
                if (e === i) return this._current;
                if (0 === this._items.length) return i;
                if (e = this.normalize(e), this._current !== e) {
                    var t = this.trigger("change", {
                        property: {
                            name: "position",
                            value: e
                        }
                    });
                    t.data !== i && (e = this.normalize(t.data)), this._current = e, this.invalidate("position"), this.trigger("changed", {
                        property: {
                            name: "position",
                            value: this._current
                        }
                    })
                }
                return this._current
            }, o.prototype.invalidate = function(t) {
                return "string" === e.type(t) && (this._invalidated[t] = !0, this.is("valid") && this.leave("valid")), e.map(this._invalidated, function(e, t) {
                    return t
                })
            }, o.prototype.reset = function(e) {
                e = this.normalize(e), e !== i && (this._speed = 0, this._current = e, this.suppress(["translate", "translated"]), this.animate(this.coordinates(e)), this.release(["translate", "translated"]))
            }, o.prototype.normalize = function(e, t) {
                var n = this._items.length,
                    o = t ? 0 : this._clones.length;
                return !this.isNumeric(e) || 1 > n ? e = i : (0 > e || e >= n + o) && (e = ((e - o / 2) % n + n) % n + o / 2), e
            }, o.prototype.relative = function(e) {
                return e -= this._clones.length / 2, this.normalize(e, !0)
            }, o.prototype.maximum = function(e) {
                var t, n, i, o = this.settings,
                    r = this._coordinates.length;
                if (o.loop) r = this._clones.length / 2 + this._items.length - 1;
                else if (o.autoWidth || o.merge) {
                    for (t = this._items.length, n = this._items[--t].width(), i = this.$element.width(); t-- && (n += this._items[t].width() + this.settings.margin, !(n > i)););
                    r = t + 1
                } else r = o.center ? this._items.length - 1 : this._items.length - o.items;
                return e && (r -= this._clones.length / 2), Math.max(r, 0)
            }, o.prototype.minimum = function(e) {
                return e ? 0 : this._clones.length / 2
            }, o.prototype.items = function(e) {
                return e === i ? this._items.slice() : (e = this.normalize(e, !0), this._items[e])
            }, o.prototype.mergers = function(e) {
                return e === i ? this._mergers.slice() : (e = this.normalize(e, !0), this._mergers[e])
            }, o.prototype.clones = function(t) {
                var n = this._clones.length / 2,
                    o = n + this._items.length,
                    r = function(e) {
                        return e % 2 === 0 ? o + e / 2 : n - (e + 1) / 2
                    };
                return t === i ? e.map(this._clones, function(e, t) {
                    return r(t)
                }) : e.map(this._clones, function(e, n) {
                    return e === t ? r(n) : null
                })
            }, o.prototype.speed = function(e) {
                return e !== i && (this._speed = e), this._speed
            }, o.prototype.coordinates = function(t) {
                var n, o = 1,
                    r = t - 1;
                return t === i ? e.map(this._coordinates, e.proxy(function(e, t) {
                    return this.coordinates(t)
                }, this)) : (this.settings.center ? (this.settings.rtl && (o = -1, r = t + 1), n = this._coordinates[t], n += (this.width() - n + (this._coordinates[r] || 0)) / 2 * o) : n = this._coordinates[r] || 0, n = Math.ceil(n))
            }, o.prototype.duration = function(e, t, n) {
                return 0 === n ? 0 : Math.min(Math.max(Math.abs(t - e), 1), 6) * Math.abs(n || this.settings.smartSpeed)
            }, o.prototype.to = function(e, t) {
                var n = this.current(),
                    i = null,
                    o = e - this.relative(n),
                    r = (o > 0) - (0 > o),
                    a = this._items.length,
                    s = this.minimum(),
                    l = this.maximum();
                this.settings.loop ? (!this.settings.rewind && Math.abs(o) > a / 2 && (o += -1 * r * a), e = n + o, i = ((e - s) % a + a) % a + s, i !== e && l >= i - o && i - o > 0 && (n = i - o, e = i, this.reset(n))) : this.settings.rewind ? (l += 1, e = (e % l + l) % l) : e = Math.max(s, Math.min(l, e)), this.speed(this.duration(n, e, t)), this.current(e), this.$element.is(":visible") && this.update()
            }, o.prototype.next = function(e) {
                e = e || !1, this.to(this.relative(this.current()) + 1, e)
            }, o.prototype.prev = function(e) {
                e = e || !1, this.to(this.relative(this.current()) - 1, e)
            }, o.prototype.onTransitionEnd = function(e) {
                return e !== i && (e.stopPropagation(), (e.target || e.srcElement || e.originalTarget) !== this.$stage.get(0)) ? !1 : (this.leave("animating"), void this.trigger("translated"))
            }, o.prototype.viewport = function() {
                var i;
                if (this.options.responsiveBaseElement !== t) i = e(this.options.responsiveBaseElement).width();
                else if (t.innerWidth) i = t.innerWidth;
                else {
                    if (!n.documentElement || !n.documentElement.clientWidth) throw "Can not detect viewport width.";
                    i = n.documentElement.clientWidth
                }
                return i
            }, o.prototype.replace = function(t) {
                this.$stage.empty(), this._items = [], t && (t = t instanceof jQuery ? t : e(t)), this.settings.nestedItemSelector && (t = t.find("." + this.settings.nestedItemSelector)), t.filter(function() {
                    return 1 === this.nodeType
                }).each(e.proxy(function(e, t) {
                    t = this.prepare(t), this.$stage.append(t), this._items.push(t), this._mergers.push(1 * t.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)
                }, this)), this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0), this.invalidate("items")
            }, o.prototype.add = function(t, n) {
                var o = this.relative(this._current);
                n = n === i ? this._items.length : this.normalize(n, !0), t = t instanceof jQuery ? t : e(t), this.trigger("add", {
                    content: t,
                    position: n
                }), t = this.prepare(t), 0 === this._items.length || n === this._items.length ? (0 === this._items.length && this.$stage.append(t), 0 !== this._items.length && this._items[n - 1].after(t), this._items.push(t), this._mergers.push(1 * t.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)) : (this._items[n].before(t), this._items.splice(n, 0, t), this._mergers.splice(n, 0, 1 * t.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)), this._items[o] && this.reset(this._items[o].index()), this.invalidate("items"), this.trigger("added", {
                    content: t,
                    position: n
                })
            }, o.prototype.remove = function(e) {
                e = this.normalize(e, !0), e !== i && (this.trigger("remove", {
                    content: this._items[e],
                    position: e
                }), this._items[e].remove(), this._items.splice(e, 1), this._mergers.splice(e, 1), this.invalidate("items"), this.trigger("removed", {
                    content: null,
                    position: e
                }))
            }, o.prototype.preloadAutoWidthImages = function(t) {
                t.each(e.proxy(function(t, n) {
                    this.enter("pre-loading"), n = e(n), e(new Image).one("load", e.proxy(function(e) {
                        n.attr("src", e.target.src), n.css("opacity", 1), this.leave("pre-loading"), !this.is("pre-loading") && !this.is("initializing") && this.refresh()
                    }, this)).attr("src", n.attr("src") || n.attr("data-src") || n.attr("data-src-retina"))
                }, this))
            }, o.prototype.destroy = function() {
                this.$element.off(".owl.core"), this.$stage.off(".owl.core"), e(n).off(".owl.core"), this.settings.responsive !== !1 && (t.clearTimeout(this.resizeTimer), this.off(t, "resize", this._handlers.onThrottledResize));
                for (var i in this._plugins) this._plugins[i].destroy();
                this.$stage.children(".cloned").remove(), this.$stage.unwrap(), this.$stage.children().contents().unwrap(), this.$stage.children().unwrap(), this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr("class", this.$element.attr("class").replace(new RegExp(this.options.responsiveClass + "-\\S+\\s", "g"), "")).removeData("owl.carousel")
            }, o.prototype.op = function(e, t, n) {
                var i = this.settings.rtl;
                switch (t) {
                    case "<":
                        return i ? e > n : n > e;
                    case ">":
                        return i ? n > e : e > n;
                    case ">=":
                        return i ? n >= e : e >= n;
                    case "<=":
                        return i ? e >= n : n >= e
                }
            }, o.prototype.on = function(e, t, n, i) {
                e.addEventListener ? e.addEventListener(t, n, i) : e.attachEvent && e.attachEvent("on" + t, n)
            }, o.prototype.off = function(e, t, n, i) {
                e.removeEventListener ? e.removeEventListener(t, n, i) : e.detachEvent && e.detachEvent("on" + t, n)
            }, o.prototype.trigger = function(t, n, i) {
                var r = {
                        item: {
                            count: this._items.length,
                            index: this.current()
                        }
                    },
                    a = e.camelCase(e.grep(["on", t, i], function(e) {
                        return e
                    }).join("-").toLowerCase()),
                    s = e.Event([t, "owl", i || "carousel"].join(".").toLowerCase(), e.extend({
                        relatedTarget: this
                    }, r, n));
                return this._supress[t] || (e.each(this._plugins, function(e, t) {
                    t.onTrigger && t.onTrigger(s)
                }), this.register({
                    type: o.Type.Event,
                    name: t
                }), this.$element.trigger(s), this.settings && "function" == typeof this.settings[a] && this.settings[a].call(this, s)), s
            }, o.prototype.enter = function(t) {
                e.each([t].concat(this._states.tags[t] || []), e.proxy(function(e, t) {
                    this._states.current[t] === i && (this._states.current[t] = 0), this._states.current[t] ++
                }, this))
            }, o.prototype.leave = function(t) {
                e.each([t].concat(this._states.tags[t] || []), e.proxy(function(e, t) {
                    this._states.current[t] --
                }, this))
            }, o.prototype.register = function(t) {
                if (t.type === o.Type.Event) {
                    if (e.event.special[t.name] || (e.event.special[t.name] = {}), !e.event.special[t.name].owl) {
                        var n = e.event.special[t.name]._default;
                        e.event.special[t.name]._default = function(e) {
                            return !n || !n.apply || e.namespace && -1 !== e.namespace.indexOf("owl") ? e.namespace && e.namespace.indexOf("owl") > -1 : n.apply(this, arguments)
                        }, e.event.special[t.name].owl = !0
                    }
                } else t.type === o.Type.State && (this._states.tags[t.name] = this._states.tags[t.name] ? this._states.tags[t.name].concat(t.tags) : t.tags, this._states.tags[t.name] = e.grep(this._states.tags[t.name], e.proxy(function(n, i) {
                    return e.inArray(n, this._states.tags[t.name]) === i
                }, this)))
            }, o.prototype.suppress = function(t) {
                e.each(t, e.proxy(function(e, t) {
                    this._supress[t] = !0
                }, this))
            }, o.prototype.release = function(t) {
                e.each(t, e.proxy(function(e, t) {
                    delete this._supress[t]
                }, this))
            }, o.prototype.pointer = function(e) {
                var n = {
                    x: null,
                    y: null
                };
                return e = e.originalEvent || e || t.event, e = e.touches && e.touches.length ? e.touches[0] : e.changedTouches && e.changedTouches.length ? e.changedTouches[0] : e, e.pageX ? (n.x = e.pageX, n.y = e.pageY) : (n.x = e.clientX, n.y = e.clientY), n
            }, o.prototype.isNumeric = function(e) {
                return !isNaN(parseFloat(e))
            }, o.prototype.difference = function(e, t) {
                return {
                    x: e.x - t.x,
                    y: e.y - t.y
                }
            }, e.fn.owlCarousel = function(t) {
                var n = Array.prototype.slice.call(arguments, 1);
                return this.each(function() {
                    var i = e(this),
                        r = i.data("owl.carousel");
                    r || (r = new o(this, "object" == typeof t && t), i.data("owl.carousel", r), e.each(["next", "prev", "to", "destroy", "refresh", "replace", "add", "remove"], function(t, n) {
                        r.register({
                            type: o.Type.Event,
                            name: n
                        }), r.$element.on(n + ".owl.carousel.core", e.proxy(function(e) {
                            e.namespace && e.relatedTarget !== this && (this.suppress([n]), r[n].apply(this, [].slice.call(arguments, 1)), this.release([n]))
                        }, r))
                    })), "string" == typeof t && "_" !== t.charAt(0) && r[t].apply(r, n)
                })
            }, e.fn.owlCarousel.Constructor = o
        }(window.Zepto || window.jQuery, window, document),
        function(e, t) {
            var n = function(t) {
                this._core = t, this._interval = null, this._visible = null, this._handlers = {
                    "initialized.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.autoRefresh && this.watch()
                    }, this)
                }, this._core.options = e.extend({}, n.Defaults, this._core.options), this._core.$element.on(this._handlers)
            };
            n.Defaults = {
                autoRefresh: !0,
                autoRefreshInterval: 500
            }, n.prototype.watch = function() {
                this._interval || (this._visible = this._core.$element.is(":visible"), this._interval = t.setInterval(e.proxy(this.refresh, this), this._core.settings.autoRefreshInterval))
            }, n.prototype.refresh = function() {
                this._core.$element.is(":visible") !== this._visible && (this._visible = !this._visible, this._core.$element.toggleClass("owl-hidden", !this._visible), this._visible && this._core.invalidate("width") && this._core.refresh())
            }, n.prototype.destroy = function() {
                var e, n;
                t.clearInterval(this._interval);
                for (e in this._handlers) this._core.$element.off(e, this._handlers[e]);
                for (n in Object.getOwnPropertyNames(this)) "function" != typeof this[n] && (this[n] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.AutoRefresh = n
        }(window.Zepto || window.jQuery, window, document),
        function(e, t, n, i) {
            var o = function(t) {
                this._core = t, this._loaded = [], this._handlers = {
                    "initialized.owl.carousel change.owl.carousel resized.owl.carousel": e.proxy(function(t) {
                        if (t.namespace && this._core.settings && this._core.settings.lazyLoad && (t.property && "position" == t.property.name || "initialized" == t.type))
                            for (var n = this._core.settings, o = n.center && Math.ceil(n.items / 2) || n.items, r = n.center && -1 * o || 0, a = (t.property && t.property.value !== i ? t.property.value : this._core.current()) + r, s = this._core.clones().length, l = e.proxy(function(e, t) {
                                    this.load(t)
                                }, this); r++ < o;) this.load(s / 2 + this._core.relative(a)), s && e.each(this._core.clones(this._core.relative(a)), l), a++
                    }, this)
                }, this._core.options = e.extend({}, o.Defaults, this._core.options), this._core.$element.on(this._handlers)
            };
            o.Defaults = {
                lazyLoad: !1
            }, o.prototype.load = function(n) {
                var i = this._core.$stage.children().eq(n),
                    o = i && i.find(".owl-lazy");
                !o || e.inArray(i.get(0), this._loaded) > -1 || (o.each(e.proxy(function(n, i) {
                    var o, r = e(i),
                        a = t.devicePixelRatio > 1 && r.attr("data-src-retina") || r.attr("data-src");
                    this._core.trigger("load", {
                        element: r,
                        url: a
                    }, "lazy"), r.is("img") ? r.one("load.owl.lazy", e.proxy(function() {
                        r.css("opacity", 1), this._core.trigger("loaded", {
                            element: r,
                            url: a
                        }, "lazy")
                    }, this)).attr("src", a) : (o = new Image, o.onload = e.proxy(function() {
                        r.css({
                            "background-image": "url(" + a + ")",
                            opacity: "1"
                        }), this._core.trigger("loaded", {
                            element: r,
                            url: a
                        }, "lazy")
                    }, this), o.src = a)
                }, this)), this._loaded.push(i.get(0)))
            }, o.prototype.destroy = function() {
                var e, t;
                for (e in this.handlers) this._core.$element.off(e, this.handlers[e]);
                for (t in Object.getOwnPropertyNames(this)) "function" != typeof this[t] && (this[t] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.Lazy = o
        }(window.Zepto || window.jQuery, window, document),
        function(e) {
            var t = function(n) {
                this._core = n, this._handlers = {
                    "initialized.owl.carousel refreshed.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.autoHeight && this.update()
                    }, this),
                    "changed.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.autoHeight && "position" == e.property.name && this.update()
                    }, this),
                    "loaded.owl.lazy": e.proxy(function(e) {
                        e.namespace && this._core.settings.autoHeight && e.element.closest("." + this._core.settings.itemClass).index() === this._core.current() && this.update()
                    }, this)
                }, this._core.options = e.extend({}, t.Defaults, this._core.options), this._core.$element.on(this._handlers)
            };
            t.Defaults = {
                autoHeight: !1,
                autoHeightClass: "owl-height"
            }, t.prototype.update = function() {
                var t = this._core._current,
                    n = t + this._core.settings.items,
                    i = this._core.$stage.children().toArray().slice(t, n),
                    o = [],
                    r = 0;
                e.each(i, function(t, n) {
                    o.push(e(n).height())
                }), r = Math.max.apply(null, o), this._core.$stage.parent().height(r).addClass(this._core.settings.autoHeightClass)
            }, t.prototype.destroy = function() {
                var e, t;
                for (e in this._handlers) this._core.$element.off(e, this._handlers[e]);
                for (t in Object.getOwnPropertyNames(this)) "function" != typeof this[t] && (this[t] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.AutoHeight = t
        }(window.Zepto || window.jQuery, window, document),
        function(e, t, n) {
            var i = function(t) {
                this._core = t, this._videos = {}, this._playing = null, this._handlers = {
                    "initialized.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.register({
                            type: "state",
                            name: "playing",
                            tags: ["interacting"]
                        })
                    }, this),
                    "resize.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.video && this.isInFullScreen() && e.preventDefault()
                    }, this),
                    "refreshed.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.is("resizing") && this._core.$stage.find(".cloned .owl-video-frame").remove()
                    }, this),
                    "changed.owl.carousel": e.proxy(function(e) {
                        e.namespace && "position" === e.property.name && this._playing && this.stop()
                    }, this),
                    "prepared.owl.carousel": e.proxy(function(t) {
                        if (t.namespace) {
                            var n = e(t.content).find(".owl-video");
                            n.length && (n.css("display", "none"), this.fetch(n, e(t.content)))
                        }
                    }, this)
                }, this._core.options = e.extend({}, i.Defaults, this._core.options), this._core.$element.on(this._handlers), this._core.$element.on("click.owl.video", ".owl-video-play-icon", e.proxy(function(e) {
                    this.play(e)
                }, this))
            };
            i.Defaults = {
                video: !1,
                videoHeight: !1,
                videoWidth: !1
            }, i.prototype.fetch = function(e, t) {
                var n = function() {
                        return e.attr("data-vimeo-id") ? "vimeo" : e.attr("data-vzaar-id") ? "vzaar" : "youtube"
                    }(),
                    i = e.attr("data-vimeo-id") || e.attr("data-youtube-id") || e.attr("data-vzaar-id"),
                    o = e.attr("data-width") || this._core.settings.videoWidth,
                    r = e.attr("data-height") || this._core.settings.videoHeight,
                    a = e.attr("href");
                if (!a) throw new Error("Missing video URL.");
                if (i = a.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/), i[3].indexOf("youtu") > -1) n = "youtube";
                else if (i[3].indexOf("vimeo") > -1) n = "vimeo";
                else {
                    if (!(i[3].indexOf("vzaar") > -1)) throw new Error("Video URL not supported.");
                    n = "vzaar"
                }
                i = i[6], this._videos[a] = {
                    type: n,
                    id: i,
                    width: o,
                    height: r
                }, t.attr("data-video", a), this.thumbnail(e, this._videos[a])
            }, i.prototype.thumbnail = function(t, n) {
                var i, o, r, a = n.width && n.height ? 'style="width:' + n.width + "px;height:" + n.height + 'px;"' : "",
                    s = t.find("img"),
                    l = "src",
                    c = "",
                    u = this._core.settings,
                    d = function(e) {
                        o = '<div class="owl-video-play-icon"></div>', i = u.lazyLoad ? '<div class="owl-video-tn ' + c + '" ' + l + '="' + e + '"></div>' : '<div class="owl-video-tn" style="opacity:1;background-image:url(' + e + ')"></div>', t.after(i), t.after(o)
                    };
                return t.wrap('<div class="owl-video-wrapper"' + a + "></div>"), this._core.settings.lazyLoad && (l = "data-src", c = "owl-lazy"), s.length ? (d(s.attr(l)), s.remove(), !1) : void("youtube" === n.type ? (r = "//img.youtube.com/vi/" + n.id + "/hqdefault.jpg", d(r)) : "vimeo" === n.type ? e.ajax({
                    type: "GET",
                    url: "//vimeo.com/api/v2/video/" + n.id + ".json",
                    jsonp: "callback",
                    dataType: "jsonp",
                    success: function(e) {
                        r = e[0].thumbnail_large, d(r)
                    }
                }) : "vzaar" === n.type && e.ajax({
                    type: "GET",
                    url: "//vzaar.com/api/videos/" + n.id + ".json",
                    jsonp: "callback",
                    dataType: "jsonp",
                    success: function(e) {
                        r = e.framegrab_url, d(r)
                    }
                }))
            }, i.prototype.stop = function() {
                this._core.trigger("stop", null, "video"), this._playing.find(".owl-video-frame").remove(), this._playing.removeClass("owl-video-playing"), this._playing = null, this._core.leave("playing"), this._core.trigger("stopped", null, "video")
            }, i.prototype.play = function(t) {
                var n, i = e(t.target),
                    o = i.closest("." + this._core.settings.itemClass),
                    r = this._videos[o.attr("data-video")],
                    a = r.width || "100%",
                    s = r.height || this._core.$stage.height();
                this._playing || (this._core.enter("playing"), this._core.trigger("play", null, "video"), o = this._core.items(this._core.relative(o.index())), this._core.reset(o.index()), "youtube" === r.type ? n = '<iframe width="' + a + '" height="' + s + '" src="//www.youtube.com/embed/' + r.id + "?autoplay=1&v=" + r.id + '" frameborder="0" allowfullscreen></iframe>' : "vimeo" === r.type ? n = '<iframe src="//player.vimeo.com/video/' + r.id + '?autoplay=1" width="' + a + '" height="' + s + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' : "vzaar" === r.type && (n = '<iframe frameborder="0"height="' + s + '"width="' + a + '" allowfullscreen mozallowfullscreen webkitAllowFullScreen src="//view.vzaar.com/' + r.id + '/player?autoplay=true"></iframe>'), e('<div class="owl-video-frame">' + n + "</div>").insertAfter(o.find(".owl-video")), this._playing = o.addClass("owl-video-playing"))
            }, i.prototype.isInFullScreen = function() {
                var t = n.fullscreenElement || n.mozFullScreenElement || n.webkitFullscreenElement;
                return t && e(t).parent().hasClass("owl-video-frame")
            }, i.prototype.destroy = function() {
                var e, t;
                this._core.$element.off("click.owl.video");
                for (e in this._handlers) this._core.$element.off(e, this._handlers[e]);
                for (t in Object.getOwnPropertyNames(this)) "function" != typeof this[t] && (this[t] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.Video = i
        }(window.Zepto || window.jQuery, window, document),
        function(e, t, n, i) {
            var o = function(t) {
                this.core = t, this.core.options = e.extend({}, o.Defaults, this.core.options), this.swapping = !0, this.previous = i, this.next = i, this.handlers = {
                    "change.owl.carousel": e.proxy(function(e) {
                        e.namespace && "position" == e.property.name && (this.previous = this.core.current(), this.next = e.property.value)
                    }, this),
                    "drag.owl.carousel dragged.owl.carousel translated.owl.carousel": e.proxy(function(e) {
                        e.namespace && (this.swapping = "translated" == e.type)
                    }, this),
                    "translate.owl.carousel": e.proxy(function(e) {
                        e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn) && this.swap()
                    }, this)
                }, this.core.$element.on(this.handlers)
            };
            o.Defaults = {
                animateOut: !1,
                animateIn: !1
            }, o.prototype.swap = function() {
                if (1 === this.core.settings.items && e.support.animation && e.support.transition) {
                    this.core.speed(0);
                    var t, n = e.proxy(this.clear, this),
                        i = this.core.$stage.children().eq(this.previous),
                        o = this.core.$stage.children().eq(this.next),
                        r = this.core.settings.animateIn,
                        a = this.core.settings.animateOut;
                    this.core.current() !== this.previous && (a && (t = this.core.coordinates(this.previous) - this.core.coordinates(this.next), i.one(e.support.animation.end, n).css({
                        left: t + "px"
                    }).addClass("animated owl-animated-out").addClass(a)), r && o.one(e.support.animation.end, n).addClass("animated owl-animated-in").addClass(r))
                }
            }, o.prototype.clear = function(t) {
                e(t.target).css({
                    left: ""
                }).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut), this.core.onTransitionEnd()
            }, o.prototype.destroy = function() {
                var e, t;
                for (e in this.handlers) this.core.$element.off(e, this.handlers[e]);
                for (t in Object.getOwnPropertyNames(this)) "function" != typeof this[t] && (this[t] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.Animate = o
        }(window.Zepto || window.jQuery, window, document),
        function(e, t, n) {
            var i = function(t) {
                this._core = t, this._timeout = null, this._paused = !1, this._handlers = {
                    "changed.owl.carousel": e.proxy(function(e) {
                        e.namespace && "settings" === e.property.name ? this._core.settings.autoplay ? this.play() : this.stop() : e.namespace && "position" === e.property.name && this._core.settings.autoplay && this._setAutoPlayInterval()
                    }, this),
                    "initialized.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.autoplay && this.play()
                    }, this),
                    "play.owl.autoplay": e.proxy(function(e, t, n) {
                        e.namespace && this.play(t, n)
                    }, this),
                    "stop.owl.autoplay": e.proxy(function(e) {
                        e.namespace && this.stop()
                    }, this),
                    "mouseover.owl.autoplay": e.proxy(function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                    }, this),
                    "mouseleave.owl.autoplay": e.proxy(function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.play()
                    }, this),
                    "touchstart.owl.core": e.proxy(function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                    }, this),
                    "touchend.owl.core": e.proxy(function() {
                        this._core.settings.autoplayHoverPause && this.play()
                    }, this)
                }, this._core.$element.on(this._handlers), this._core.options = e.extend({}, i.Defaults, this._core.options)
            };
            i.Defaults = {
                autoplay: !1,
                autoplayTimeout: 5e3,
                autoplayHoverPause: !1,
                autoplaySpeed: !1
            }, i.prototype.play = function() {
                this._paused = !1, this._core.is("rotating") || (this._core.enter("rotating"), this._setAutoPlayInterval())
            }, i.prototype._getNextTimeout = function(i, o) {
                return this._timeout && t.clearTimeout(this._timeout), t.setTimeout(e.proxy(function() {
                    this._paused || this._core.is("busy") || this._core.is("interacting") || n.hidden || this._core.next(o || this._core.settings.autoplaySpeed)
                }, this), i || this._core.settings.autoplayTimeout)
            }, i.prototype._setAutoPlayInterval = function() {
                this._timeout = this._getNextTimeout()
            }, i.prototype.stop = function() {
                this._core.is("rotating") && (t.clearTimeout(this._timeout), this._core.leave("rotating"))
            }, i.prototype.pause = function() {
                this._core.is("rotating") && (this._paused = !0)
            }, i.prototype.destroy = function() {
                var e, t;
                this.stop();
                for (e in this._handlers) this._core.$element.off(e, this._handlers[e]);
                for (t in Object.getOwnPropertyNames(this)) "function" != typeof this[t] && (this[t] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.autoplay = i
        }(window.Zepto || window.jQuery, window, document),
        function(e) {
            "use strict";
            var t = function(n) {
                this._core = n, this._initialized = !1, this._pages = [], this._controls = {}, this._templates = [], this.$element = this._core.$element, this._overrides = {
                    next: this._core.next,
                    prev: this._core.prev,
                    to: this._core.to
                }, this._handlers = {
                    "prepared.owl.carousel": e.proxy(function(t) {
                        t.namespace && this._core.settings.dotsData && this._templates.push('<div class="' + this._core.settings.dotClass + '">' + e(t.content).find("[data-dot]").addBack("[data-dot]").attr("data-dot") + "</div>")
                    }, this),
                    "added.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.dotsData && this._templates.splice(e.position, 0, this._templates.pop())
                    }, this),
                    "remove.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._core.settings.dotsData && this._templates.splice(e.position, 1)
                    }, this),
                    "changed.owl.carousel": e.proxy(function(e) {
                        e.namespace && "position" == e.property.name && this.draw()
                    }, this),
                    "initialized.owl.carousel": e.proxy(function(e) {
                        e.namespace && !this._initialized && (this._core.trigger("initialize", null, "navigation"), this.initialize(), this.update(), this.draw(), this._initialized = !0, this._core.trigger("initialized", null, "navigation"))
                    }, this),
                    "refreshed.owl.carousel": e.proxy(function(e) {
                        e.namespace && this._initialized && (this._core.trigger("refresh", null, "navigation"), this.update(), this.draw(), this._core.trigger("refreshed", null, "navigation"))
                    }, this)
                }, this._core.options = e.extend({}, t.Defaults, this._core.options), this.$element.on(this._handlers)
            };
            t.Defaults = {
                nav: !1,
                navText: ["prev", "next"],
                navSpeed: !1,
                navElement: "div",
                navContainer: !1,
                navContainerClass: "owl-nav",
                navClass: ["owl-prev", "owl-next"],
                slideBy: 1,
                dotClass: "owl-dot",
                dotsClass: "owl-dots",
                dots: !0,
                dotsEach: !1,
                dotsData: !1,
                dotsSpeed: !1,
                dotsContainer: !1
            }, t.prototype.initialize = function() {
                var t, n = this._core.settings;
                this._controls.$relative = (n.navContainer ? e(n.navContainer) : e("<div>").addClass(n.navContainerClass).appendTo(this.$element)).addClass("disabled"), this._controls.$previous = e("<" + n.navElement + ">").addClass(n.navClass[0]).html(n.navText[0]).prependTo(this._controls.$relative).on("click", e.proxy(function() {
                    this.prev(n.navSpeed)
                }, this)), this._controls.$next = e("<" + n.navElement + ">").addClass(n.navClass[1]).html(n.navText[1]).appendTo(this._controls.$relative).on("click", e.proxy(function() {
                    this.next(n.navSpeed)
                }, this)), n.dotsData || (this._templates = [e("<div>").addClass(n.dotClass).append(e("<span>")).prop("outerHTML")]), this._controls.$absolute = (n.dotsContainer ? e(n.dotsContainer) : e("<div>").addClass(n.dotsClass).appendTo(this.$element)).addClass("disabled"), this._controls.$absolute.on("click", "div", e.proxy(function(t) {
                    var i = e(t.target).parent().is(this._controls.$absolute) ? e(t.target).index() : e(t.target).parent().index();
                    t.preventDefault(), this.to(i, n.dotsSpeed)
                }, this));
                for (t in this._overrides) this._core[t] = e.proxy(this[t], this)
            }, t.prototype.destroy = function() {
                var e, t, n, i;
                for (e in this._handlers) this.$element.off(e, this._handlers[e]);
                for (t in this._controls) this._controls[t].remove();
                for (i in this.overides) this._core[i] = this._overrides[i];
                for (n in Object.getOwnPropertyNames(this)) "function" != typeof this[n] && (this[n] = null)
            }, t.prototype.update = function() {
                var e, t, n, i = this._core.clones().length / 2,
                    o = i + this._core.items().length,
                    r = this._core.maximum(!0),
                    a = this._core.settings,
                    s = a.center || a.autoWidth || a.dotsData ? 1 : a.dotsEach || a.items;
                if ("page" !== a.slideBy && (a.slideBy = Math.min(a.slideBy, a.items)), a.dots || "page" == a.slideBy)
                    for (this._pages = [], e = i, t = 0, n = 0; o > e; e++) {
                        if (t >= s || 0 === t) {
                            if (this._pages.push({
                                    start: Math.min(r, e - i),
                                    end: e - i + s - 1
                                }), Math.min(r, e - i) === r) break;
                            t = 0, ++n
                        }
                        t += this._core.mergers(this._core.relative(e))
                    }
            }, t.prototype.draw = function() {
                var t, n = this._core.settings,
                    i = this._core.items().length <= n.items,
                    o = this._core.relative(this._core.current()),
                    r = n.loop || n.rewind;
                this._controls.$relative.toggleClass("disabled", !n.nav || i), n.nav && (this._controls.$previous.toggleClass("disabled", !r && o <= this._core.minimum(!0)), this._controls.$next.toggleClass("disabled", !r && o >= this._core.maximum(!0))), this._controls.$absolute.toggleClass("disabled", !n.dots || i), n.dots && (t = this._pages.length - this._controls.$absolute.children().length, n.dotsData && 0 !== t ? this._controls.$absolute.html(this._templates.join("")) : t > 0 ? this._controls.$absolute.append(new Array(t + 1).join(this._templates[0])) : 0 > t && this._controls.$absolute.children().slice(t).remove(), this._controls.$absolute.find(".active").removeClass("active"), this._controls.$absolute.children().eq(e.inArray(this.current(), this._pages)).addClass("active"))
            }, t.prototype.onTrigger = function(t) {
                var n = this._core.settings;
                t.page = {
                    index: e.inArray(this.current(), this._pages),
                    count: this._pages.length,
                    size: n && (n.center || n.autoWidth || n.dotsData ? 1 : n.dotsEach || n.items)
                }
            }, t.prototype.current = function() {
                var t = this._core.relative(this._core.current());
                return e.grep(this._pages, e.proxy(function(e) {
                    return e.start <= t && e.end >= t
                }, this)).pop()
            }, t.prototype.getPosition = function(t) {
                var n, i, o = this._core.settings;
                return "page" == o.slideBy ? (n = e.inArray(this.current(), this._pages), i = this._pages.length, t ? ++n : --n, n = this._pages[(n % i + i) % i].start) : (n = this._core.relative(this._core.current()), i = this._core.items().length, t ? n += o.slideBy : n -= o.slideBy), n
            }, t.prototype.next = function(t) {
                e.proxy(this._overrides.to, this._core)(this.getPosition(!0), t)
            }, t.prototype.prev = function(t) {
                e.proxy(this._overrides.to, this._core)(this.getPosition(!1), t)
            }, t.prototype.to = function(t, n, i) {
                var o;
                !i && this._pages.length ? (o = this._pages.length, e.proxy(this._overrides.to, this._core)(this._pages[(t % o + o) % o].start, n)) : e.proxy(this._overrides.to, this._core)(t, n)
            }, e.fn.owlCarousel.Constructor.Plugins.Navigation = t
        }(window.Zepto || window.jQuery, window, document),
        function(e, t, n, i) {
            "use strict";
            var o = function(n) {
                this._core = n, this._hashes = {}, this.$element = this._core.$element, this._handlers = {
                    "initialized.owl.carousel": e.proxy(function(n) {
                        n.namespace && "URLHash" === this._core.settings.startPosition && e(t).trigger("hashchange.owl.navigation")
                    }, this),
                    "prepared.owl.carousel": e.proxy(function(t) {
                        if (t.namespace) {
                            var n = e(t.content).find("[data-hash]").addBack("[data-hash]").attr("data-hash");
                            if (!n) return;
                            this._hashes[n] = t.content
                        }
                    }, this),
                    "changed.owl.carousel": e.proxy(function(n) {
                        if (n.namespace && "position" === n.property.name) {
                            var i = this._core.items(this._core.relative(this._core.current())),
                                o = e.map(this._hashes, function(e, t) {
                                    return e === i ? t : null
                                }).join();
                            if (!o || t.location.hash.slice(1) === o) return;
                            t.location.hash = o
                        }
                    }, this)
                }, this._core.options = e.extend({}, o.Defaults, this._core.options), this.$element.on(this._handlers), e(t).on("hashchange.owl.navigation", e.proxy(function() {
                    var e = t.location.hash.substring(1),
                        n = this._core.$stage.children(),
                        o = this._hashes[e] && n.index(this._hashes[e]);
                    o !== i && o !== this._core.current() && this._core.to(this._core.relative(o), !1, !0)
                }, this))
            };
            o.Defaults = {
                URLhashListener: !1
            }, o.prototype.destroy = function() {
                var n, i;
                e(t).off("hashchange.owl.navigation");
                for (n in this._handlers) this._core.$element.off(n, this._handlers[n]);
                for (i in Object.getOwnPropertyNames(this)) "function" != typeof this[i] && (this[i] = null)
            }, e.fn.owlCarousel.Constructor.Plugins.Hash = o
        }(window.Zepto || window.jQuery, window, document),
        function(e, t, n, i) {
            function o(t, n) {
                var o = !1,
                    r = t.charAt(0).toUpperCase() + t.slice(1);
                return e.each((t + " " + s.join(r + " ") + r).split(" "), function(e, t) {
                    return a[t] !== i ? (o = n ? t : !0, !1) : void 0
                }), o
            }

            function r(e) {
                return o(e, !0)
            }
            var a = e("<support>").get(0).style,
                s = "Webkit Moz O ms".split(" "),
                l = {
                    transition: {
                        end: {
                            WebkitTransition: "webkitTransitionEnd",
                            MozTransition: "transitionend",
                            OTransition: "oTransitionEnd",
                            transition: "transitionend"
                        }
                    },
                    animation: {
                        end: {
                            WebkitAnimation: "webkitAnimationEnd",
                            MozAnimation: "animationend",
                            OAnimation: "oAnimationEnd",
                            animation: "animationend"
                        }
                    }
                },
                c = {
                    csstransforms: function() {
                        return !!o("transform")
                    },
                    csstransforms3d: function() {
                        return !!o("perspective")
                    },
                    csstransitions: function() {
                        return !!o("transition")
                    },
                    cssanimations: function() {
                        return !!o("animation")
                    }
                };
            c.csstransitions() && (e.support.transition = new String(r("transition")), e.support.transition.end = l.transition.end[e.support.transition]), c.cssanimations() && (e.support.animation = new String(r("animation")), e.support.animation.end = l.animation.end[e.support.animation]), c.csstransforms() && (e.support.transform = new String(r("transform")), e.support.transform3d = c.csstransforms3d())
        }(window.Zepto || window.jQuery, window, document), define("owlcarousel", ["jquery"], function() {}), "object" != typeof JSON && (JSON = {}),
        function() {
            "use strict";

            function f(e) {
                return 10 > e ? "0" + e : e
            }

            function quote(e) {
                return escapable.lastIndex = 0, escapable.test(e) ? '"' + e.replace(escapable, function(e) {
                    var t = meta[e];
                    return "string" == typeof t ? t : "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
                }) + '"' : '"' + e + '"'
            }

            function str(e, t) {
                var n, i, o, r, a, s = gap,
                    l = t[e];
                switch (l && "object" == typeof l && "function" == typeof l.toJSON && (l = l.toJSON(e)), "function" == typeof rep && (l = rep.call(t, e, l)), typeof l) {
                    case "string":
                        return quote(l);
                    case "number":
                        return isFinite(l) ? String(l) : "null";
                    case "boolean":
                    case "null":
                        return String(l);
                    case "object":
                        if (!l) return "null";
                        if (gap += indent, a = [], "[object Array]" === Object.prototype.toString.apply(l)) {
                            for (r = l.length, n = 0; r > n; n += 1) a[n] = str(n, l) || "null";
                            return o = 0 === a.length ? "[]" : gap ? "[\n" + gap + a.join(",\n" + gap) + "\n" + s + "]" : "[" + a.join(",") + "]", gap = s, o
                        }
                        if (rep && "object" == typeof rep)
                            for (r = rep.length, n = 0; r > n; n += 1) "string" == typeof rep[n] && (i = rep[n], o = str(i, l), o && a.push(quote(i) + (gap ? ": " : ":") + o));
                        else
                            for (i in l) Object.prototype.hasOwnProperty.call(l, i) && (o = str(i, l), o && a.push(quote(i) + (gap ? ": " : ":") + o));
                        return o = 0 === a.length ? "{}" : gap ? "{\n" + gap + a.join(",\n" + gap) + "\n" + s + "}" : "{" + a.join(",") + "}", gap = s, o
                }
            }
            "function" != typeof Date.prototype.toJSON && (Date.prototype.toJSON = function() {
                return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
            }, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
                return this.valueOf()
            });
            var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
                escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
                gap, indent, meta = {
                    "\b": "\\b",
                    "	": "\\t",
                    "\n": "\\n",
                    "\f": "\\f",
                    "\r": "\\r",
                    '"': '\\"',
                    "\\": "\\\\"
                },
                rep;
            "function" != typeof JSON.stringify && (JSON.stringify = function(e, t, n) {
                var i;
                if (gap = "", indent = "", "number" == typeof n)
                    for (i = 0; n > i; i += 1) indent += " ";
                else "string" == typeof n && (indent = n);
                if (rep = t, !t || "function" == typeof t || "object" == typeof t && "number" == typeof t.length) return str("", {
                    "": e
                });
                throw new Error("JSON.stringify")
            }), "function" != typeof JSON.parse && (JSON.parse = function(text, reviver) {
                function walk(e, t) {
                    var n, i, o = e[t];
                    if (o && "object" == typeof o)
                        for (n in o) Object.prototype.hasOwnProperty.call(o, n) && (i = walk(o, n), void 0 !== i ? o[n] = i : delete o[n]);
                    return reviver.call(e, t, o)
                }
                var j;
                if (text = String(text), cx.lastIndex = 0, cx.test(text) && (text = text.replace(cx, function(e) {
                        return "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
                    })), /^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return j = eval("(" + text + ")"), "function" == typeof reviver ? walk({
                    "": j
                }, "") : j;
                throw new SyntaxError("JSON.parse")
            })
        }(),
        function(e, t) {
            "use strict";
            var n = e.History = e.History || {},
                i = e.jQuery;
            if ("undefined" != typeof n.Adapter) throw new Error("History.js Adapter has already been loaded...");
            n.Adapter = {
                bind: function(e, t, n) {
                    i(e).bind(t, n)
                },
                trigger: function(e, t, n) {
                    i(e).trigger(t, n)
                },
                extractEventData: function(e, n, i) {
                    var o = n && n.originalEvent && n.originalEvent[e] || i && i[e] || t;
                    return o
                },
                onDomLoad: function(e) {
                    i(e)
                }
            }, "undefined" != typeof n.init && n.init()
        }(window),
        function(e) {
            "use strict";
            var t = e.document,
                n = e.setTimeout || n,
                i = e.clearTimeout || i,
                o = e.setInterval || o,
                r = e.History = e.History || {};
            if ("undefined" != typeof r.initHtml4) throw new Error("History.js HTML4 Support has already been loaded...");
            r.initHtml4 = function() {
                return "undefined" != typeof r.initHtml4.initialized ? !1 : (r.initHtml4.initialized = !0, r.enabled = !0, r.savedHashes = [], r.isLastHash = function(e) {
                    var t, n = r.getHashByIndex();
                    return t = e === n
                }, r.isHashEqual = function(e, t) {
                    return e = encodeURIComponent(e).replace(/%25/g, "%"), t = encodeURIComponent(t).replace(/%25/g, "%"), e === t
                }, r.saveHash = function(e) {
                    return r.isLastHash(e) ? !1 : (r.savedHashes.push(e), !0)
                }, r.getHashByIndex = function(e) {
                    var t = null;
                    return t = "undefined" == typeof e ? r.savedHashes[r.savedHashes.length - 1] : 0 > e ? r.savedHashes[r.savedHashes.length + e] : r.savedHashes[e]
                }, r.discardedHashes = {}, r.discardedStates = {}, r.discardState = function(e, t, n) {
                    var i, o = r.getHashByState(e);
                    return i = {
                        discardedState: e,
                        backState: n,
                        forwardState: t
                    }, r.discardedStates[o] = i, !0
                }, r.discardHash = function(e, t, n) {
                    var i = {
                        discardedHash: e,
                        backState: n,
                        forwardState: t
                    };
                    return r.discardedHashes[e] = i, !0
                }, r.discardedState = function(e) {
                    var t, n = r.getHashByState(e);
                    return t = r.discardedStates[n] || !1
                }, r.discardedHash = function(e) {
                    var t = r.discardedHashes[e] || !1;
                    return t
                }, r.recycleState = function(e) {
                    var t = r.getHashByState(e);
                    return r.discardedState(e) && delete r.discardedStates[t], !0
                }, r.emulated.hashChange && (r.hashChangeInit = function() {
                    r.checkerFunction = null;
                    var n, i, a, s, l = "",
                        c = Boolean(r.getHash());
                    return r.isInternetExplorer() ? (n = "historyjs-iframe", i = t.createElement("iframe"), i.setAttribute("id", n), i.setAttribute("src", "#"), i.style.display = "none", t.body.appendChild(i), i.contentWindow.document.open(), i.contentWindow.document.close(), a = "", s = !1, r.checkerFunction = function() {
                        if (s) return !1;
                        s = !0;
                        var t = r.getHash(),
                            n = r.getHash(i.contentWindow.document);
                        return t !== l ? (l = t, n !== t && (a = n = t, i.contentWindow.document.open(), i.contentWindow.document.close(), i.contentWindow.document.location.hash = r.escapeHash(t)), r.Adapter.trigger(e, "hashchange")) : n !== a && (a = n, c && "" === n ? r.back() : r.setHash(n, !1)), s = !1, !0
                    }) : r.checkerFunction = function() {
                        var t = r.getHash() || "";
                        return t !== l && (l = t, r.Adapter.trigger(e, "hashchange")), !0
                    }, r.intervalList.push(o(r.checkerFunction, r.options.hashChangeInterval)), !0
                }, r.Adapter.onDomLoad(r.hashChangeInit)), r.emulated.pushState && (r.onHashChange = function(t) {
                    var n, i = t && t.newURL || r.getLocationHref(),
                        o = r.getHashByUrl(i),
                        a = null,
                        s = null;
                    return r.isLastHash(o) ? (r.busy(!1), !1) : (r.doubleCheckComplete(), r.saveHash(o), o && r.isTraditionalAnchor(o) ? (r.Adapter.trigger(e, "anchorchange"), r.busy(!1), !1) : (a = r.extractState(r.getFullUrl(o || r.getLocationHref()), !0), r.isLastSavedState(a) ? (r.busy(!1), !1) : (s = r.getHashByState(a), n = r.discardedState(a), n ? (r.getHashByIndex(-2) === r.getHashByState(n.forwardState) ? r.back(!1) : r.forward(!1), !1) : (r.pushState(a.data, a.title, encodeURI(a.url), !1), !0))))
                }, r.Adapter.bind(e, "hashchange", r.onHashChange), r.pushState = function(t, n, i, o) {
                    if (i = encodeURI(i).replace(/%25/g, "%"), r.getHashByUrl(i)) throw new Error("History.js does not support states with fragment-identifiers (hashes/anchors).");
                    if (o !== !1 && r.busy()) return r.pushQueue({
                        scope: r,
                        callback: r.pushState,
                        args: arguments,
                        queue: o
                    }), !1;
                    r.busy(!0);
                    var a = r.createStateObject(t, n, i),
                        s = r.getHashByState(a),
                        l = r.getState(!1),
                        c = r.getHashByState(l),
                        u = r.getHash(),
                        d = r.expectedStateId == a.id;
                    return r.storeState(a), r.expectedStateId = a.id, r.recycleState(a), r.setTitle(a), s === c ? (r.busy(!1), !1) : (r.saveState(a), d || r.Adapter.trigger(e, "statechange"), !r.isHashEqual(s, u) && !r.isHashEqual(s, r.getShortUrl(r.getLocationHref())) && r.setHash(s, !1), r.busy(!1), !0)
                }, r.replaceState = function(t, n, i, o) {
                    if (i = encodeURI(i).replace(/%25/g, "%"), r.getHashByUrl(i)) throw new Error("History.js does not support states with fragment-identifiers (hashes/anchors).");
                    if (o !== !1 && r.busy()) return r.pushQueue({
                        scope: r,
                        callback: r.replaceState,
                        args: arguments,
                        queue: o
                    }), !1;
                    r.busy(!0);
                    var a = r.createStateObject(t, n, i),
                        s = r.getHashByState(a),
                        l = r.getState(!1),
                        c = r.getHashByState(l),
                        u = r.getStateByIndex(-2);
                    return r.discardState(l, a, u), s === c ? (r.storeState(a), r.expectedStateId = a.id, r.recycleState(a), r.setTitle(a), r.saveState(a), r.Adapter.trigger(e, "statechange"), r.busy(!1)) : r.pushState(a.data, a.title, a.url, !1), !0
                }), r.emulated.pushState && r.getHash() && !r.emulated.hashChange && r.Adapter.onDomLoad(function() {
                    r.Adapter.trigger(e, "hashchange")
                }), void 0)
            }, "undefined" != typeof r.init && r.init()
        }(window),
        function(e, t) {
            "use strict";
            var n = e.console || t,
                i = e.document,
                o = e.navigator,
                r = e.sessionStorage || !1,
                a = e.setTimeout,
                s = e.clearTimeout,
                l = e.setInterval,
                c = e.clearInterval,
                u = e.JSON,
                d = e.alert,
                p = e.History = e.History || {},
                h = e.history;
            try {
                r.setItem("TEST", "1"), r.removeItem("TEST")
            } catch (f) {
                r = !1
            }
            if (u.stringify = u.stringify || u.encode, u.parse = u.parse || u.decode, "undefined" != typeof p.init) throw new Error("History.js Core has already been loaded...");
            p.init = function() {
                return "undefined" == typeof p.Adapter ? !1 : ("undefined" != typeof p.initCore && p.initCore(), "undefined" != typeof p.initHtml4 && p.initHtml4(), !0)
            }, p.initCore = function() {
                if ("undefined" != typeof p.initCore.initialized) return !1;
                if (p.initCore.initialized = !0, p.options = p.options || {}, p.options.hashChangeInterval = p.options.hashChangeInterval || 100, p.options.safariPollInterval = p.options.safariPollInterval || 500, p.options.doubleCheckInterval = p.options.doubleCheckInterval || 500, p.options.disableSuid = p.options.disableSuid || !1, p.options.storeInterval = p.options.storeInterval || 1e3, p.options.busyDelay = p.options.busyDelay || 250, p.options.debug = p.options.debug || !1, p.options.initialTitle = p.options.initialTitle || i.title, p.options.html4Mode = p.options.html4Mode || !1, p.options.delayInit = p.options.delayInit || !1, p.intervalList = [], p.clearAllIntervals = function() {
                        var e, t = p.intervalList;
                        if ("undefined" != typeof t && null !== t) {
                            for (e = 0; e < t.length; e++) c(t[e]);
                            p.intervalList = null
                        }
                    }, p.debug = function() {
                        (p.options.debug || !1) && p.log.apply(p, arguments)
                    }, p.log = function() {
                        var e, t, o, r, a, s = "undefined" != typeof n && "undefined" != typeof n.log && "undefined" != typeof n.log.apply,
                            l = i.getElementById("log");
                        for (s ? (r = Array.prototype.slice.call(arguments), e = r.shift(), "undefined" != typeof n.debug ? n.debug.apply(n, [e, r]) : n.log.apply(n, [e, r])) : e = "\n" + arguments[0] + "\n", t = 1, o = arguments.length; o > t; ++t) {
                            if (a = arguments[t], "object" == typeof a && "undefined" != typeof u) try {
                                a = u.stringify(a)
                            } catch (c) {}
                            e += "\n" + a + "\n"
                        }
                        return l ? (l.value += e + "\n-----\n", l.scrollTop = l.scrollHeight - l.clientHeight) : s || d(e), !0
                    }, p.getInternetExplorerMajorVersion = function() {
                        var e = p.getInternetExplorerMajorVersion.cached = "undefined" != typeof p.getInternetExplorerMajorVersion.cached ? p.getInternetExplorerMajorVersion.cached : function() {
                            for (var e = 3, t = i.createElement("div"), n = t.getElementsByTagName("i");
                                (t.innerHTML = "<!--[if gt IE " + ++e + "]><i></i><![endif]-->") && n[0];);
                            return e > 4 ? e : !1
                        }();
                        return e
                    }, p.isInternetExplorer = function() {
                        var e = p.isInternetExplorer.cached = "undefined" != typeof p.isInternetExplorer.cached ? p.isInternetExplorer.cached : Boolean(p.getInternetExplorerMajorVersion());
                        return e
                    }, p.emulated = p.options.html4Mode ? {
                        pushState: !0,
                        hashChange: !0
                    } : {
                        pushState: !Boolean(e.history && e.history.pushState && e.history.replaceState && !/ Mobile\/([1-7][a-z]|(8([abcde]|f(1[0-8]))))/i.test(o.userAgent) && !/AppleWebKit\/5([0-2]|3[0-2])/i.test(o.userAgent)),
                        hashChange: Boolean(!("onhashchange" in e || "onhashchange" in i) || p.isInternetExplorer() && p.getInternetExplorerMajorVersion() < 8)
                    }, p.enabled = !p.emulated.pushState, p.bugs = {
                        setHash: Boolean(!p.emulated.pushState && "Apple Computer, Inc." === o.vendor && /AppleWebKit\/5([0-2]|3[0-3])/.test(o.userAgent)),
                        safariPoll: Boolean(!p.emulated.pushState && "Apple Computer, Inc." === o.vendor && /AppleWebKit\/5([0-2]|3[0-3])/.test(o.userAgent)),
                        ieDoubleCheck: Boolean(p.isInternetExplorer() && p.getInternetExplorerMajorVersion() < 8),
                        hashEscape: Boolean(p.isInternetExplorer() && p.getInternetExplorerMajorVersion() < 7)
                    }, p.isEmptyObject = function(e) {
                        for (var t in e)
                            if (e.hasOwnProperty(t)) return !1;
                        return !0
                    }, p.cloneObject = function(e) {
                        var t, n;
                        return e ? (t = u.stringify(e), n = u.parse(t)) : n = {}, n
                    }, p.getRootUrl = function() {
                        var e = i.location.protocol + "//" + (i.location.hostname || i.location.host);
                        return i.location.port && (e += ":" + i.location.port), e += "/"
                    }, p.getBaseHref = function() {
                        var e = i.getElementsByTagName("base"),
                            t = null,
                            n = "";
                        return 1 === e.length && (t = e[0], n = t.href.replace(/[^\/]+$/, "")), n = n.replace(/\/+$/, ""), n && (n += "/"), n
                    }, p.getBaseUrl = function() {
                        var e = p.getBaseHref() || p.getBasePageUrl() || p.getRootUrl();
                        return e
                    }, p.getPageUrl = function() {
                        var e, t = p.getState(!1, !1),
                            n = (t || {}).url || p.getLocationHref();
                        return e = n.replace(/\/+$/, "").replace(/[^\/]+$/, function(e) {
                            return /\./.test(e) ? e : e + "/"
                        })
                    }, p.getBasePageUrl = function() {
                        var e = p.getLocationHref().replace(/[#\?].*/, "").replace(/[^\/]+$/, function(e) {
                            return /[^\/]$/.test(e) ? "" : e
                        }).replace(/\/+$/, "") + "/";
                        return e
                    }, p.getFullUrl = function(e, t) {
                        var n = e,
                            i = e.substring(0, 1);
                        return t = "undefined" == typeof t ? !0 : t, /[a-z]+\:\/\//.test(e) || (n = "/" === i ? p.getRootUrl() + e.replace(/^\/+/, "") : "#" === i ? p.getPageUrl().replace(/#.*/, "") + e : "?" === i ? p.getPageUrl().replace(/[\?#].*/, "") + e : t ? p.getBaseUrl() + e.replace(/^(\.\/)+/, "") : p.getBasePageUrl() + e.replace(/^(\.\/)+/, "")), n.replace(/\#$/, "")
                    }, p.getShortUrl = function(e) {
                        var t = e,
                            n = p.getBaseUrl(),
                            i = p.getRootUrl();
                        return p.emulated.pushState && (t = t.replace(n, "")), t = t.replace(i, "/"), p.isTraditionalAnchor(t) && (t = "./" + t), t = t.replace(/^(\.\/)+/g, "./").replace(/\#$/, "")
                    }, p.getLocationHref = function(e) {
                        return e = e || i, e.URL === e.location.href ? e.location.href : e.location.href === decodeURIComponent(e.URL) ? e.URL : e.location.hash && decodeURIComponent(e.location.href.replace(/^[^#]+/, "")) === e.location.hash ? e.location.href : -1 == e.URL.indexOf("#") && -1 != e.location.href.indexOf("#") ? e.location.href : e.URL || e.location.href
                    }, p.store = {}, p.idToState = p.idToState || {}, p.stateToId = p.stateToId || {}, p.urlToId = p.urlToId || {}, p.storedStates = p.storedStates || [], p.savedStates = p.savedStates || [], p.normalizeStore = function() {
                        p.store.idToState = p.store.idToState || {}, p.store.urlToId = p.store.urlToId || {}, p.store.stateToId = p.store.stateToId || {}
                    }, p.getState = function(e, t) {
                        "undefined" == typeof e && (e = !0), "undefined" == typeof t && (t = !0);
                        var n = p.getLastSavedState();
                        return !n && t && (n = p.createStateObject()), e && (n = p.cloneObject(n), n.url = n.cleanUrl || n.url), n
                    }, p.getIdByState = function(e) {
                        var t, n = p.extractId(e.url);
                        if (!n)
                            if (t = p.getStateString(e), "undefined" != typeof p.stateToId[t]) n = p.stateToId[t];
                            else if ("undefined" != typeof p.store.stateToId[t]) n = p.store.stateToId[t];
                        else {
                            for (; n = (new Date).getTime() + String(Math.random()).replace(/\D/g, ""), "undefined" != typeof p.idToState[n] || "undefined" != typeof p.store.idToState[n];);
                            p.stateToId[t] = n, p.idToState[n] = e
                        }
                        return n
                    }, p.normalizeState = function(e) {
                        var t, n;
                        return e && "object" == typeof e || (e = {}), "undefined" != typeof e.normalized ? e : (e.data && "object" == typeof e.data || (e.data = {}), t = {}, t.normalized = !0, t.title = e.title || "", t.url = p.getFullUrl(e.url ? e.url : p.getLocationHref()), t.hash = p.getShortUrl(t.url), t.data = p.cloneObject(e.data), t.id = p.getIdByState(t), t.cleanUrl = t.url.replace(/\??\&_suid.*/, ""), t.url = t.cleanUrl, n = !p.isEmptyObject(t.data), (t.title || n) && p.options.disableSuid !== !0 && (t.hash = p.getShortUrl(t.url).replace(/\??\&_suid.*/, ""), /\?/.test(t.hash) || (t.hash += "?"), t.hash += "&_suid=" + t.id), t.hashedUrl = p.getFullUrl(t.hash), (p.emulated.pushState || p.bugs.safariPoll) && p.hasUrlDuplicate(t) && (t.url = t.hashedUrl), t)
                    }, p.createStateObject = function(e, t, n) {
                        var i = {
                            data: e,
                            title: t,
                            url: n
                        };
                        return i = p.normalizeState(i)
                    }, p.getStateById = function(e) {
                        e = String(e);
                        var n = p.idToState[e] || p.store.idToState[e] || t;
                        return n
                    }, p.getStateString = function(e) {
                        var t, n, i;
                        return t = p.normalizeState(e), n = {
                            data: t.data,
                            title: e.title,
                            url: e.url
                        }, i = u.stringify(n)
                    }, p.getStateId = function(e) {
                        var t, n;
                        return t = p.normalizeState(e), n = t.id
                    }, p.getHashByState = function(e) {
                        var t, n;
                        return t = p.normalizeState(e), n = t.hash
                    }, p.extractId = function(e) {
                        var t, n, i, o;
                        return o = -1 != e.indexOf("#") ? e.split("#")[0] : e, n = /(.*)\&_suid=([0-9]+)$/.exec(o), i = n ? n[1] || e : e, t = n ? String(n[2] || "") : "", t || !1
                    }, p.isTraditionalAnchor = function(e) {
                        var t = !/[\/\?\.]/.test(e);
                        return t
                    }, p.extractState = function(e, t) {
                        var n, i, o = null;
                        return t = t || !1, n = p.extractId(e), n && (o = p.getStateById(n)), o || (i = p.getFullUrl(e), n = p.getIdByUrl(i) || !1, n && (o = p.getStateById(n)), !o && t && !p.isTraditionalAnchor(e) && (o = p.createStateObject(null, null, i))), o
                    }, p.getIdByUrl = function(e) {
                        var n = p.urlToId[e] || p.store.urlToId[e] || t;
                        return n
                    }, p.getLastSavedState = function() {
                        return p.savedStates[p.savedStates.length - 1] || t
                    }, p.getLastStoredState = function() {
                        return p.storedStates[p.storedStates.length - 1] || t
                    }, p.hasUrlDuplicate = function(e) {
                        var t, n = !1;
                        return t = p.extractState(e.url), n = t && t.id !== e.id
                    }, p.storeState = function(e) {
                        return p.urlToId[e.url] = e.id, p.storedStates.push(p.cloneObject(e)), e
                    }, p.isLastSavedState = function(e) {
                        var t, n, i, o = !1;
                        return p.savedStates.length && (t = e.id, n = p.getLastSavedState(), i = n.id, o = t === i), o
                    }, p.saveState = function(e) {
                        return p.isLastSavedState(e) ? !1 : (p.savedStates.push(p.cloneObject(e)), !0)
                    }, p.getStateByIndex = function(e) {
                        var t = null;
                        return t = "undefined" == typeof e ? p.savedStates[p.savedStates.length - 1] : 0 > e ? p.savedStates[p.savedStates.length + e] : p.savedStates[e]
                    }, p.getCurrentIndex = function() {
                        var e = null;
                        return e = p.savedStates.length < 1 ? 0 : p.savedStates.length - 1
                    }, p.getHash = function(e) {
                        var t, n = p.getLocationHref(e);
                        return t = p.getHashByUrl(n)
                    }, p.unescapeHash = function(e) {
                        var t = p.normalizeHash(e);
                        return t = decodeURIComponent(t)
                    }, p.normalizeHash = function(e) {
                        var t = e.replace(/[^#]*#/, "").replace(/#.*/, "");
                        return t
                    }, p.setHash = function(e, t) {
                        var n, o;
                        return t !== !1 && p.busy() ? (p.pushQueue({
                            scope: p,
                            callback: p.setHash,
                            args: arguments,
                            queue: t
                        }), !1) : (p.busy(!0), n = p.extractState(e, !0), n && !p.emulated.pushState ? p.pushState(n.data, n.title, n.url, !1) : p.getHash() !== e && (p.bugs.setHash ? (o = p.getPageUrl(), p.pushState(null, null, o + "#" + e, !1)) : i.location.hash = e), p)
                    }, p.escapeHash = function(t) {
                        var n = p.normalizeHash(t);
                        return n = e.encodeURIComponent(n), p.bugs.hashEscape || (n = n.replace(/\%21/g, "!").replace(/\%26/g, "&").replace(/\%3D/g, "=").replace(/\%3F/g, "?")), n
                    }, p.getHashByUrl = function(e) {
                        var t = String(e).replace(/([^#]*)#?([^#]*)#?(.*)/, "$2");
                        return t = p.unescapeHash(t)
                    }, p.setTitle = function(e) {
                        var t, n = e.title;
                        n || (t = p.getStateByIndex(0), t && t.url === e.url && (n = t.title || p.options.initialTitle));
                        try {
                            i.getElementsByTagName("title")[0].innerHTML = n.replace("<", "&lt;").replace(">", "&gt;").replace(" & ", " &amp; ")
                        } catch (o) {}
                        return i.title = n, p
                    }, p.queues = [], p.busy = function(e) {
                        if ("undefined" != typeof e ? p.busy.flag = e : "undefined" == typeof p.busy.flag && (p.busy.flag = !1), !p.busy.flag) {
                            s(p.busy.timeout);
                            var t = function() {
                                var e, n, i;
                                if (!p.busy.flag)
                                    for (e = p.queues.length - 1; e >= 0; --e) n = p.queues[e], 0 !== n.length && (i = n.shift(), p.fireQueueItem(i), p.busy.timeout = a(t, p.options.busyDelay))
                            };
                            p.busy.timeout = a(t, p.options.busyDelay)
                        }
                        return p.busy.flag
                    }, p.busy.flag = !1, p.fireQueueItem = function(e) {
                        return e.callback.apply(e.scope || p, e.args || [])
                    }, p.pushQueue = function(e) {
                        return p.queues[e.queue || 0] = p.queues[e.queue || 0] || [], p.queues[e.queue || 0].push(e), p
                    }, p.queue = function(e, t) {
                        return "function" == typeof e && (e = {
                            callback: e
                        }), "undefined" != typeof t && (e.queue = t), p.busy() ? p.pushQueue(e) : p.fireQueueItem(e), p
                    }, p.clearQueue = function() {
                        return p.busy.flag = !1, p.queues = [], p
                    }, p.stateChanged = !1, p.doubleChecker = !1, p.doubleCheckComplete = function() {
                        return p.stateChanged = !0, p.doubleCheckClear(), p
                    }, p.doubleCheckClear = function() {
                        return p.doubleChecker && (s(p.doubleChecker), p.doubleChecker = !1), p
                    }, p.doubleCheck = function(e) {
                        return p.stateChanged = !1, p.doubleCheckClear(), p.bugs.ieDoubleCheck && (p.doubleChecker = a(function() {
                            return p.doubleCheckClear(), p.stateChanged || e(), !0
                        }, p.options.doubleCheckInterval)), p
                    }, p.safariStatePoll = function() {
                        var t, n = p.extractState(p.getLocationHref());
                        return p.isLastSavedState(n) ? void 0 : (t = n, t || (t = p.createStateObject()), p.Adapter.trigger(e, "popstate"), p)
                    }, p.back = function(e) {
                        return e !== !1 && p.busy() ? (p.pushQueue({
                            scope: p,
                            callback: p.back,
                            args: arguments,
                            queue: e
                        }), !1) : (p.busy(!0), p.doubleCheck(function() {
                            p.back(!1)
                        }), h.go(-1), !0)
                    }, p.forward = function(e) {
                        return e !== !1 && p.busy() ? (p.pushQueue({
                            scope: p,
                            callback: p.forward,
                            args: arguments,
                            queue: e
                        }), !1) : (p.busy(!0), p.doubleCheck(function() {
                            p.forward(!1)
                        }), h.go(1), !0)
                    }, p.go = function(e, t) {
                        var n;
                        if (e > 0)
                            for (n = 1; e >= n; ++n) p.forward(t);
                        else {
                            if (!(0 > e)) throw new Error("History.go: History.go requires a positive or negative integer passed.");
                            for (n = -1; n >= e; --n) p.back(t)
                        }
                        return p
                    }, p.emulated.pushState) {
                    var f = function() {};
                    p.pushState = p.pushState || f, p.replaceState = p.replaceState || f
                } else p.onPopState = function(t, n) {
                    var i, o, r = !1,
                        a = !1;
                    return p.doubleCheckComplete(), i = p.getHash(), i ? (o = p.extractState(i || p.getLocationHref(), !0), o ? p.replaceState(o.data, o.title, o.url, !1) : (p.Adapter.trigger(e, "anchorchange"), p.busy(!1)), p.expectedStateId = !1, !1) : (r = p.Adapter.extractEventData("state", t, n) || !1, a = r ? p.getStateById(r) : p.expectedStateId ? p.getStateById(p.expectedStateId) : p.extractState(p.getLocationHref()), a || (a = p.createStateObject(null, null, p.getLocationHref())), p.expectedStateId = !1, p.isLastSavedState(a) ? (p.busy(!1), !1) : (p.storeState(a), p.saveState(a), p.setTitle(a), p.Adapter.trigger(e, "statechange"), p.busy(!1), !0))
                }, p.Adapter.bind(e, "popstate", p.onPopState), p.pushState = function(t, n, i, o) {
                    if (p.getHashByUrl(i) && p.emulated.pushState) throw new Error("History.js does not support states with fragement-identifiers (hashes/anchors).");
                    if (o !== !1 && p.busy()) return p.pushQueue({
                        scope: p,
                        callback: p.pushState,
                        args: arguments,
                        queue: o
                    }), !1;
                    p.busy(!0);
                    var r = p.createStateObject(t, n, i);
                    return p.isLastSavedState(r) ? p.busy(!1) : (p.storeState(r), p.expectedStateId = r.id, h.pushState(r.id, r.title, r.url), p.Adapter.trigger(e, "popstate")), !0
                }, p.replaceState = function(t, n, i, o) {
                    if (p.getHashByUrl(i) && p.emulated.pushState) throw new Error("History.js does not support states with fragement-identifiers (hashes/anchors).");
                    if (o !== !1 && p.busy()) return p.pushQueue({
                        scope: p,
                        callback: p.replaceState,
                        args: arguments,
                        queue: o
                    }), !1;
                    p.busy(!0);
                    var r = p.createStateObject(t, n, i);
                    return p.isLastSavedState(r) ? p.busy(!1) : (p.storeState(r), p.expectedStateId = r.id, h.replaceState(r.id, r.title, r.url), p.Adapter.trigger(e, "popstate")), !0
                };
                if (r) {
                    try {
                        p.store = u.parse(r.getItem("History.store")) || {}
                    } catch (m) {
                        p.store = {}
                    }
                    p.normalizeStore()
                } else p.store = {}, p.normalizeStore();
                p.Adapter.bind(e, "unload", p.clearAllIntervals), p.saveState(p.storeState(p.extractState(p.getLocationHref(), !0))), r && (p.onUnload = function() {
                    var e, t, n;
                    try {
                        e = u.parse(r.getItem("History.store")) || {}
                    } catch (i) {
                        e = {}
                    }
                    e.idToState = e.idToState || {}, e.urlToId = e.urlToId || {}, e.stateToId = e.stateToId || {};
                    for (t in p.idToState) p.idToState.hasOwnProperty(t) && (e.idToState[t] = p.idToState[t]);
                    for (t in p.urlToId) p.urlToId.hasOwnProperty(t) && (e.urlToId[t] = p.urlToId[t]);
                    for (t in p.stateToId) p.stateToId.hasOwnProperty(t) && (e.stateToId[t] = p.stateToId[t]);
                    p.store = e, p.normalizeStore(), n = u.stringify(e);
                    try {
                        r.setItem("History.store", n)
                    } catch (o) {
                        if (o.code !== DOMException.QUOTA_EXCEEDED_ERR) throw o;
                        r.length && (r.removeItem("History.store"), r.setItem("History.store", n))
                    }
                }, p.intervalList.push(l(p.onUnload, p.options.storeInterval)), p.Adapter.bind(e, "beforeunload", p.onUnload), p.Adapter.bind(e, "unload", p.onUnload)), p.emulated.pushState || (p.bugs.safariPoll && p.intervalList.push(l(p.safariStatePoll, p.options.safariPollInterval)), ("Apple Computer, Inc." === o.vendor || "Mozilla" === (o.appCodeName || "")) && (p.Adapter.bind(e, "hashchange", function() {
                    p.Adapter.trigger(e, "popstate")
                }), p.getHash() && p.Adapter.onDomLoad(function() {
                    p.Adapter.trigger(e, "hashchange")
                })))
            }, (!p.options || !p.options.delayInit) && p.init()
        }(window), define("historyJs", ["jquery"], function() {}), define("components/overlay", ["require", "jquery", "historyJs"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = (e("historyJs"), '<div class="overlay"><div class="overlay-content"><div class="inner"></div><a href="#" class="close">Đóng</a></div></div>'),
                i = function(e) {
                    t(".close, .ok", e).click(function(n) {
                        e.fadeOut("fast", function() {
                            e.remove(), History.getState().data && History.getState().data.href && History.pushState(null, null, History.getState().data.href), 0 == t(".overlay").size() && t("body").removeClass("showing-overlay")
                        }), n.preventDefault()
                    }), e.click(function(n) {
                        e.is(n.target) && t(".close", e).click()
                    }), t(document).keydown(function(n) {
                        27 == n.keyCode && t(".close", e).click()
                    }), window.addEventListener("popstate", function() {
                        e.is(":visible") && t(".close", e).click()
                    }, !1)
                };
            return {
                open: function(e, o, r, a) {
                    var s = e.clone(!0, !0);
                    a ? t(".overlay").remove() : t(".overlay").filter(":not(:first)").remove();
                    var l = t(n).addClass(o);
                    l.find(".overlay-content .inner").empty().append(s), t("body").append(l), l.fadeIn("fast"), i(l), t("body").addClass("showing-overlay"), l.find(".button.ok").focus(), t.isFunction(r) && r(s, l)
                },
                openAlert: function(e, n, i) {
                    var o = t('<div><a href="#" class="button ok">OK</a></div>').prepend(e);
                    this.open(o, n, i)
                },
                openConfirm: function(e, n, i) {
                    var o = t('<div class="overlay-confirm"><a class="button secondary no">Không</a> <a class="button yes">OK</a></div>').prepend("<p>" + e + "</p>");
                    this.open(o, i, function(e, i) {
                        e.find(".yes").click(function(e) {
                            n(!0), t(".close", i).click(), e.preventDefault()
                        }), e.find(".no").click(function(e) {
                            n(!1), t(".close", i).click(), e.preventDefault()
                        })
                    })
                },
                close: function() {
                    t(".close", $overlay).click()
                }
            }
        }), define("components/gallery", ["require", "owlcarousel", "components/overlay"], function(e) {
            "use strict";
            e("owlcarousel");
            var t = e("components/overlay"),
                n = function() {
                    $("#detail .carousel, #collection-detail .carousel, #disease-detail .carousel, #promotion-detail .carousel").each(function() {
                        if (!$(this).hasClass("no-image")) {
                            var e = $(this).show(),
                                t = Math.floor(e.width() / e.find(".item").width());
                            if ($(this).owlCarousel({
                                    items: t,
                                    nav: !0,
                                    rewind: !1,
                                    navText: !1,
                                    dots: !1,
                                    onTranslate: function(t) {
                                        if (e.hasClass("primary")) {
                                            var n = t.item.index,
                                                i = $(e.attr("data-sync"));
                                            e.find(".owl-item").removeClass("selected").eq(n).addClass("selected"), i.find(".owl-item").removeClass("selected").eq(n).addClass("selected"), i.trigger("to.owl.carousel", n)
                                        }
                                    },
                                    onInitialized: function() {
                                        e.find(".owl-item").eq(0).addClass("selected")
                                    }
                                }), e.hasClass("secondary")) {
                                var n = $($(this).attr("data-sync"));
                                e.on("click", ".owl-item", function(e) {
                                    n.trigger("to.owl.carousel", [$(this).index()]), e.preventDefault()
                                })
                            }
                        }
                    })
                },
                i = function() {
                    $("#detail .carousel.primary .item a, #collection-detail .carousel.primary .item a, #disease-detail .carousel.primary .item a, #thread-detail .media a, #collection-detail .media a").each(function() {
                        $(this).on("click", function(e) {
                            var n = $(this).parents(".media").find(".full-sized-images");
                            if ($("#thread-detail").length || $("#collection-detail").length) {
                                var i = $(this).parent("li");
                                t.open($(n), "carousel-overlay", function(e) {
                                    e.owlCarousel({
                                        items: 1,
                                        nav: !0,
                                        navText: !1,
                                        navSpeed: 500,
                                        rewind: !1
                                    }).trigger("to.owl.carousel", [$(i).index()])
                                })
                            } else t.open($(n), "carousel-overlay", function(e) {
                                $(".image", e).each(function() {
                                    $(this).attr("style", $(this).attr("data-style"))
                                }), e.owlCarousel({
                                    items: 1,
                                    nav: !0,
                                    navText: !1,
                                    navSpeed: 500,
                                    rewind: !1
                                }).trigger("to.owl.carousel", [$("#detail .carousel.primary .owl-item.active, #collection-detail .carousel.primary .owl-item.active, #disease-detail .carousel.primary .owl-item.active").index()])
                            });
                            e.preventDefault()
                        })
                    })
                },
                o = function() {
                    $(".has-fullsize-overlay").each(function() {
                        $(this).on("click", function(e) {
                            $("body").hasClass("showing-overlay") || (t.open($('<img src="' + $(this).data("origin-image") + '">'), "full-image-overlay", function() {}), e.preventDefault())
                        })
                    })
                };
            return {
                init: function() {
                    n(), i(), o()
                }
            }
        }), define("components/content", ["require"], function() {
            "use strict";
            var e = 11,
                t = 15,
                n = 3,
                i = 400,
                o = '<li class="readmore-li"><a href="#" class="readmore-trigger"><span class="readmore-trigger-collapsing">Xem đầy đủ <i class="fa fa-angle-double-right"></i></span><span class="readmore-trigger-expanding"><i class="fa fa-angle-double-left"></i> Thu gọn danh sách</span></a></li>',
                r = '<a href="#" class="readmore-trigger has-count"><span class="readmore-trigger-collapsing">Hiển thị tất cả (<span class="readmore-count"></span>) <i class="fa fa-plus-square-o"></i></span><span class="readmore-trigger-expanding">Thu gọn <i class="fa fa-minus-square-o"></i></span></a>',
                a = '<span class="readmore-trigger-collapsing">... <a href="#" class="readmore-trigger">Xem đầy đủ <i class="fa fa-angle-double-right"></i></a></span><span class="readmore-trigger-expanding"> <a href="#" class="readmore-trigger"><i class="fa fa-angle-double-left"></i> Thu gọn</a></span>',
                s = function(e, t, n) {
                    for (var i = Math.ceil(e.children().size() / t), o = $('<div class="list-container"></div>'), r = 0; t > r; r++) {
                        var a = $("<ul></ul>").addClass(n);
                        a.append(e.children().slice(r * i, (r + 1) * i).clone()), o.append(a)
                    }
                    return o
                },
                l = function(e) {
                    var t = {};
                    $("li", e).each(function() {
                        var e = $.trim($(this).html(function(e, t) {
                            return t.replace(/&nbsp;/g, " ").replace(/\s{2,}/g, " ")
                        }).text().toLowerCase());
                        t[e] ? $(this).remove() : t[e] = !0
                    })
                },
                c = function(i) {
                    n = i.attr("data-cols") ? parseInt(i.attr("data-cols")) : n;
                    var a = i.find("> ul");
                    l(a);
                    var c = a.attr("class");
                    a.addClass("original-list");
                    var u = a.clone();
                    if (a.children().size() > t) {
                        i.addClass("collapsed").prepend(r), $(".readmore-count", i).text(a.children().size()), u.last().append(o);
                        var d = $("<ul></ul>").append(a.children().slice(0, e).clone());
                        d.append(o), d = s(d, n, c).addClass("short-list"), i.append(d)
                    }
                    u = s(u, n, c).addClass("full-list"), i.append(u);
                    var p = i.find(".readmore-trigger");
                    p.show(), p.on("click", function(e) {
                        e.preventDefault(), i.toggleClass("collapsed")
                    })
                },
                u = function(e) {
                    var t = e.html();
                    if (e.hasClass("custom-readmore-content") && (i = e.data("contentLength")), !(t.length - 100 <= i)) {
                        var n = t.indexOf(" ", i),
                            o = $('<div class="collapsed-version">' + t.substring(0, n) + "</div>"),
                            r = $('<div class="full-version">' + t + "</div>");
                        e.html("").append(r).append(o), e.addClass("collapsed"), o.children(":not(br)").size() > 0 ? o.children(":not(br)").last().append(a) : o.append(a), r.children(":not(br)").size() > 0 ? r.children(":not(br)").last().append(a) : r.append(a), e.find(".readmore-trigger").on("click", function(t) {
                            t.preventDefault(), e.toggleClass("collapsed")
                        })
                    }
                };
            return {
                init: function() {
                    $(".has-readmore-content").each(function() {
                        $(this).children().first().is("ul") && !$(this).hasClass("free-text") ? c($(this)) : u($(this))
                    })
                }
            }
        }), define("components/user-location", ["require", "js-cookie"], function(e, t) {
            "use strict";
            return {
                init: function() {
                    var e = $("#location-switch"),
                        n = $("#location-switch-home"),
                        i = t("province");
                    n.change(function() {
                        t("province", $(this).val(), {
                            expires: 365
                        })
                    }), e.change(function() {
                        t("province", $(this).val(), {
                            expires: 365
                        }), location.reload()
                    }), i && (e.val(i), n.val(i))
                }
            }
        }), define("components/suggestion", ["jquery"], function(e) {
            var t = require("components/util");
            return e.fn.suggestion = function(n) {
                var i, o, r, a = -1,
                    s = (n.source ? n.source : [], n.maxItems ? n.maxItems : 10, function(e) {
                        return e.value && e.value.toUpperCase().indexOf(o.val().toUpperCase()) > -1 ? !0 : !1
                    }),
                    l = (n.mapper ? n.mapper : s, function() {
                        r = o.wrap("<div class='has-suggestion'></div>").parent(), i = e('<div class="suggestion"></div>').hide(), r.append(i), i.on("hide", function() {
                            a = -1
                        }), i.select = function(t) {
                            var n = i.find("a").removeClass("focus"),
                                o = n.length,
                                t = t % o;
                            return e(n[t]).addClass("focus"), t
                        }
                    }),
                    c = function() {
                        o.on("input", function() {
                            return o.parent().addClass("loading").siblings('button[type="submit"]').addClass("loading"), "" === o.val().trim() ? (o.parent().removeClass("loading").siblings('button[type="submit"]').removeClass("loading"), i.hide(), void(a = -1)) : void n.lookup(o.val(), function(e) {
                                o.parent().removeClass("loading").siblings('button[type="submit"]').removeClass("loading"), 0 === e.length ? (i.hide(), a = -1) : (d(e), i.show(), i.find("a").on("click", function(t) {
                                    n.onSelect(t, e[i.find("a").index(this)], i)
                                }))
                            })
                        }), o.on("keydown", function(e) {
                            if (40 != e.keyCode) {
                                if (38 == e.keyCode) {
                                    -1 >= a ? a = -1 : a--;
                                    var n = i.select(a),
                                        r = i.find("a").eq(n).offset().top - i.offset().top + i.scrollTop() - i.height() / 2;
                                    return void t.scrollTo(r, 200, i)
                                }
                                return 27 === e.keyCode && i.is(":visible") ? (e.preventDefault(), e.stopPropagation(), i.hide(), a = -1, !1) : void 0
                            }
                            if (i.is(":visible")) {
                                if (a + 1 < i.find("a").size()) {
                                    a++;
                                    var n = i.select(a),
                                        r = i.find("a").eq(n).offset().top - i.offset().top + i.scrollTop() - i.height() / 2;
                                    t.scrollTo(r, 200, i)
                                }
                            } else o.trigger("input")
                        }), e("body").on("click", function(e) {
                            r.is(e.target) || (i.hide(), a = -1)
                        })
                    },
                    u = ' 			<ul> 				<% for (var i = 0; i < obj.length; i++) { %> 					<li class="group <%= obj[i].groupClass %>"> 						<% if (obj[i].groupName) { %> 							<h2> 								<a href="<%= obj[i].groupUrl %>"> 									<%= obj[i].groupIcon %><%= obj[i].groupName %> 									<span class="view-all">Xem tất cả <i class="fa fa-angle-double-right"></i></span> 								</a> 							</h2> 						<% } %> 						<ul> 							<% for (var j = 0; j < obj[i].items.length; j++) { %> 								<li class="item"> 									<a href="<%= obj[i].items[j].url %>"> 										<span class="image" <% if (obj[i].items[j].image) { %>style="background-image: url(<%=obj[i].items[j].image%>)"<% } %>></span> 										<% if (obj[i].items[j].name) { %> 											<span class="title"><%=obj[i].items[j].name%></span> 										<% } %> 										<% if (obj[i].items[j].subtitle) { %> 											<span class="subtitle"><%=obj[i].items[j].subtitle%></span> 										<% } %> 										<% if (obj[i].items[j].icon) { %> 											<span class="icon"><%=obj[i].items[j].icon%></span> 										<% } %> 										<% if (obj[i].items[j].body_search) { %> 											<div class="preview"><%=obj[i].items[j].body_search%></div> 										<% } %> 									</a> 								</li> 							<% } %> 						</ul> 					</li> 				<% } %> 			</ul> 		',
                    d = function(e) {
                        i.html(_.template(u)(e))
                    };
                return this.each(function() {
                    o = e(this), l(), c(), o.attr("autocomplete", "off")
                })
            }, e
        }), define("components/config", ["require"], function() {
            "use strict";
            return {
                api: {
                    search: "/api/v1/site/",
                    searchV2: "/api/v1/search",
                    customer: {
                        create: "/api/v1/customer/create/",
                        source: {
                            subscribe: "subscribe",
                            booking: "booking",
                            review: "review"
                        }
                    },
                    place: {
                        comment: {
                            create: "/api/v1/place/comment/create/",
                            put: "/api/v1/place/comment/"
                        }
                    },
                    professional: {
                        comment: {
                            create: "/api/v1/professional/comment/create",
                            put: "/api/v1/professional/comment/"
                        },
                        list: "/api/v1/professional-list/{id}",
                        serviceSearch: "/api/v1/site/",
                        edit: "/api/v1/professional/{id}/change-request/",
                        image: "/api/v1/professional/{id}/image/"
                    },
                    phone: "/api/v1/place/{id}/phone/",
                    booking: "/api/v1/booking/",
                    slot: "/api/v1/slot/?place={place}&professional={professional}",
                    newQuestion: "/api/v1/thread",
                    signup: "/api/v1/signup/",
                    login: "/api/v1/login/",
                    confirm: "/api/v1/confirm/{token}/",
                    forumFeedback: "/api/v1/forum-post-feedback/",
                    commentVoting: "/api/v1/comment-voting/",
                    promotionClaim: "/api/v1/promotion-claim/",
                    account: {
                        signup: "/dang-ky",
                        login: "/dang-nhap",
                        reset: "/quen-mat-khau/",
                        logout: "/dang-xuat/"
                    },
                    post: {
                        newPost: "/api/v1/post",
                        updatePost: "/api/v1/post/{post_id}",
                        getPost: "/api/v1/post/{post_id}",
                        replyerAutocomplete: "/autocomplete/ReplyerAutoComplete/",
                        favourite: "/api/v1/collection/",
                        deleteImage: "/api/v1/postImage/{post_image_id}",
                        updateCaption: "/api/v1/postImage/{post_image_id}",
                        addMoreImage: "/api/v1/post/{post_id}",
                        createdByAutocomplete: "/autocomplete/CreatedByAutoComplete/",
                        assignedTo: "/api/v1/thread/{thread_id}/",
                        postAssignment: "/api/v1/post/post_assignment/"
                    }
                }
            }
        }), define("components/search", ["require", "jquery", "components/suggestion", "components/util", "components/config", "js-cookie"], function(e) {
            "use strict";
            e("jquery"), e("components/suggestion");
            var t = (e("components/util"), e("components/config")),
                n = e("js-cookie"),
                i = 6,
                o = function(e) {
                    return {
                        name: e.name,
                        subtitle: e.specialities_nested ? e.specialities_nested.length > 1 ? e.specialities_nested[0].name + " và " + (e.specialities_nested.length - 1) + " chuyên khoa khác." : e.specialities_nested[0].name : "",
                        image: e.main_thumbnail_image,
                        url: e.absolute_url,
                        icon: ""
                    }
                },
                r = function(e) {
                    return {
                        name: e.name,
                        subtitle: e.address ? e.address : "",
                        image: e.main_thumbnail_image,
                        url: e.absolute_url,
                        icon: ""
                    }
                },
                a = function(e) {
                    return {
                        name: e.name,
                        image: e.main_thumbnail_image,
                        url: e.absolute_url
                    }
                },
                s = function(e) {
                    return {
                        name: e.name,
                        url: e.absolute_url,
                        body_search: e.body_search
                    }
                },
                l = function(e) {
                    return {
                        name: e.name,
                        url: e.absolute_url,
                        body_search: e.body_search,
                        image: e.main_thumbnail_image
                    }
                },
                c = function(e) {
                    return {
                        name: e.name,
                        url: e.absolute_url,
                        subtitle: e.type ? e.type : ""
                    }
                },
                u = function(e) {
                    var t = [];
                    return "professional_index" == e.object_type ? t.push({
                        groupName: "Bác sĩ",
                        groupIcon: '<i class="fa fa-user-md"></i>',
                        groupClass: "professional",
                        groupUrl: e.list_url,
                        items: e.items.map(o)
                    }) : "place_index" == e.object_type ? t.push({
                        groupName: "Cơ sở y tế",
                        groupIcon: '<i class="fa fa-hospital-o"></i>',
                        groupClass: "place",
                        groupUrl: e.list_url,
                        items: e.items.map(r)
                    }) : "service_index" == e.object_type ? t.push({
                        groupName: "Dịch vụ",
                        groupIcon: '<i class="fa fa-h-square"></i>',
                        groupClass: "service",
                        groupUrl: e.list_url,
                        items: e.items.map(s)
                    }) : "speciality_index" == e.object_type ? t.push({
                        groupName: "Chuyên khoa",
                        groupIcon: '<i class="fa fa-stethoscope"></i>',
                        groupClass: "speciality",
                        groupUrl: e.list_url,
                        items: e.items.map(s)
                    }) : "thread_index" == e.object_type ? t.push({
                        groupName: "Câu hỏi",
                        groupIcon: '<i class="fa fa-comments"></i>',
                        groupClass: "thread",
                        groupUrl: e.list_url,
                        items: e.items.map(s)
                    }) : "collection_index_place" == e.object_type ? t.push({
                        groupName: "Tuyển chọn cơ sở y tế",
                        groupIcon: '<i class="fa fa-hospital-o"></i>',
                        groupClass: "collection_place",
                        groupUrl: e.list_url,
                        items: e.items.map(l)
                    }) : "collection_index_professional" == e.object_type ? t.push({
                        groupName: "Tuyển chọn bác sĩ",
                        groupIcon: '<i class="fa fa-user-md"></i>',
                        groupClass: "collection_professional",
                        groupUrl: e.list_url,
                        items: e.items.map(l)
                    }) : "collection_index_thread" == e.object_type ? t.push({
                        groupName: "Tuyển chọn câu hỏi",
                        groupIcon: '<i class="fa fa-comments"></i>',
                        groupClass: "collection_thread",
                        groupUrl: e.list_url,
                        items: e.items.map(l)
                    }) : "disease_index" == e.object_type ? t.push({
                        groupName: "Bệnh",
                        groupIcon: '<i class="fa fa-bed"></i>',
                        groupClass: "disease",
                        groupUrl: e.list_url,
                        items: e.items.map(a)
                    }) : "drug_medication_index" == e.object_type && t.push({
                        groupName: "Thuốc & Dược chất",
                        groupIcon: '<i class="fa fa-toggle-on"></i>',
                        groupClass: "drug",
                        groupUrl: e.list_url,
                        items: e.items.map(c)
                    }), t
                },
                d = function(e) {
                    var t = [],
                        n = 0;
                    return $.each(e, function(e, o) {
                        var r = u(o),
                            a = !1;
                        return r.forEach(function(e) {
                            a || (t.push(e), n++, n >= i && (a = !0))
                        }), a ? !1 : void 0
                    }), t
                },
                p = function(e, t, n) {
                    var i;
                    return function() {
                        var o = this,
                            r = arguments,
                            a = function() {
                                i = null, n || e.apply(o, r)
                            },
                            s = n && !i;
                        clearTimeout(i), i = setTimeout(a, t), s && e.apply(o, r)
                    }
                };
            return {
                init: function() {
                    $("#search-input, #search-input-home").each(function() {
                        var e = $(this);
                        e.suggestion({
                            lookup: p(function(i, o) {
                                e.closest("form");
                                $.ajax(t.api.searchV2, {
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    data: {
                                        province: n("province"),
                                        q: i
                                    }
                                }).done(function(e) {
                                    o(d(e, i))
                                }).always(p(function() {}, 400))
                            }, 200),
                            onSelect: function(e) {
                                window.location = $(e.target).attr("href")
                            }
                        })
                    })
                }
            }
        }),
        function() {
            function e(e) {
                function t(t, n, i, o, r, a) {
                    for (; r >= 0 && a > r; r += e) {
                        var s = o ? o[r] : r;
                        i = n(i, t[s], s, t)
                    }
                    return i
                }
                return function(n, i, o, r) {
                    i = b(i, r, 4);
                    var a = !S(n) && y.keys(n),
                        s = (a || n).length,
                        l = e > 0 ? 0 : s - 1;
                    return arguments.length < 3 && (o = n[a ? a[l] : l], l += e), t(n, i, o, a, l, s)
                }
            }

            function t(e) {
                return function(t, n, i) {
                    n = x(n, i);
                    for (var o = T(t), r = e > 0 ? 0 : o - 1; r >= 0 && o > r; r += e)
                        if (n(t[r], r, t)) return r;
                    return -1
                }
            }

            function n(e, t, n) {
                return function(i, o, r) {
                    var a = 0,
                        s = T(i);
                    if ("number" == typeof r) e > 0 ? a = r >= 0 ? r : Math.max(r + s, a) : s = r >= 0 ? Math.min(r + 1, s) : r + s + 1;
                    else if (n && r && s) return r = n(i, o), i[r] === o ? r : -1;
                    if (o !== o) return r = t(u.call(i, a, s), y.isNaN), r >= 0 ? r + a : -1;
                    for (r = e > 0 ? a : s - 1; r >= 0 && s > r; r += e)
                        if (i[r] === o) return r;
                    return -1
                }
            }

            function i(e, t) {
                var n = D.length,
                    i = e.constructor,
                    o = y.isFunction(i) && i.prototype || s,
                    r = "constructor";
                for (y.has(e, r) && !y.contains(t, r) && t.push(r); n--;) r = D[n], r in e && e[r] !== o[r] && !y.contains(t, r) && t.push(r)
            }
            var o = this,
                r = o._,
                a = Array.prototype,
                s = Object.prototype,
                l = Function.prototype,
                c = a.push,
                u = a.slice,
                d = s.toString,
                p = s.hasOwnProperty,
                h = Array.isArray,
                f = Object.keys,
                m = l.bind,
                g = Object.create,
                v = function() {},
                y = function(e) {
                    return e instanceof y ? e : this instanceof y ? void(this._wrapped = e) : new y(e)
                };
            "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = y), exports._ = y) : o._ = y, y.VERSION = "1.8.3";
            var b = function(e, t, n) {
                    if (void 0 === t) return e;
                    switch (null == n ? 3 : n) {
                        case 1:
                            return function(n) {
                                return e.call(t, n)
                            };
                        case 2:
                            return function(n, i) {
                                return e.call(t, n, i)
                            };
                        case 3:
                            return function(n, i, o) {
                                return e.call(t, n, i, o)
                            };
                        case 4:
                            return function(n, i, o, r) {
                                return e.call(t, n, i, o, r)
                            }
                    }
                    return function() {
                        return e.apply(t, arguments)
                    }
                },
                x = function(e, t, n) {
                    return null == e ? y.identity : y.isFunction(e) ? b(e, t, n) : y.isObject(e) ? y.matcher(e) : y.property(e)
                };
            y.iteratee = function(e, t) {
                return x(e, t, 1 / 0)
            };
            var w = function(e, t) {
                    return function(n) {
                        var i = arguments.length;
                        if (2 > i || null == n) return n;
                        for (var o = 1; i > o; o++)
                            for (var r = arguments[o], a = e(r), s = a.length, l = 0; s > l; l++) {
                                var c = a[l];
                                t && void 0 !== n[c] || (n[c] = r[c])
                            }
                        return n
                    }
                },
                k = function(e) {
                    if (!y.isObject(e)) return {};
                    if (g) return g(e);
                    v.prototype = e;
                    var t = new v;
                    return v.prototype = null, t
                },
                _ = function(e) {
                    return function(t) {
                        return null == t ? void 0 : t[e]
                    }
                },
                C = Math.pow(2, 53) - 1,
                T = _("length"),
                S = function(e) {
                    var t = T(e);
                    return "number" == typeof t && t >= 0 && C >= t
                };
            y.each = y.forEach = function(e, t, n) {
                t = b(t, n);
                var i, o;
                if (S(e))
                    for (i = 0, o = e.length; o > i; i++) t(e[i], i, e);
                else {
                    var r = y.keys(e);
                    for (i = 0, o = r.length; o > i; i++) t(e[r[i]], r[i], e)
                }
                return e
            }, y.map = y.collect = function(e, t, n) {
                t = x(t, n);
                for (var i = !S(e) && y.keys(e), o = (i || e).length, r = Array(o), a = 0; o > a; a++) {
                    var s = i ? i[a] : a;
                    r[a] = t(e[s], s, e)
                }
                return r
            }, y.reduce = y.foldl = y.inject = e(1), y.reduceRight = y.foldr = e(-1), y.find = y.detect = function(e, t, n) {
                var i;
                return i = S(e) ? y.findIndex(e, t, n) : y.findKey(e, t, n), void 0 !== i && -1 !== i ? e[i] : void 0
            }, y.filter = y.select = function(e, t, n) {
                var i = [];
                return t = x(t, n), y.each(e, function(e, n, o) {
                    t(e, n, o) && i.push(e)
                }), i
            }, y.reject = function(e, t, n) {
                return y.filter(e, y.negate(x(t)), n)
            }, y.every = y.all = function(e, t, n) {
                t = x(t, n);
                for (var i = !S(e) && y.keys(e), o = (i || e).length, r = 0; o > r; r++) {
                    var a = i ? i[r] : r;
                    if (!t(e[a], a, e)) return !1
                }
                return !0
            }, y.some = y.any = function(e, t, n) {
                t = x(t, n);
                for (var i = !S(e) && y.keys(e), o = (i || e).length, r = 0; o > r; r++) {
                    var a = i ? i[r] : r;
                    if (t(e[a], a, e)) return !0
                }
                return !1
            }, y.contains = y.includes = y.include = function(e, t, n, i) {
                return S(e) || (e = y.values(e)), ("number" != typeof n || i) && (n = 0), y.indexOf(e, t, n) >= 0
            }, y.invoke = function(e, t) {
                var n = u.call(arguments, 2),
                    i = y.isFunction(t);
                return y.map(e, function(e) {
                    var o = i ? t : e[t];
                    return null == o ? o : o.apply(e, n)
                })
            }, y.pluck = function(e, t) {
                return y.map(e, y.property(t))
            }, y.where = function(e, t) {
                return y.filter(e, y.matcher(t))
            }, y.findWhere = function(e, t) {
                return y.find(e, y.matcher(t))
            }, y.max = function(e, t, n) {
                var i, o, r = -1 / 0,
                    a = -1 / 0;
                if (null == t && null != e) {
                    e = S(e) ? e : y.values(e);
                    for (var s = 0, l = e.length; l > s; s++) i = e[s], i > r && (r = i)
                } else t = x(t, n), y.each(e, function(e, n, i) {
                    o = t(e, n, i), (o > a || o === -1 / 0 && r === -1 / 0) && (r = e, a = o)
                });
                return r
            }, y.min = function(e, t, n) {
                var i, o, r = 1 / 0,
                    a = 1 / 0;
                if (null == t && null != e) {
                    e = S(e) ? e : y.values(e);
                    for (var s = 0, l = e.length; l > s; s++) i = e[s], r > i && (r = i)
                } else t = x(t, n), y.each(e, function(e, n, i) {
                    o = t(e, n, i), (a > o || 1 / 0 === o && 1 / 0 === r) && (r = e, a = o)
                });
                return r
            }, y.shuffle = function(e) {
                for (var t, n = S(e) ? e : y.values(e), i = n.length, o = Array(i), r = 0; i > r; r++) t = y.random(0, r), t !== r && (o[r] = o[t]), o[t] = n[r];
                return o
            }, y.sample = function(e, t, n) {
                return null == t || n ? (S(e) || (e = y.values(e)), e[y.random(e.length - 1)]) : y.shuffle(e).slice(0, Math.max(0, t))
            }, y.sortBy = function(e, t, n) {
                return t = x(t, n), y.pluck(y.map(e, function(e, n, i) {
                    return {
                        value: e,
                        index: n,
                        criteria: t(e, n, i)
                    }
                }).sort(function(e, t) {
                    var n = e.criteria,
                        i = t.criteria;
                    if (n !== i) {
                        if (n > i || void 0 === n) return 1;
                        if (i > n || void 0 === i) return -1
                    }
                    return e.index - t.index
                }), "value")
            };
            var j = function(e) {
                return function(t, n, i) {
                    var o = {};
                    return n = x(n, i), y.each(t, function(i, r) {
                        var a = n(i, r, t);
                        e(o, i, a)
                    }), o
                }
            };
            y.groupBy = j(function(e, t, n) {
                y.has(e, n) ? e[n].push(t) : e[n] = [t]
            }), y.indexBy = j(function(e, t, n) {
                e[n] = t
            }), y.countBy = j(function(e, t, n) {
                y.has(e, n) ? e[n] ++ : e[n] = 1
            }), y.toArray = function(e) {
                return e ? y.isArray(e) ? u.call(e) : S(e) ? y.map(e, y.identity) : y.values(e) : []
            }, y.size = function(e) {
                return null == e ? 0 : S(e) ? e.length : y.keys(e).length
            }, y.partition = function(e, t, n) {
                t = x(t, n);
                var i = [],
                    o = [];
                return y.each(e, function(e, n, r) {
                    (t(e, n, r) ? i : o).push(e)
                }), [i, o]
            }, y.first = y.head = y.take = function(e, t, n) {
                return null == e ? void 0 : null == t || n ? e[0] : y.initial(e, e.length - t)
            }, y.initial = function(e, t, n) {
                return u.call(e, 0, Math.max(0, e.length - (null == t || n ? 1 : t)))
            }, y.last = function(e, t, n) {
                return null == e ? void 0 : null == t || n ? e[e.length - 1] : y.rest(e, Math.max(0, e.length - t))
            }, y.rest = y.tail = y.drop = function(e, t, n) {
                return u.call(e, null == t || n ? 1 : t)
            }, y.compact = function(e) {
                return y.filter(e, y.identity)
            };
            var E = function(e, t, n, i) {
                for (var o = [], r = 0, a = i || 0, s = T(e); s > a; a++) {
                    var l = e[a];
                    if (S(l) && (y.isArray(l) || y.isArguments(l))) {
                        t || (l = E(l, t, n));
                        var c = 0,
                            u = l.length;
                        for (o.length += u; u > c;) o[r++] = l[c++]
                    } else n || (o[r++] = l)
                }
                return o
            };
            y.flatten = function(e, t) {
                return E(e, t, !1)
            }, y.without = function(e) {
                return y.difference(e, u.call(arguments, 1))
            }, y.uniq = y.unique = function(e, t, n, i) {
                y.isBoolean(t) || (i = n, n = t, t = !1), null != n && (n = x(n, i));
                for (var o = [], r = [], a = 0, s = T(e); s > a; a++) {
                    var l = e[a],
                        c = n ? n(l, a, e) : l;
                    t ? (a && r === c || o.push(l), r = c) : n ? y.contains(r, c) || (r.push(c), o.push(l)) : y.contains(o, l) || o.push(l)
                }
                return o
            }, y.union = function() {
                return y.uniq(E(arguments, !0, !0))
            }, y.intersection = function(e) {
                for (var t = [], n = arguments.length, i = 0, o = T(e); o > i; i++) {
                    var r = e[i];
                    if (!y.contains(t, r)) {
                        for (var a = 1; n > a && y.contains(arguments[a], r); a++);
                        a === n && t.push(r)
                    }
                }
                return t
            }, y.difference = function(e) {
                var t = E(arguments, !0, !0, 1);
                return y.filter(e, function(e) {
                    return !y.contains(t, e)
                })
            }, y.zip = function() {
                return y.unzip(arguments)
            }, y.unzip = function(e) {
                for (var t = e && y.max(e, T).length || 0, n = Array(t), i = 0; t > i; i++) n[i] = y.pluck(e, i);
                return n
            }, y.object = function(e, t) {
                for (var n = {}, i = 0, o = T(e); o > i; i++) t ? n[e[i]] = t[i] : n[e[i][0]] = e[i][1];
                return n
            }, y.findIndex = t(1), y.findLastIndex = t(-1), y.sortedIndex = function(e, t, n, i) {
                n = x(n, i, 1);
                for (var o = n(t), r = 0, a = T(e); a > r;) {
                    var s = Math.floor((r + a) / 2);
                    n(e[s]) < o ? r = s + 1 : a = s
                }
                return r
            }, y.indexOf = n(1, y.findIndex, y.sortedIndex), y.lastIndexOf = n(-1, y.findLastIndex), y.range = function(e, t, n) {
                null == t && (t = e || 0, e = 0), n = n || 1;
                for (var i = Math.max(Math.ceil((t - e) / n), 0), o = Array(i), r = 0; i > r; r++, e += n) o[r] = e;
                return o
            };
            var $ = function(e, t, n, i, o) {
                if (!(i instanceof t)) return e.apply(n, o);
                var r = k(e.prototype),
                    a = e.apply(r, o);
                return y.isObject(a) ? a : r
            };
            y.bind = function(e, t) {
                if (m && e.bind === m) return m.apply(e, u.call(arguments, 1));
                if (!y.isFunction(e)) throw new TypeError("Bind must be called on a function");
                var n = u.call(arguments, 2),
                    i = function() {
                        return $(e, i, t, this, n.concat(u.call(arguments)))
                    };
                return i
            }, y.partial = function(e) {
                var t = u.call(arguments, 1),
                    n = function() {
                        for (var i = 0, o = t.length, r = Array(o), a = 0; o > a; a++) r[a] = t[a] === y ? arguments[i++] : t[a];
                        for (; i < arguments.length;) r.push(arguments[i++]);
                        return $(e, n, this, this, r)
                    };
                return n
            }, y.bindAll = function(e) {
                var t, n, i = arguments.length;
                if (1 >= i) throw new Error("bindAll must be passed function names");
                for (t = 1; i > t; t++) n = arguments[t], e[n] = y.bind(e[n], e);
                return e
            }, y.memoize = function(e, t) {
                var n = function(i) {
                    var o = n.cache,
                        r = "" + (t ? t.apply(this, arguments) : i);
                    return y.has(o, r) || (o[r] = e.apply(this, arguments)), o[r]
                };
                return n.cache = {}, n
            }, y.delay = function(e, t) {
                var n = u.call(arguments, 2);
                return setTimeout(function() {
                    return e.apply(null, n)
                }, t)
            }, y.defer = y.partial(y.delay, y, 1), y.throttle = function(e, t, n) {
                var i, o, r, a = null,
                    s = 0;
                n || (n = {});
                var l = function() {
                    s = n.leading === !1 ? 0 : y.now(), a = null, r = e.apply(i, o), a || (i = o = null)
                };
                return function() {
                    var c = y.now();
                    s || n.leading !== !1 || (s = c);
                    var u = t - (c - s);
                    return i = this, o = arguments, 0 >= u || u > t ? (a && (clearTimeout(a), a = null), s = c, r = e.apply(i, o), a || (i = o = null)) : a || n.trailing === !1 || (a = setTimeout(l, u)), r
                }
            }, y.debounce = function(e, t, n) {
                var i, o, r, a, s, l = function() {
                    var c = y.now() - a;
                    t > c && c >= 0 ? i = setTimeout(l, t - c) : (i = null, n || (s = e.apply(r, o), i || (r = o = null)))
                };
                return function() {
                    r = this, o = arguments, a = y.now();
                    var c = n && !i;
                    return i || (i = setTimeout(l, t)), c && (s = e.apply(r, o), r = o = null), s
                }
            }, y.wrap = function(e, t) {
                return y.partial(t, e)
            }, y.negate = function(e) {
                return function() {
                    return !e.apply(this, arguments)
                }
            }, y.compose = function() {
                var e = arguments,
                    t = e.length - 1;
                return function() {
                    for (var n = t, i = e[t].apply(this, arguments); n--;) i = e[n].call(this, i);
                    return i
                }
            }, y.after = function(e, t) {
                return function() {
                    return --e < 1 ? t.apply(this, arguments) : void 0
                }
            }, y.before = function(e, t) {
                var n;
                return function() {
                    return --e > 0 && (n = t.apply(this, arguments)), 1 >= e && (t = null), n
                }
            }, y.once = y.partial(y.before, 2);
            var O = !{
                    toString: null
                }.propertyIsEnumerable("toString"),
                D = ["valueOf", "isPrototypeOf", "toString", "propertyIsEnumerable", "hasOwnProperty", "toLocaleString"];
            y.keys = function(e) {
                if (!y.isObject(e)) return [];
                if (f) return f(e);
                var t = [];
                for (var n in e) y.has(e, n) && t.push(n);
                return O && i(e, t), t
            }, y.allKeys = function(e) {
                if (!y.isObject(e)) return [];
                var t = [];
                for (var n in e) t.push(n);
                return O && i(e, t), t
            }, y.values = function(e) {
                for (var t = y.keys(e), n = t.length, i = Array(n), o = 0; n > o; o++) i[o] = e[t[o]];
                return i
            }, y.mapObject = function(e, t, n) {
                t = x(t, n);
                for (var i, o = y.keys(e), r = o.length, a = {}, s = 0; r > s; s++) i = o[s], a[i] = t(e[i], i, e);
                return a
            }, y.pairs = function(e) {
                for (var t = y.keys(e), n = t.length, i = Array(n), o = 0; n > o; o++) i[o] = [t[o], e[t[o]]];
                return i
            }, y.invert = function(e) {
                for (var t = {}, n = y.keys(e), i = 0, o = n.length; o > i; i++) t[e[n[i]]] = n[i];
                return t
            }, y.functions = y.methods = function(e) {
                var t = [];
                for (var n in e) y.isFunction(e[n]) && t.push(n);
                return t.sort()
            }, y.extend = w(y.allKeys), y.extendOwn = y.assign = w(y.keys), y.findKey = function(e, t, n) {
                t = x(t, n);
                for (var i, o = y.keys(e), r = 0, a = o.length; a > r; r++)
                    if (i = o[r], t(e[i], i, e)) return i
            }, y.pick = function(e, t, n) {
                var i, o, r = {},
                    a = e;
                if (null == a) return r;
                y.isFunction(t) ? (o = y.allKeys(a), i = b(t, n)) : (o = E(arguments, !1, !1, 1), i = function(e, t, n) {
                    return t in n
                }, a = Object(a));
                for (var s = 0, l = o.length; l > s; s++) {
                    var c = o[s],
                        u = a[c];
                    i(u, c, a) && (r[c] = u)
                }
                return r
            }, y.omit = function(e, t, n) {
                if (y.isFunction(t)) t = y.negate(t);
                else {
                    var i = y.map(E(arguments, !1, !1, 1), String);
                    t = function(e, t) {
                        return !y.contains(i, t)
                    }
                }
                return y.pick(e, t, n)
            }, y.defaults = w(y.allKeys, !0), y.create = function(e, t) {
                var n = k(e);
                return t && y.extendOwn(n, t), n
            }, y.clone = function(e) {
                return y.isObject(e) ? y.isArray(e) ? e.slice() : y.extend({}, e) : e
            }, y.tap = function(e, t) {
                return t(e), e
            }, y.isMatch = function(e, t) {
                var n = y.keys(t),
                    i = n.length;
                if (null == e) return !i;
                for (var o = Object(e), r = 0; i > r; r++) {
                    var a = n[r];
                    if (t[a] !== o[a] || !(a in o)) return !1
                }
                return !0
            };
            var N = function(e, t, n, i) {
                if (e === t) return 0 !== e || 1 / e === 1 / t;
                if (null == e || null == t) return e === t;
                e instanceof y && (e = e._wrapped), t instanceof y && (t = t._wrapped);
                var o = d.call(e);
                if (o !== d.call(t)) return !1;
                switch (o) {
                    case "[object RegExp]":
                    case "[object String]":
                        return "" + e == "" + t;
                    case "[object Number]":
                        return +e !== +e ? +t !== +t : 0 === +e ? 1 / +e === 1 / t : +e === +t;
                    case "[object Date]":
                    case "[object Boolean]":
                        return +e === +t
                }
                var r = "[object Array]" === o;
                if (!r) {
                    if ("object" != typeof e || "object" != typeof t) return !1;
                    var a = e.constructor,
                        s = t.constructor;
                    if (a !== s && !(y.isFunction(a) && a instanceof a && y.isFunction(s) && s instanceof s) && "constructor" in e && "constructor" in t) return !1
                }
                n = n || [], i = i || [];
                for (var l = n.length; l--;)
                    if (n[l] === e) return i[l] === t;
                if (n.push(e), i.push(t), r) {
                    if (l = e.length, l !== t.length) return !1;
                    for (; l--;)
                        if (!N(e[l], t[l], n, i)) return !1
                } else {
                    var c, u = y.keys(e);
                    if (l = u.length, y.keys(t).length !== l) return !1;
                    for (; l--;)
                        if (c = u[l], !y.has(t, c) || !N(e[c], t[c], n, i)) return !1
                }
                return n.pop(), i.pop(), !0
            };
            y.isEqual = function(e, t) {
                return N(e, t)
            }, y.isEmpty = function(e) {
                return null == e ? !0 : S(e) && (y.isArray(e) || y.isString(e) || y.isArguments(e)) ? 0 === e.length : 0 === y.keys(e).length
            }, y.isElement = function(e) {
                return !(!e || 1 !== e.nodeType)
            }, y.isArray = h || function(e) {
                return "[object Array]" === d.call(e)
            }, y.isObject = function(e) {
                var t = typeof e;
                return "function" === t || "object" === t && !!e
            }, y.each(["Arguments", "Function", "String", "Number", "Date", "RegExp", "Error"], function(e) {
                y["is" + e] = function(t) {
                    return d.call(t) === "[object " + e + "]"
                }
            }), y.isArguments(arguments) || (y.isArguments = function(e) {
                return y.has(e, "callee")
            }), "function" != typeof /./ && "object" != typeof Int8Array && (y.isFunction = function(e) {
                return "function" == typeof e || !1
            }), y.isFinite = function(e) {
                return isFinite(e) && !isNaN(parseFloat(e))
            }, y.isNaN = function(e) {
                return y.isNumber(e) && e !== +e
            }, y.isBoolean = function(e) {
                return e === !0 || e === !1 || "[object Boolean]" === d.call(e)
            }, y.isNull = function(e) {
                return null === e
            }, y.isUndefined = function(e) {
                return void 0 === e
            }, y.has = function(e, t) {
                return null != e && p.call(e, t)
            }, y.noConflict = function() {
                return o._ = r, this
            }, y.identity = function(e) {
                return e
            }, y.constant = function(e) {
                return function() {
                    return e
                }
            }, y.noop = function() {}, y.property = _, y.propertyOf = function(e) {
                return null == e ? function() {} : function(t) {
                    return e[t]
                }
            }, y.matcher = y.matches = function(e) {
                return e = y.extendOwn({}, e),
                    function(t) {
                        return y.isMatch(t, e)
                    }
            }, y.times = function(e, t, n) {
                var i = Array(Math.max(0, e));
                t = b(t, n, 1);
                for (var o = 0; e > o; o++) i[o] = t(o);
                return i
            }, y.random = function(e, t) {
                return null == t && (t = e, e = 0), e + Math.floor(Math.random() * (t - e + 1))
            }, y.now = Date.now || function() {
                return (new Date).getTime()
            };
            var I = {
                    "&": "&amp;",
                    "<": "&lt;",
                    ">": "&gt;",
                    '"': "&quot;",
                    "'": "&#x27;",
                    "`": "&#x60;"
                },
                q = y.invert(I),
                A = function(e) {
                    var t = function(t) {
                            return e[t]
                        },
                        n = "(?:" + y.keys(e).join("|") + ")",
                        i = RegExp(n),
                        o = RegExp(n, "g");
                    return function(e) {
                        return e = null == e ? "" : "" + e, i.test(e) ? e.replace(o, t) : e
                    }
                };
            y.escape = A(I), y.unescape = A(q), y.result = function(e, t, n) {
                var i = null == e ? void 0 : e[t];
                return void 0 === i && (i = n), y.isFunction(i) ? i.call(e) : i
            };
            var L = 0;
            y.uniqueId = function(e) {
                var t = ++L + "";
                return e ? e + t : t
            }, y.templateSettings = {
                evaluate: /<%([\s\S]+?)%>/g,
                interpolate: /<%=([\s\S]+?)%>/g,
                escape: /<%-([\s\S]+?)%>/g
            };
            var H = /(.)^/,
                z = {
                    "'": "'",
                    "\\": "\\",
                    "\r": "r",
                    "\n": "n",
                    "\u2028": "u2028",
                    "\u2029": "u2029"
                },
                B = /\\|'|\r|\n|\u2028|\u2029/g,
                P = function(e) {
                    return "\\" + z[e]
                };
            y.template = function(e, t, n) {
                !t && n && (t = n), t = y.defaults({}, t, y.templateSettings);
                var i = RegExp([(t.escape || H).source, (t.interpolate || H).source, (t.evaluate || H).source].join("|") + "|$", "g"),
                    o = 0,
                    r = "__p+='";
                e.replace(i, function(t, n, i, a, s) {
                    return r += e.slice(o, s).replace(B, P), o = s + t.length, n ? r += "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'" : i ? r += "'+\n((__t=(" + i + "))==null?'':__t)+\n'" : a && (r += "';\n" + a + "\n__p+='"), t
                }), r += "';\n", t.variable || (r = "with(obj||{}){\n" + r + "}\n"), r = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + r + "return __p;\n";
                try {
                    var a = new Function(t.variable || "obj", "_", r)
                } catch (s) {
                    throw s.source = r, s
                }
                var l = function(e) {
                        return a.call(this, e, y)
                    },
                    c = t.variable || "obj";
                return l.source = "function(" + c + "){\n" + r + "}", l
            }, y.chain = function(e) {
                var t = y(e);
                return t._chain = !0, t
            };
            var R = function(e, t) {
                return e._chain ? y(t).chain() : t
            };
            y.mixin = function(e) {
                y.each(y.functions(e), function(t) {
                    var n = y[t] = e[t];
                    y.prototype[t] = function() {
                        var e = [this._wrapped];
                        return c.apply(e, arguments), R(this, n.apply(y, e))
                    }
                })
            }, y.mixin(y), y.each(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(e) {
                var t = a[e];
                y.prototype[e] = function() {
                    var n = this._wrapped;
                    return t.apply(n, arguments), "shift" !== e && "splice" !== e || 0 !== n.length || delete n[0], R(this, n)
                }
            }), y.each(["concat", "join", "slice"], function(e) {
                var t = a[e];
                y.prototype[e] = function() {
                    return R(this, t.apply(this._wrapped, arguments))
                }
            }), y.prototype.value = function() {
                return this._wrapped
            }, y.prototype.valueOf = y.prototype.toJSON = y.prototype.value, y.prototype.toString = function() {
                return "" + this._wrapped
            }, "function" == typeof define && define.amd && define("underscore", [], function() {
                return y
            })
        }.call(this), define("components/signup", ["require", "jquery", "js-cookie", "historyJs", "components/config", "components/track", "components/util", "components/overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = (e("historyJs"), e("components/config"), e("components/track")),
                o = e("components/util"),
                r = e("components/overlay"),
                a = function(e) {
                    t(".account-type-selector", e).on("change", function() {
                        t(this).closest(".has-account-type-selector").removeClass(function(e, t) {
                            return (t.match(/(^|\s)account-type-\S+/g) || []).join(" ")
                        }).addClass("account-type-" + t(this).val())
                    })
                },
                s = function(e) {
                    t(".button-facebook", e).click(function(n) {
                        n.preventDefault();
                        var i = window.location.href,
                            r = o.getParamValue("type", i) || e.find('select[name="type"]').val(),
                            a = e.find('input[name="place_name"]').val(),
                            s = e.find('input[name="place_add"]').val(),
                            l = e.find('input[name="prof_spec"]').val(),
                            c = e.find('input[name="prof_place"]').val(),
                            u = t(this).data("link"),
                            d = o.getParamValue("next", u),
                            p = {
                                type: r,
                                prof_spec: l,
                                prof_place: c,
                                place_name: a,
                                place_add: s
                            };
                        for (var h in p) u = o.addParamToUrl(u, h, p[h]);
                        if ("favourite" == r) {
                            var f = {
                                utm_source: "facebook_login",
                                utm_medium: "signup_page",
                                utm_campaign: "add_to_favourite"
                            };
                            for (var m in f) d = o.addParamToUrl(d, m, f[m])
                        }
                        d && u && (u = o.addParamToUrl(u, "next", encodeURIComponent(d))), window.location.href = u
                    })
                },
                l = function(e) {
                    a(e);
                    var s = t(".account-type-selector", e),
                        l = o.getParamValue("type") || void 0;
                    l && s.find('option[value="' + l + '"]').length > 0 && s.val(l).trigger("change"), e.on("submit", function(a) {
                        var s = t(this),
                            l = e.find('select[name="type"]').val(),
                            c = e.find('input[name="name"]').val(),
                            u = e.find('input[name="email"]').val(),
                            d = e.find('input[name="password"]').val(),
                            p = e.find('input[name="mobile_phone"]').val(),
                            h = e.find('input[name="place_name"]').val(),
                            f = e.find('input[name="place_add"]').val(),
                            m = e.find('input[name="prof_spec"]').val(),
                            g = e.find('input[name="prof_place"]').val(),
                            v = (o.getParamValue("source") || "", e.attr("action"));
                        s.addClass("submitting"), t.ajax(v, {
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                name: c,
                                email: u,
                                password: d,
                                mobile_phone: p,
                                type: l,
                                place_name: h,
                                place_add: f,
                                prof_spec: m,
                                prof_place: g,
                                next: History.getState().data && History.getState().data.href ? History.getState().data.href : window.location.href
                            }),
                            method: "POST"
                        }).done(function(n) {
                            s.removeClass("submitting"), e.parent().addClass("successful");
                            var o = t("#signup-confirmation-template").html();
                            e.parent().append(_.template(o)({
                                name: c,
                                phone: p,
                                email: u,
                                next: n.next
                            })), i.page("/dang-ky/hoan-thanh/" + l, "Hoàn thành đăng ký")
                        }).fail(function(e) {
                            s.removeClass("submitting"), r.openAlert(t('<h2>Đăng ký tài khoản gặp lỗi, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a> để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), i.page("/dang-ky/loi/" + l, "Đăng ký gặp lỗi " + e.responseText)
                        }), a.preventDefault()
                    })
                };
            return {
                initNewForm: function(e) {
                    l(e), s(e)
                },
                init: function() {
                    l(t("#signup form")), s(t("#signup form"))
                }
            }
        }), define("components/login", ["require", "jquery", "js-cookie", "components/config", "components/track", "components/util", "historyJs", "components/overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/config"),
                o = e("components/track"),
                r = e("components/util"),
                a = (e("historyJs"), e("components/overlay")),
                s = 2e3,
                l = function(e) {
                    t(".button-facebook", e).click(function(e) {
                        e.preventDefault();
                        var n = window.location.href,
                            i = t(this).data("link"),
                            o = r.getParamValue("type", n),
                            a = r.getParamValue("next", i);
                        if ("favourite" == o) {
                            var s = {
                                utm_source: "facebook_login",
                                utm_medium: "login_page",
                                utm_campaign: "add_to_favourite"
                            };
                            for (var l in s) a = r.addParamToUrl(a, l, s[l])
                        }
                        a && i && (i = r.addParamToUrl(i, "next", encodeURIComponent(a))), window.location.href = i
                    })
                };
            return {
                initNewForm: function(e) {
                    c(e), l(e)
                },
                init: function() {
                    c(t("#login form")), l(t("#login form"))
                }
            }
        }), define("components/tab-content", ["require", "components/track"], function(e) {
            "use strict";
            var t = e("components/track"),
                n = function(e) {
                    $(".tab-content-triggers a", e).on("click", function(e) {
                        if (e.preventDefault(), !$(this).hasClass("active")) {
                            var n = $($(this).attr("href"));
                            n.show().siblings().hide(), $(this).closest(".tab-content-triggers").find("a").removeClass("active"), $(this).addClass("active"), $(this).attr("data-track-path") && t.page($(this).attr("data-track-path"), $(this).attr("title"))
                        }
                    }), $("a.tab-content-link", e).on("click", function(t) {
                        $('.tab-content-triggers a[href="' + $(this).attr("href") + '"]', e).click(), t.preventDefault()
                    })
                };
            return {
                init: function() {
                    n($(document))
                },
                initNewTabContent: function(e) {
                    n(e)
                }
            }
        }), define("components/login-overlay", ["require", "jquery", "js-cookie", "underscore", "components/config", "historyJs", "components/track", "components/util", "components/overlay", "components/signup", "components/login", "components/tab-content"], function(e) {
            "use strict";
            var t, n = e("jquery"),
                i = (e("js-cookie"), e("underscore")),
                o = e("components/config"),
                r = (e("historyJs"), e("components/track")),
                a = e("components/util"),
                s = e("components/overlay"),
                l = e("components/signup"),
                c = e("components/login"),
                u = e("components/tab-content"),
                d = 800,
                p = function(e, o, a, d) {
                    o = o ? o : "", o += " login", a = a ? a : "#";
                    var p = i.template(n("#login-overlay-template").text())({
                        url: a,
                        meta: d ? d : {}
                    });
                    s.open(n(p), o, function(i) {
                        l.initNewForm(i.find('form[name="signup"]')), c.initNewForm(i.find('form[name="login"]')), u.initNewTabContent(i), e ? (i.find('[href="#login-tab"]').click(), History.pushState(window.location, "Đăng nhập vào BacsiViet", a), r.page("/dang-nhap/", "Đăng nhập (overlay)")) : (i.find('[href="#signup-tab"]').click(), History.pushState(window.location, "Mở tài khoản tại BacsiViet", a), r.page("/dang-ky/", "Đăng ký (overlay)")), n(".account-type-selector", i).val(t ? t : "user").trigger("change")
                    })
                };
            return {
                init: function() {
                    n(".login-overlay-trigger, .signup-overlay-trigger").on("click", function(e) {
                        if (!(n(window).height() < d)) {
                            e.preventDefault();
                            var i = n(this),
                                o = i.attr("href"),
                                r = a.getParamValue("place_name", o) || void 0,
                                s = a.getParamValue("place_add", o) || void 0,
                                l = a.getParamValue("prof_spec", o) || void 0,
                                c = a.getParamValue("prof_place", o) || void 0;
                            t = a.getParamValue("type", o) || void 0;
                            var u = {
                                placeName: r,
                                placeAdd: s,
                                profSpec: l,
                                profPlace: c
                            };
                            p(i.hasClass("login-overlay-trigger"), "", o, u)
                        }
                    })
                },
                openLoginOverlay: function(e, t) {
                    t || (t = o.api.account.login), n(window).height() < d ? window.location = a.addParamToUrl(t, "css_class", e) : p(!0, e, t)
                },
                openSignupOverlay: function(e, t) {
                    t || (t = o.api.account.signup), n(window).height() < d ? window.location = t : p(!1, e, t)
                }
            }
        }), define("components/subscribe", ["require", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "components/login-overlay"], function(e) {
            "use strict";
            var t, n = e("jquery"),
                i = (e("js-cookie"), e("components/overlay"), e("components/config")),
                o = e("components/track"),
                r = e("components/login-overlay"),
                a = function() {
                    var e;
                    localStorage.contact && (e = localStorage.contact), n("#list .action-get-contact, #detail .action-get-contact").each(function() {
                        n(this).on("click", function(e) {
                            o.page(n(this).attr("data-track-path"), n(this).attr("data-track-label")), t = n(n(this).attr("href")), t.toggleClass("showing"), t.hasClass("showing") && n("body").hasClass("not-logged-in") && (t.removeClass("showing"), localStorage.setItem("contact", n(this).attr("data-id")), r.openSignupOverlay(void 0, i.api.account.signup + "?next=" + window.location.href)), e.preventDefault()
                        }), e && n("body").hasClass("logged-in") && e == n(this).data("id") && (n(this).trigger("click"), delete localStorage.contact)
                    })
                };
            return {
                init: function() {
                    a()
                }
            }
        }),
        function(e) {
            var t = {
                init: function(n) {
                    return this.each(function() {
                        t.destroy.call(this), this.opt = e.extend(!0, {}, e.fn.raty.defaults, n);
                        var i = e(this),
                            o = ["number", "readOnly", "score", "scoreName"];
                        t._callback.call(this, o), this.opt.precision && t._adjustPrecision.call(this), this.opt.number = t._between(this.opt.number, 0, this.opt.numberMax), this.stars = t._createStars.call(this), this.score = t._createScore.call(this), t._apply.call(this, this.opt.score), this.opt.cancel && (this.cancel = t._createCancel.call(this)), this.opt.width && i.css("width", this.opt.width), this.opt.readOnly ? t._lock.call(this) : (i.css("cursor", "pointer"), t._binds.call(this)), t._target.call(this, this.opt.score), i.data({
                            settings: this.opt,
                            raty: !0
                        })
                    })
                },
                _adjustPrecision: function() {
                    this.opt.targetType = "score", this.opt.half = !0
                },
                _apply: function(e) {
                    "undefined" != typeof e && e >= 0 && (e = t._between(e, 0, this.opt.number), this.score.val(e)), t._fill.call(this, e), e && t._roundStars.call(this, e)
                },
                _between: function(e, t, n) {
                    return Math.min(Math.max(parseFloat(e), t), n)
                },
                _binds: function() {
                    this.cancel && t._bindCancel.call(this), t._bindClick.call(this), t._bindOut.call(this), t._bindOver.call(this)
                },
                _bindCancel: function() {
                    t._bindClickCancel.call(this), t._bindOutCancel.call(this), t._bindOverCancel.call(this)
                },
                _bindClick: function() {
                    var t = this,
                        n = e(t);
                    t.stars.on("click.raty", function(i) {
                        t.score.val(t.opt.half || t.opt.precision ? n.data("score") : e(this).data("score")), t.opt.click && t.opt.click.call(t, parseFloat(t.score.val()), i)
                    })
                },
                _bindClickCancel: function() {
                    var e = this;
                    e.cancel.on("click.raty", function(t) {
                        e.score.removeAttr("value"), e.opt.click && e.opt.click.call(e, null, t)
                    })
                },
                _bindOut: function() {
                    var n = this;
                    e(this).on("mouseleave.raty", function(e) {
                        var i = parseFloat(n.score.val()) || void 0;
                        t._apply.call(n, i), t._target.call(n, i, e), n.opt.mouseout && n.opt.mouseout.call(n, i, e)
                    })
                },
                _bindOutCancel: function() {
                    var t = this;
                    t.cancel.on("mouseleave.raty", function(n) {
                        e(this).attr("class", t.opt.cancelOff), t.opt.mouseout && t.opt.mouseout.call(t, t.score.val() || null, n)
                    })
                },
                _bindOverCancel: function() {
                    var n = this;
                    n.cancel.on("mouseover.raty", function(i) {
                        e(this).attr("class", n.opt.cancelOn), n.stars.attr("class", n.opt.starOff), t._target.call(n, null, i), n.opt.mouseover && n.opt.mouseover.call(n, null)
                    })
                },
                _bindOver: function() {
                    var n = this,
                        i = e(n),
                        o = n.opt.half ? "mousemove.raty" : "mouseover.raty";
                    n.stars.on(o, function(o) {
                        var r = parseInt(e(this).data("score"), 10);
                        if (n.opt.half) {
                            var a = parseFloat((o.pageX - e(this).offset().left) / (n.opt.size ? n.opt.size : parseInt(i.css("font-size")))),
                                s = a > .5 ? 1 : .5;
                            r = r - 1 + s, t._fill.call(n, r), n.opt.precision && (r = r - s + a), t._roundStars.call(n, r), i.data("score", r)
                        } else t._fill.call(n, r);
                        t._target.call(n, r, o), n.opt.mouseover && n.opt.mouseover.call(n, r, o)
                    })
                },
                _callback: function(e) {
                    for (var t in e) "function" == typeof this.opt[e[t]] && (this.opt[e[t]] = this.opt[e[t]].call(this))
                },
                _createCancel: function() {
                    var t = e(this),
                        n = this.opt.cancelOff,
                        i = e("<i />", {
                            "class": n,
                            title: this.opt.cancelHint
                        });
                    return "left" == this.opt.cancelPlace ? t.prepend("&#160;").prepend(i) : t.append("&#160;").append(i), i
                },
                _createScore: function() {
                    return e("<input />", {
                        type: "hidden",
                        name: this.opt.scoreName
                    }).appendTo(this)
                },
                _createStars: function() {
                    for (var n = e(this), i = 1; i <= this.opt.number; i++) {
                        var o = t._getHint.call(this, i),
                            r = this.opt.score && this.opt.score >= i ? "starOn" : "starOff";
                        r = this.opt[r], e("<i />", {
                            "class": r,
                            title: o,
                            "data-score": i
                        }).appendTo(this), this.opt.space && n.append(i < this.opt.number ? "&#160;" : "")
                    }
                    return n.children("i")
                },
                _error: function(t) {
                    e(this).html(t), e.error(t)
                },
                _fill: function(e) {
                    for (var t = this, n = 0, i = 1; i <= t.stars.length; i++) {
                        var o = t.stars.eq(i - 1),
                            r = t.opt.single ? i == e : e >= i;
                        if (t.opt.iconRange && t.opt.iconRange.length > n) {
                            var a = t.opt.iconRange[n],
                                s = a.on || t.opt.starOn,
                                l = a.off || t.opt.starOff,
                                c = r ? s : l;
                            i <= a.range && o.attr("class", c), i == a.range && n++
                        } else {
                            var c = r ? "starOn" : "starOff";
                            o.attr("class", this.opt[c])
                        }
                    }
                },
                _getHint: function(e) {
                    var t = this.opt.hints[e - 1];
                    return "" === t ? "" : t || e
                },
                _lock: function() {
                    var n = parseInt(this.score.val(), 10),
                        i = n ? t._getHint.call(this, n) : this.opt.noRatedMsg;
                    e(this).data("readonly", !0).css("cursor", "").attr("title", i), this.score.attr("readonly", "readonly"), this.stars.attr("title", i), this.cancel && this.cancel.hide()
                },
                _roundStars: function(e) {
                    var t = (e - Math.floor(e)).toFixed(2);
                    if (t > this.opt.round.down) {
                        var n = "starOn";
                        this.opt.halfShow && t < this.opt.round.up ? n = "starHalf" : t < this.opt.round.full && (n = "starOff"), this.stars.eq(Math.ceil(e) - 1).attr("class", this.opt[n])
                    }
                },
                _target: function(n, i) {
                    if (this.opt.target) {
                        var o = e(this.opt.target);
                        0 === o.length && t._error.call(this, "Target selector invalid or missing!"), this.opt.targetFormat.indexOf("{score}") < 0 && t._error.call(this, 'Template "{score}" missing!');
                        var r = i && "mouseover" == i.type;
                        void 0 === n ? n = this.opt.targetText : null === n ? n = r ? this.opt.cancelHint : this.opt.targetText : ("hint" == this.opt.targetType ? n = t._getHint.call(this, Math.ceil(n)) : this.opt.precision && (n = parseFloat(n).toFixed(1)), r || this.opt.targetKeep || (n = this.opt.targetText)), n && (n = this.opt.targetFormat.toString().replace("{score}", n)), o.is(":input") ? o.val(n) : o.html(n)
                    }
                },
                _unlock: function() {
                    e(this).data("readonly", !1).css("cursor", "pointer").removeAttr("title"), this.score.removeAttr("readonly", "readonly");
                    for (var n = 0; n < this.opt.number; n++) this.stars.eq(n).attr("title", t._getHint.call(this, n + 1));
                    this.cancel && this.cancel.css("display", "")
                },
                cancel: function(n) {
                    return this.each(function() {
                        e(this).data("readonly") !== !0 && (t[n ? "click" : "score"].call(this, null), this.score.removeAttr("value"))
                    })
                },
                click: function(n) {
                    return e(this).each(function() {
                        e(this).data("readonly") !== !0 && (t._apply.call(this, n), this.opt.click || t._error.call(this, 'You must add the "click: function(score, evt) { }" callback.'), this.opt.click.call(this, n, e.Event("click")), t._target.call(this, n))
                    })
                },
                destroy: function() {
                    return e(this).each(function() {
                        var t = e(this),
                            n = t.data("raw");
                        n ? t.off(".raty").empty().css({
                            cursor: n.style.cursor,
                            width: n.style.width
                        }).removeData("readonly") : t.data("raw", t.clone()[0])
                    })
                },
                getScore: function() {
                    var t, n = [];
                    return e(this).each(function() {
                        t = this.score.val(), n.push(t ? parseFloat(t) : void 0)
                    }), n.length > 1 ? n : n[0]
                },
                readOnly: function(n) {
                    return this.each(function() {
                        var i = e(this);
                        i.data("readonly") !== n && (n ? (i.off(".raty").children("i").off(".raty"), t._lock.call(this)) : (t._binds.call(this), t._unlock.call(this)), i.data("readonly", n))
                    })
                },
                reload: function() {
                    return t.set.call(this, {})
                },
                score: function() {
                    return arguments.length ? t.setScore.apply(this, arguments) : t.getScore.call(this)
                },
                set: function(t) {
                    return this.each(function() {
                        var n = e(this),
                            i = n.data("settings"),
                            o = e.extend({}, i, t);
                        n.raty(o)
                    })
                },
                setScore: function(n) {
                    return e(this).each(function() {
                        e(this).data("readonly") !== !0 && (t._apply.call(this, n), t._target.call(this, n))
                    })
                }
            };
            e.fn.raty = function(n) {
                return t[n] ? t[n].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof n && n ? void e.error("Method " + n + " does not exist!") : t.init.apply(this, arguments)
            }, e.fn.raty.defaults = {
                cancel: !1,
                cancelHint: "Cancel this rating!",
                cancelOff: "fa fa-fw fa-minus-square",
                cancelOn: "fa fa-fw fa-check-square",
                cancelPlace: "left",
                click: void 0,
                half: !1,
                halfShow: !0,
                hints: ["bad", "poor", "regular", "good", "gorgeous"],
                iconRange: void 0,
                mouseout: void 0,
                mouseover: void 0,
                noRatedMsg: "Not rated yet!",
                number: 5,
                numberMax: 20,
                precision: !1,
                readOnly: !1,
                round: {
                    down: .25,
                    full: .6,
                    up: .76
                },
                score: void 0,
                scoreName: "score",
                single: !1,
                size: null,
                space: !0,
                starHalf: "fa fa-fw fa-star-half-o",
                starOff: "fa fa-fw fa-star-o",
                starOn: "fa fa-fw fa-star",
                target: void 0,
                targetFormat: "{score}",
                targetKeep: !1,
                targetText: "",
                targetType: "hint",
                width: !1
            }
        }(jQuery), define("raty", ["jquery"], function() {}), define("components/star-rating", ["require", "jquery", "raty"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = (e("raty"), ["Rất tệ", "Tệ", "Trung bình", "Tốt", "Rất tốt"]),
                i = function() {
                    t(".star-ratings.interactive:not(.inited)").each(function() {
                        var e = t(this);
                        e.append('<span class="stars"></span><span class="hint"></span>'), t(".stars", e).raty({
                            target: e.find(".hint"),
                            hints: e.data("hints") ? e.data("hints").split(",") : n,
                            scoreName: e.data("name"),
                            targetKeep: !0
                        }), t(this).addClass("inited")
                    })
                },
                o = function() {
                    t(".star-ratings:not(.interactive):not(.inited)").each(function() {
                        var e = t(this);
                        t(this).append('<span class="stars"><span class="back"><b></b><b></b><b></b><b></b><b></b></span><span class="front"><b></b><b></b><b></b><b></b><b></b></span></span>').find(".front").css("width", e.data("score") + "%"), t(this).addClass("inited")
                    })
                };
            return {
                init: function() {
                    i(), o()
                }
            }
        }), define("components/comment", ["require", "jquery", "js-cookie", "components/config", "underscore", "components/track", "components/overlay", "components/util", "components/login-overlay", "components/star-rating"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/config"),
                o = e("underscore"),
                r = e("components/track"),
                a = e("components/overlay"),
                s = e("components/util"),
                l = e("components/login-overlay"),
                c = e("components/star-rating"),
                u = function(e, n) {
                    var i = t("#comment-edit-template").html();
                    e.after(o.template(i)(n))
                },
                d = function(e, n) {
                    var i = t("#comment-reply-template").html();
                    e.after(o.template(i)(n))
                },
                p = function(e, n) {
                    var i = t("#comment-template").html();
                    e.after(t(o.template(i)(n)).addClass("child")), t(".comments-container").removeClass("no-comment")
                },
                h = function(e, n) {
                    var i = t("#comment-template").html();
                    e.prepend(o.template(i)(n)), t(".comments-container").removeClass("no-comment"), c.init()
                },
                f = function() {
                    t(".comments-container form#comment-post").submit(function(e) {
                        var o = t(this),
                            c = o.find('input[name="email"]').val(),
                            u = o.find('input[name="name"]').val(),
                            d = o.find('input[name="place"]').val(),
                            p = o.find('input[name="professional"]').val(),
                            f = o.find('input[name="like"]:checked').val(),
                            m = o.find('input[name="recommending"]:checked').val(),
                            g = o.find('[name="comment"]').val(),
                            v = o.find('[name="attitude"]').val(),
                            y = o.find('[name="waiting_time"]').val(),
                            b = o.find('[name="cleanliness"]').val(),
                            x = {
                                attitude: v,
                                waiting_time: y,
                                cleanliness: b,
                                recommending: m
                            },
                            w = o.find('[name="overall_rating"]').val() || 0,
                            k = "place-comment" == o.attr("name") ? i.api.place.comment.create : i.api.professional.comment.create;
                        o.addClass("submitting"), c && n.set("email", c, {
                            expires: 365
                        }), u && n.set("name", u, {
                            expires: 365
                        }), t.ajax(k, {
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                liking: f,
                                place: d,
                                professional: p,
                                email: c,
                                comment: g,
                                name: u,
                                overall_rating: w,
                                ratings: x
                            }),
                            method: "POST"
                        }).done(function(e) {
                            o.removeClass("submitting"), o.parent().addClass("successful"), e.email = c, e.created_at = s.datetimeObjectToUiTime(new Date) + " " + s.datetimeObjectToUiDate(new Date), e.name = u, h(t(".comments-container ul.comments"), e), p ? (delete localStorage["professional-" + p], r.page("/nhan-xet/hoan-thanh/bac-si/" + p, "Gửi nhận xét thành công cho bác sĩ")) : d && (delete localStorage["place-" + d], r.page("/nhan-xet/hoan-thanh/co-so-y-te/" + d, "Gửi nhận xét thành công cho cơ sở y tế"))
                        }).fail(function(e) {
                            o.removeClass("submitting");
                            var n = {
                                link: f,
                                comment: g,
                                ratings: x,
                                overall_rating: w
                            };
                            p ? localStorage["professional-" + p] = JSON.stringify(n) : localStorage["place-" + d] = JSON.stringify(n), "LOGIN_REQUIRED" == e.responseJSON[0] ? l.openLoginOverlay("email-existed", i.api.account.login + "?source=comment&next=" + window.location.href) : (a.openAlert(t("<p>Gửi nhận xét không thành công. Xin vui lòng thử lại.</p>")), r.page("/nhan-xet/loi/", "Gửi nhận xét gặp lỗi " + e.responseText))
                        }), e.preventDefault()
                    }).each(function() {
                        t(this).find('input[name="name"]').val(n.get("name")), t(this).find('input[name="email"]').val(n.get("email"));
                        var e = t(this).find('input[name="place"]').val(),
                            i = t(this).find('input[name="professional"]').val();
                        if (i) {
                            var o = localStorage["professional-" + i];
                            o && (o = JSON.parse(o), t(this).find('input[name="like"]:checked').val(o.like), t(this).find('[name="comment"]').val(o.comment))
                        } else {
                            var r = localStorage["place-" + e];
                            r && (r = JSON.parse(r), t(this).find('input[name="like"]:checked').val(r.like), t(this).find('[name="comment"]').val(r.comment), t(this).find(".star-ratings.interactive:not(.inited)").each(function() {
                                var e = t(this);
                                e.append('<span class="stars"></span><span class="hint"></span>');
                                var n = e.data("name"),
                                    i = {
                                        target: e.find(".hint"),
                                        hints: e.data("hints") ? e.data("hints").split(",") : defaultHints,
                                        scoreName: e.data("name"),
                                        targetKeep: !0
                                    };
                                "overall_rating" == n && r.overall_rating && (i.score = r.overall_rating), "attitude" == n && r.ratings.attitude && (i.score = r.ratings.attitude), "waiting_time" == n && r.ratings.waiting_time && (i.score = r.ratings.waiting_time), "cleanliness" == n && r.ratings.cleanliness && (i.score = r.ratings.cleanliness), t(".stars", e).raty(i), t(this).addClass("inited")
                            }))
                        }
                    })
                },
                m = function(e, t, n) {
                    var i = e.addClass("active").find("span");
                    if (i.text(parseInt(i.text()) + 1), "undefined" != typeof n) {
                        var o = e.siblings(".comment-voting").removeClass("active").find("span"),
                            r = parseInt(o.text()) - 1;
                        0 > r && (r = 0), o.text(r)
                    }
                },
                g = function() {
                    t(".comments-container .comment-voting").each(function() {
                        var e, o = JSON.parse(localStorage.commentVotes || "{}"),
                            s = t(this).attr("data-comment-type"),
                            l = t(this).attr("data-comment-id"),
                            c = t(this),
                            u = t(this).hasClass("useful");
                        o.hasOwnProperty(s) && o[s].hasOwnProperty(l) && (t(this).hasClass("useful") && o[s][l].useful || !t(this).hasClass("useful") && o[s][l].useful === !1) && t(this).addClass("active"), c.on("click", function(d) {
                            d.preventDefault(), c.hasClass("active") || (o = JSON.parse(localStorage.commentVotes || "{}"), o.hasOwnProperty(s) && o[s].hasOwnProperty(l) ? e = o[s][l].useful : o.hasOwnProperty(s) ? o[s][l] = {} : (o[s] = {}, o[s][l] = {}), e !== u && (c.addClass("loading"), t.ajax(i.api.commentVoting, {
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                method: "POST",
                                contentType: "application/json; charset=utf-8",
                                data: JSON.stringify({
                                    vote_for: s,
                                    useful: u,
                                    comment_id: l,
                                    first_time: void 0 === e
                                })
                            }).done(function() {
                                c.removeClass("loading"), o[s][l].useful = u, localStorage.setItem("commentVotes", JSON.stringify(o)), m(c, u, e), u ? r.event("Listing", "Vote comment as useful", l) : r.event("Listing", "Vote comment as not useful", l)
                            }).fail(function(e) {
                                c.removeClass("loading"), a.openAlert(t("<p>Gửi đánh giá không thành công. Xin vui lòng thử lại.</p>")), r.event("Listing", "Vote on comment failed", e.responseText)
                            })))
                        })
                    })
                },
                v = function() {
                    t(".comments-container .child").each(function() {
                        t(this).on("click", ".open-edit-comment", function(e) {
                            var o = t(this).attr("data-comment-id"),
                                r = t(this),
                                s = "place-comment" == t(this).attr("name") ? i.api.place.comment.put : i.api.professional.comment.put;
                            t.ajax(s + o, {
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                contentType: "application/json; charset=utf-8",
                                method: "GET"
                            }).done(function(e) {
                                e.place ? (e.professional = "", e.name = "place-comment") : (e.place = "", e.name = "professional-comment"), u(r.parent(), e), r.closest("li.comment").addClass("editing")
                            }).fail(function(e) {
                                a.openAlert(403 == e.status ? t("<p>Bạn chỉ có thể trả lời nhận xét trên trang mà bạn quản lý.</p>") : t("<p>Sửa không thành công. Xin vui lòng thử lại.</p>"))
                            }), e.preventDefault()
                        }), t(this).on("submit", ".form-edit-comment", function(e) {
                            var o = t(this),
                                r = o.attr("data-id"),
                                s = o.attr("data-place-id"),
                                l = o.attr("data-professional-id"),
                                c = o.find('[name="comment"]').val(),
                                u = "place-comment" == o.attr("name") ? i.api.place.comment.put : i.api.professional.comment.put;
                            t.ajax(u + r, {
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                contentType: "application/json; charset=utf-8",
                                data: JSON.stringify({
                                    comment: c,
                                    place: s,
                                    professional: l
                                }),
                                method: "PUT"
                            }).done(function(e) {
                                o.closest("li.comment").removeClass("editing").find(".comment-content").html(e.comment_html), o.remove()
                            }).fail(function() {
                                o.removeClass("submitting"), a.openAlert(t("<p>Gửi nhận xét không thành công. Xin vui lòng thử lại.</p>"))
                            }), e.preventDefault()
                        }), t(this).on("click", ".cancel-edit", function(e) {
                            e.preventDefault(), t(this).closest("li.comment").removeClass("editing"), t(this).closest("form").remove()
                        })
                    })
                },
                y = function() {
                    t(".comments-container li").each(function() {
                        t(this).on("click", ".open-reply-comment", function(e) {
                            if (e.preventDefault(), t(this).hasClass("replying")) t(this).removeClass("replying"), t(this).closest("li.comment").find("form").remove();
                            else {
                                t(this).addClass("replying");
                                var n = {
                                    id: t(this).attr("data-comment-id"),
                                    place: t(this).attr("data-place-id"),
                                    professional: t(this).attr("data-professional-id"),
                                    email: t(this).attr("data-email")
                                };
                                n.name = n.place ? "place-comment" : "professional-comment", d(t(this).parent(), n)
                            }
                        }), t(this).on("submit", ".form-reply-comment", function(e) {
                            var o = t(this),
                                l = o.attr("data-id"),
                                c = o.attr("data-place-id"),
                                u = o.attr("data-professional-id"),
                                d = o.attr("data-email"),
                                h = o.find('[name="comment"]').val(),
                                f = "place-comment" == o.attr("name") ? i.api.place.comment.create : i.api.professional.comment.create;
                            o.addClass("submitting"), t.ajax(f, {
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                contentType: "application/json; charset=utf-8",
                                data: JSON.stringify({
                                    comment: h,
                                    parent: l,
                                    place: c || void 0,
                                    email: d,
                                    professional: u || void 0,
                                    source: "review"
                                }),
                                method: "POST"
                            }).done(function(e) {
                                e.email = d, e.created_at = s.datetimeObjectToUiTime(new Date) + " " + s.datetimeObjectToUiDate(new Date), e.name = name, p(o.closest("li.comment"), e), o.remove(), u ? r.page("/nhan-xet/hoan-thanh/bac-si/" + u, "Gửi nhận xét thành công cho bác sĩ") : c && r.page("/nhan-xet/hoan-thanh/co-so-y-te/" + c, "Gửi nhận xét thành công cho cơ sở y tế")
                            }).fail(function(e) {
                                o.removeClass("submitting"), a.openAlert(403 == e.status ? t("<p>Bạn chỉ có thể trả lời nhận xét trên trang mà bạn quản lý. Nếu đây là phòng khám / trang thông tin của bạn, vui lòng liên hệ với chúng tôi để có thể trả lời trực tiếp với người bệnh</p>") : t("<p>Edit không thành công. Xin vui lòng thử lại.</p>"))
                            }), e.preventDefault()
                        })
                    })
                };
            return {
                init: function() {
                    f(), g(), v(), y()
                }
            }
        }), define("components/booking-form", ["require", "jquery", "js-cookie", "components/overlay", "components/track", "components/config", "underscore", "components/login-overlay", "components/util"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/overlay"),
                o = e("components/track"),
                r = e("components/config"),
                a = e("underscore"),
                s = e("components/login-overlay"),
                l = e("components/util"),
                c = function(e) {
                    e.submit(function(e) {
                        var c = {},
                            u = t(this),
                            d = u.find('[name="name"]').val(),
                            p = u.find('[name="email"]').val(),
                            h = u.find('[name="phone"]').val(),
                            f = u.find('[name="reason"]').val(),
                            m = u.find('[name="time"]').val(),
                            g = u.find('[name="place"]').val(),
                            v = u.find('[name="professional"]').val(),
                            y = u.find('[name="address"]').val(),
                            b = u.find('[name="date"]').val();
                        c.name = u.find('[name="nameBooker"]').val(), c.mobile_phone = u.find('[name="phoneBooker"]').val(), c.email = u.find('[name="emailBooker"]').val() || null, u.addClass("submitting"), n.set("email", p, {
                            expires: 365
                        }), n.set("name", d, {
                            expires: 365
                        }), n.set("phone", h, {
                            expires: 365
                        });
                        var x = {
                            name: d,
                            email: p,
                            phone: h,
                            reason_booking: f,
                            booking_start: m,
                            place: g,
                            professional: v,
                            address: y,
                            date_of_birth: b ? b : void 0,
                            booked_by: c
                        };
                        u.find('input[name="hasBookedBy"]').is(":checked") ? (x.email = null, x.phone = null, null != x.booked_by.email && n.set("email", x.booked_by.email, {
                            expires: 365
                        })) : x.booked_by = null, t.ajax(r.api.booking, {
                            contentType: "application/json; charset=utf-8",
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            data: JSON.stringify(x),
                            method: "POST"
                        }).done(function() {
                            u.removeClass("submitting"), u.parent().addClass("successful"), delete localStorage.formBooking;
                            var e = t("#booking-confirmation-template").html();
                            u.parent().append(a.template(e)({
                                name: d,
                                phone: h,
                                email: p,
                                reason: f,
                                booked_by: c,
                                address: y,
                                dob: l.datetimeObjectToUiDate(new Date(b)),
                                hasBookedBy: u.find('input[name="hasBookedBy"]').is(":checked")
                            })), o.page("/dat-kham/hoan-thanh/" + g, "Hoàn thành đặt khám")
                        }).fail(function(e) {
                            u.removeClass("submitting"), e.responseJSON && e.responseJSON.non_field_errors && "EMAIL_EXISTS" == e.responseJSON.non_field_errors[0] ? (s.openLoginOverlay("email-existed", r.api.account.login + "?source=booking&next=" + window.location.href), x.hasBookedBy = u.find('input[name="hasBookedBy"]').is(":checked"), localStorage.setItem("formBooking", JSON.stringify(x))) : (i.openAlert(t('<h2>Đặt khám gặp lỗi, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), o.page("/dat-kham/loi/" + g, "Đặt khám gặp lỗi " + e.responseText))
                        }), e.preventDefault()
                    })
                },
                u = function(e) {
                    {
                        var n = e.find('[name="email"]'),
                            i = e.find('[name="phone"]'),
                            o = e.find('[name="name"]');
                        e.find('[name="nameBooker"]'), e.find('[name="phoneBooker"]')
                    }
                    e.find('input[name="hasBookedBy"]').change(function() {
                        e.find(".for-booked-by").each(t(this).is(":checked") ? function() {
                            e.addClass("form-has-booked-by"), e.find('[name="nameBooker"], [name="phoneBooker"]').attr("required", !0), e.find('[name="phone"]').attr("required", !1), t("body").hasClass("logged-in") && (n.val("").removeAttr("readonly"), o.val("").removeAttr("readonly"), i.val("").removeAttr("readonly"))
                        } : function() {
                            n.val(n.data("email")).attr("readonly", n.data("email") && !0), i.val(i.data("phone")).attr("readonly", i.data("phone") && !0).attr("required", !0), o.val(o.data("name")).attr("readonly", o.data("name") && !0).attr("required", !0), e.removeClass("form-has-booked-by"), e.find('[name="nameBooker"], [name="phoneBooker"], [name="emailBooker"]').removeAttr("required")
                        })
                    })
                },
                d = function(e) {
                    var t, n = e.find('[name="email"]'),
                        i = e.find('[name="phone"]'),
                        o = e.find('[name="name"]');
                    if (localStorage.formBooking)
                        if (t = JSON.parse(localStorage.formBooking), e.find('[name="reason"]').val(t.reason_booking), e.find('[name="time"]').val(t.booking_start), e.find('[name="place"]').val(t.place), e.find('[name="professional"]').val(t.professional), e.find('[name="address"]').val(t.address), e.find('[name="date"]').val(t.date_of_birth), t.hasBookedBy) {
                            var r = e.find('[name="nameBooker"]'),
                                a = e.find('[name="phoneBooker"]'),
                                s = e.find('[name="emailBooker"]');
                            e.find('[name="nameBooker"], [name="phoneBooker"]').attr("required", !0), e.find('input[name="hasBookedBy"]').prop("checked", !0), e.find(".for-booked-by").each(function() {
                                e.addClass("form-has-booked-by")
                            }), r.val() || r.removeAttr("readonly").val(t.name), a.val() || a.removeAttr("readonly").val(t.mobile_phone), s.val() || s.removeAttr("readonly").val(t.email), i.val(t.phone).removeAttr("readonly required"), o.val(t.name).removeAttr("readonly"), n.val(t.email).removeAttr("readonly required")
                        } else o.val() || o.val(t.name).removeAttr("readonly"), i.val() || i.val(t.phone).removeAttr("readonly"), n.val() || n.val(t.email).removeAttr("readonly")
                };
            return {
                init: function() {
                    var e = t("#booking-create form");
                    0 != e.size() && (c(e), u(e), d(e))
                }
            }
        }), define("components/booking-picker", ["require", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "underscore", "components/util"], function(e) {
            "use strict";
            var t, n = e("jquery"),
                i = e("js-cookie"),
                o = e("components/overlay"),
                r = e("components/config"),
                a = e("components/track"),
                s = e("underscore"),
                l = e("components/util"),
                c = function() {
                    n("#list .action-book").click(function(e) {
                        var t = n(n(this).attr("href")),
                            i = n(this).attr("data-place-id"),
                            o = n(this).attr("data-professional-id");
                        t.toggleClass("showing"), t.hasClass("showing") && (i ? a.page("/dat-kham/danh-sach/co-so-y-te/" + i, "Mở bảng giờ đặt khám (từ trang danh sách cơ sở y tế)") : o && a.page("/dat-kham/danh-sach/bac-si/" + o, "Mở bảng giờ đặt khám (từ trang danh sách bác sĩ)"), d(t.find("select.has-my-bacsiviet"))), e.preventDefault()
                    }), n("#detail .action-book").click(function() {
                        var e = n(this).attr("data-place-id"),
                            t = n(this).attr("data-professional-id");
                        e ? a.page("/dat-kham/chi-tiet/co-so-y-te/" + e, "Mở bảng giờ đặt khám (từ trang xem chi tiết cơ sở y tế)") : t && a.page("/dat-kham/chi-tiet/bac-si/" + t, "Mở bảng giờ đặt khám (từ trang xem chi tiết bác sĩ)")
                    })
                },
                u = function() {
                    n(".booking select.has-my-bacsiviet").each(function() {
                        n(this).on("change", function() {
                            d(n(this))
                        }), n(this).hasClass("showing") && d(n(this))
                    })
                },
                d = function(e) {
                    var o, a, c = e.data("place-id"),
                        u = e.data("professional-id"),
                        d = e.find("option:selected").val(),
                        f = e.find("option:selected").text();
                    c ? u || (u = d, a = f) : (c = d, o = f), e.closest(".booking").addClass("loading"), n.ajax(r.api.slot.replace("{place}", c).replace("{professional}", u), {
                        headers: {
                            "X-XSRF-TOKEN": i.get("XSRF-TOKEN")
                        }
                    }).done(function(i) {
                        n.each(i, function(e, t) {
                            t.dayFormatted = l.datetimeObjectToUiDay(new Date(t.date)), t.shortDateFormatted = l.datetimeObjectToUiShortDate(new Date(t.date)), t.dateFormatted = l.datetimeObjectToUiDate(new Date(t.date)), n.each(t.slots, function(e, t) {
                                t.past = Date.parse(t.start) < new Date ? !0 : !1, t.startFormatted = l.datetimeObjectToUiTime(new Date(t.start))
                            })
                        }), i.hasSlots = p(i), i.professionalId = u, i.placeId = c, i.professionalName = a, i.placeName = o, e.closest("#widget").size() > 0 && (i.openInNewWindow = !0);
                        var r = n(s.template(t)(i));
                        h(r), e.closest(".booking").find(".booking-picker .weeks").replaceWith(r)
                    }).always(function() {
                        e.closest(".booking").removeClass("loading")
                    })
                },
                p = function(e) {
                    for (var t = 0; t < e.length; t++)
                        if (e[t].slots.length > 0) return !0;
                    return !1
                },
                h = function(e) {
                    n("a.full", e).on("click", function(e) {
                        o.openAlert(n("<p>Khung giờ này đã kín chỗ, xin vui lòng thử một khung giờ khác.</p>")), e.preventDefault()
                    })
                };
            return {
                init: function() {
                    t = n("#booking-picker-template").html(), c(), u()
                },
                renderSlots: d
            }
        }), define("components/promotion", ["require", "jquery", "js-cookie", "components/config", "components/track", "components/booking-picker", "components/login-overlay"], function(e) {
            "use strict";
            var t, n = e("jquery"),
                i = e("js-cookie"),
                o = e("components/config"),
                r = e("components/track"),
                a = e("components/booking-picker"),
                s = e("components/login-overlay"),
                l = function() {
                    n(".promotion-btn", t).click(function(e) {
                        e.preventDefault();
                        var i = "[data-promotion-group-position=" + n(this).parent().data("promotion-group-position") + "]",
                            l = n("input.promotion-group-input:checked", i).val(),
                            u = n(i).find(l),
                            d = n(i).find(u.attr("href")),
                            p = u.attr("data-bookable"),
                            h = t.data("presignup-target"),
                            f = u.attr("data-place-id");
                        if (l) {
                            if (n("body").hasClass("not-logged-in")) return s.openSignupOverlay("source-promotion", o.api.account.signup + "?source=promotion&next=" + window.location.href), localStorage.setItem("preSignupChoice", n("input.promotion-group-input:checked", i).data("input-position")), localStorage.setItem("preSignupPromotionGroup", i), void localStorage.setItem("preSignupTarget", h);
                            n(this).after(d), n(this).addClass("hide"), d.addClass("showing"), n(this).closest(".promotion-group").on("change", function() {
                                var e = n("input.promotion-group-input:checked", i).val(),
                                    t = n(i).find(e),
                                    o = n(i).find(t.attr("href"));
                                n(this).find(".actions.showing").removeClass("showing"), n(this).find(".promotion-btn").after(o), o.addClass("showing")
                            }), c(h, u), f && "True" == p ? (r.page(u.attr("data-track-path") + "/dat-kham", u.attr("data-track-label") + "(đặt khám)"), a.renderSlots(d.find("select.has-my-bacsiviet"))) : r.page(u.attr("data-track-path"), u.attr("data-track-label"))
                        }
                    })
                },
                c = function(e, t) {
                    var a = o.api.promotionClaim;
                    n.ajax(a, {
                        headers: {
                            "X-XSRF-TOKEN": i.get("XSRF-TOKEN")
                        },
                        contentType: "application/json; charset=utf-8",
                        data: JSON.stringify({
                            promotion: e
                        }),
                        method: "POST"
                    }).fail(function(e) {
                        r.page(t.attr("data-track-path") + "/loi", "Gửi mã ưu đãi đến người dùng gặp lỗi " + e.responseText)
                    })
                },
                u = function() {
                    if (localStorage.getItem("preSignupChoice") && n("body").hasClass("logged-in")) {
                        var e = localStorage.getItem("preSignupChoice"),
                            i = localStorage.getItem("preSignupPromotionGroup"),
                            o = localStorage.getItem("preSignupTarget");
                        o == t.data("presignup-target") && (n(i).find("input[data-input-position=" + e + "]").prop("checked", !0), n(i).find(".promotion-btn").click(), localStorage.removeItem("preSignupChoice"), localStorage.removeItem("preSignupTarget"))
                    }
                };
            return {
                init: function() {
                    t = n("#promotion-detail"), t.length && (l(), u())
                }
            }
        }), define("components/email-reset", ["require", "jquery", "js-cookie", "components/config", "components/track", "components/overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/config"),
                o = e("components/track"),
                r = e("components/overlay");
            return {
                init: function() {
                    t("#send-email-reset form").submit(function(e) {
                        var a = t(this),
                            s = a.find('input[name="email"]').val(),
                            l = i.api.account.reset + window.location.search;
                        a.addClass("submitting"), t.ajax(l, {
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                email: s
                            }),
                            method: "POST"
                        }).done(function() {
                            a.removeClass("submitting"), a.parent().addClass("successful");
                            var e = t("#send-reset-mail-template").html();
                            a.parent().append(_.template(e)({
                                email: s
                            })), o.page("/quen-mat-khau/hoan-thanh/", "Gửi thông tin quên mật khẩu thành công!")
                        }).fail(function(e) {
                            a.removeClass("submitting"), r.openAlert(t('<h2>Đã xảy ra lỗi, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), o.page("/quen-mat-khau/loi/", "Quên mật khẩu gặp lỗi " + e.responseText)
                        }), e.preventDefault()
                    }), t(".logout").click(function(e) {
                        var o = i.api.account.logout + window.location.search;
                        t.ajax(o, {
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            method: "POST"
                        }).done(function() {
                            n.remove("XSRF-TOKEN", {
                                domain: ".tdoctor.vn"
                            }), location.reload()
                        }).fail(function() {
                            n.remove("XSRF-TOKEN", {
                                domain: ".tdoctor.vn"
                            }), location.reload()
                        }), e.preventDefault()
                    })
                }
            }
        }), define("components/reset-password", ["require", "jquery", "js-cookie", "components/config", "components/track", "components/overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = (e("components/config"), e("components/track")),
                o = e("components/overlay");
            return {
                init: function() {
                    t("#reset-password form").submit(function(e) {
                        var r = t(this),
                            a = r.find('input[name="password"]').val(),
                            s = r.find('input[name="password_confirm"]').val();
                        r.addClass("submitting"), t.ajax({
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                password: a,
                                password_confirm: s
                            }),
                            method: "POST"
                        }).done(function(e) {
                            r.removeClass("submitting"), r.parent().addClass("successful");
                            var n = t("#reset-success-template").html();
                            r.parent().append(_.template(n)({
                                name: e.name,
                                email: e.email,
                                mobile_phone: e.mobile_phone || "Chưa cung cấp"
                            })), i.page("/quen-mat-khau/hoan-thanh/", "Hoàn thành đổi mật khẩu")
                        }).fail(function(e) {
                            r.removeClass("submitting"), o.openAlert(t('<h2>Đổi mật khẩu gặp lỗi, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), i.page("/quen-mat-khau/loi/", "Đổi mật khẩu gặp lỗi " + e.responseText)
                        }), e.preventDefault()
                    })
                }
            }
        }), define("components/change-password", ["require", "jquery", "js-cookie", "components/config", "components/track", "components/overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = (e("components/config"), e("components/track")),
                o = e("components/overlay");
            return {
                init: function() {
                    t("#account .change-password form").submit(function(e) {
                        var r = t(this),
                            a = r.find('input[name="password"]').val(),
                            s = r.find('input[name="new_password"]').val(),
                            l = r.find('input[name="new_password_confirm"]').val();
                        r.addClass("submitting"), t.ajax({
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                password: a,
                                new_password: s,
                                new_password_confirm: l
                            }),
                            method: "POST"
                        }).done(function(e) {
                            r.removeClass("submitting"), r.parent().addClass("successful");
                            var n = t("#change-success-template").html();
                            r.parent().append(_.template(n)({
                                name: e.name,
                                email: e.email,
                                mobile_phone: e.mobile_phone || "Chưa cung cấp"
                            })), r.remove(), i.page("/doi-mat-khau/hoan-thanh/", "Hoàn thành đổi mật khẩu")
                        }).fail(function(e) {
                            r.removeClass("submitting"), o.openAlert(t('<h2>Đổi mật khẩu gặp lỗi, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), i.page("/doi-mat-khau/loi/", "Đổi mật khẩu gặp lỗi " + e.responseText)
                        }), e.preventDefault()
                    })
                }
            }
        }), define("components/email-confirm", ["require", "jquery", "js-cookie", "components/config", "components/track", "components/overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = (e("components/config"), e("components/track")),
                o = e("components/overlay");
            return {
                init: function() {
                    t("#email-confirmation").submit(function(e) {
                        t.ajax({
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            method: "POST"
                        }).done(function() {
                            o.openAlert(t("<p>Xác thực email thành công!</p>")), i.page("/xac-thuc/hoan-thanh/", "Xác thực email hoàn thành")
                        }).fail(function(e) {
                            o.openAlert(t("<p>Xác thực email không thành công!</p>")), i.page("/xac-thuc/loi/", "Xác thực email gặp lỗi" + e.responseText)
                        }), e.preventDefault()
                    }).trigger("submit")
                }
            }
        }), define("components/forum-form", ["require", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "underscore", "components/login-overlay"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/overlay"),
                o = e("components/config"),
                r = e("components/track"),
                a = (e("underscore"), e("components/login-overlay")),
                s = 5e3,
                l = function() {
                    t("#thread-create form.question-new").submit(function(e) {
                        var l = t(this),
                            c = l.find('[name="email"]').val(),
                            u = l.find('[name="title"]').val(),
                            d = l.find('[name="body"]').val(),
                            p = l.find('[name="name"]').val(),
                            h = l.find('[name="hiding_creator"]').is(":checked"),
                            f = l.find('[name="censor_images"]').is(":checked"),
                            m = l.find('[name="user_id"]').val(),
                            g = l.find('[name="files"]')[0].files,
                            v = l.find('[name="gender"]'),
                            y = l.find('[name="dob"]'),
                            b = l.find('[name="province"]'),
                            x = l.find('[name="specialities"]').val(),
                            w = new FormData;
                        if (w.append("email", c), w.append("title", u), w.append("body", d), w.append("name", p), w.append("hiding_creator", h), w.append("censor_images", f), w.append("user_id", m), w.append("speciality", x), null != g)
                            for (var k = 0; k < g.length; k++) w.append("images", g[k]);
                        if (v.is(":disabled") || w.append("gender", v.val()), y.is(":disabled") || w.append("dob", y.val()), b.is(":disabled") || w.append("province", b.val()), "undefined" != typeof n.get("zoanid")) {
                            var _ = n.get("zoanid");
                            w.append("zalo_uid", _)
                        }
                        l.addClass("submitting"), n.set("email", c, {
                            expires: 365
                        }), n.set("name", p, {
                            expires: 365
                        }), t.ajax(o.api.newQuestion, {
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            processData: !1,
                            contentType: !1,
                            dataType: "json",
                            data: w,
                            method: "POST"
                        }).done(function(e) {
                            r.page("/hoi-bac-si/dat-cau-hoi/hoan-thanh", "Đặt câu hỏi thành công"), i.open(t('<p>Câu hỏi của bạn đã được BacsiViet tiếp nhận. Chúng tôi sẽ chuyển câu trả lời của bác sĩ tới bạn trong thời gian sớm nhất.</p><div><a href="' + e.url + '" class="button">OK</a></div>'), "no-close-button"), setTimeout(function() {
                                window.location = e.url
                            }, s), localStorage.removeItem("newThreadTitle"), localStorage.removeItem("newThreadBody")
                        }).fail(function(e) {
                            l.removeClass("submitting"), localStorage.email = c, localStorage.newThreadTitle = u, localStorage.newThreadBody = d, localStorage.name = p, "LOGIN_REQUIRED" == e.responseJSON[0] ? a.openLoginOverlay("email-existed", o.api.account.login + "?source=forum&next=" + window.location.href) : i.openAlert(t('<h2>Gửi câu hỏi chưa thành công, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), r.page("/hoi-bac-si/dat-cau-hoi/loi", "Đặt câu hỏi lỗi")
                        }), e.preventDefault()
                    }).each(function() {
                        "" == t(this).find('input[name="name"]').val() && t(this).find('input[name="name"]').val(n.get("name")), "" == t(this).find('input[name="email"]').val() && t(this).find('input[name="email"]').val(n.get("email")), "undefined" != typeof Storage && ("" == t(this).find('input[name="email"]').val() && t(this).find('[name="email"]').val(localStorage.email), "" == t(this).find('input[name="name"]').val() && t(this).find('[name="name"]').val(localStorage.name), t(this).find('[name="title"]').val(localStorage.newThreadTitle), t(this).find('[name="body"]').val(localStorage.newThreadBody))
                    })
                },
                c = function() {
                    t('#thread-create form.question-new input[name="files"]').change(function() {
                        var e = t(this).closest("form"),
                            n = e.find('[name="files"]')[0].files,
                            i = e.find("#filelist");
                        i.html("");
                        for (var o = 0; o < n.length; o++) i.html(i.html() + (o + 1) + ". " + n[o].name + "</br>");
                        "" !== i.html() ? i.addClass("show") : i.removeClass("show")
                    })
                },
                u = function() {
                    t("#thread-create .question-new .more-info").on("click", ".btn-toggle", function(e) {
                        var n = t(this).closest(".more-info");
                        n.hasClass("hide") ? n.toggleClass("hide").addClass("show") : n.toggleClass("show").addClass("hide"), e.preventDefault()
                    })
                };
            return {
                init: function() {
                    l(), c(), u()
                }
            }
        }), define("components/forum-feedback", ["require", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "underscore"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = (e("components/overlay"), e("components/config")),
                o = e("components/track"),
                r = (e("underscore"), function() {
                    t("#thread-detail, #thread-collection, #activity-list, #detail-cms").on("click", ".thank", function(e) {
                        var r = t(this);
                        r.hasClass("active") || (r.addClass("active"), t.ajax(i.api.forumFeedback, {
                            contentType: "application/json; charset=utf-8",
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            data: JSON.stringify({
                                id: r.attr("data-id")
                            }),
                            method: "POST"
                        }).done(function() {
                            r.addClass("active");
                            var e = r.parent().find("span.thank-count-value");
                            e.text(parseInt(e.text()) + 1);
                            var i = r.attr("data-id");
                            n.get("post_thanks") ? i = "," + i : n.set("post_thanks", ""), r.siblings(".thanks-count-inner").addClass("show"), n.set("post_thanks", n.get("post_thanks") + i, {
                                expires: 365
                            }), t("#thread-detail, #thread-collection, #activity-list").length ? o.event("Q & A", "Thank") : o.event("CMS", "Thank")
                        }).fail(function(e) {
                            t("#thread-detail, #thread-collection, #activity-list").length ? o.event("Q & A", "Thanking failed", "Error:" + e.responseText) : o.event("CMS", "Thanking failed", "Error:" + e.responseText)
                        })), e.preventDefault()
                    })
                });
            return {
                init: function() {
                    r()
                }
            }
        }), ! function(e, t) {
            "function" == typeof define && define.amd ? define("autoResize", ["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(e.jQuery, e)
        }(this, function(e, t) {
            "use strict";
            var n, i, o = window,
                r = document,
                a = navigator.userAgent;
            /msie|trident/i.test(a) && (i = a.match(/(?:msie |rv:)(\d+(\.\d+)?)/i), n = i && i.length > 1 && i[1] || "");
            var s = function(e, t, n) {
                    e[t + n] = function(t) {
                        n.call(e, t)
                    }, e.attachEvent("on" + t, e[t + n])
                },
                l = function(e, t, n) {
                    e.detachEvent("on" + t, e[t + n])
                },
                c = function(e, t) {
                    return o.getComputedStyle ? o.getComputedStyle(e)[t] : e.currentStyle ? e.currentStyle[t] : void 0
                },
                u = function(t, i) {
                    null == i ? i = {} : "function" == typeof i && (i = {
                        onresizeheight: i
                    });
                    var o = t.value;
                    t.value = "";
                    var a = parseFloat(c(t, "paddingTop")) + parseFloat(c(t, "paddingBottom")),
                        u = t.scrollHeight - (t.clientHeight - a);
                    t.value = o;
                    var d, p;
                    9 > n && (d = function() {
                        t.scrollTop = 0
                    }, s(t, "scroll", d), p = t.value, t.value = "aa", t.value = p, r.execCommand("Undo"), r.execCommand("Undo"), r.execCommand("Undo"), r.execCommand("Undo"));
                    var h, f = !0,
                        m = function() {
                            if (t.value !== o || f) {
                                o = t.value;
                                var r = t.style.height;
                                t.style.height = "";
                                var a = function() {
                                    var n = t.scrollHeight - u;
                                    i.maxHeight && n > i.maxHeight ? (t.style.height = i.maxHeight + "px", t.style.overflowY = "auto", t.detachEvent && l(t, "scroll", d)) : t.style.height = n + "px";
                                    var o = parseFloat(t.style.height);
                                    h !== o && (h = o, e && e.fn && e(t).trigger("autoresize:height", o), i.onresizeheight && i.onresizeheight.call(t, o))
                                };
                                9 > n ? (setTimeout(a, 0), t.style.height = r) : a()
                            }
                        };
                    if (t.addEventListener && (!n || n > 9)) t.addEventListener("input", m, !1);
                    else {
                        var g = function(e) {
                            "value" === e.propertyName && m()
                        };
                        s(t, "propertychange", g);
                        var v = function(e) {
                            "focus" === e.type ? s(r, "selectionchange", m) : l(r, "selectionchange", m)
                        };
                        s(t, "focus", v), s(t, "blur", v), s(t, "keyup", m)
                    }
                    return m(), f = !1, {
                        reset: function() {
                            t.style.height = "", t.removeEventListener && (!n || n > 9) ? t.removeEventListener("input", m, !1) : (t.style.overflowY = "", l(t, "propertychange", g), l(r, "selectionchange", m), l(t, "focus", v), l(t, "blur", v), l(t, "keyup", m), l(t, "scroll", d))
                        }
                    }
                };
            return e && e.fn ? e.fn.autoResize = function(t) {
                var n = [];
                return this.each(function(e, i) {
                    n.push(u(i, t))
                }), {
                    reset: function() {
                        e.each(n, function(e, t) {
                            t.reset()
                        })
                    }
                }
            } : t && (t.autoResize = u), u
        }), define("components/auto-resize-textarea", ["require", "jquery", "autoResize"], function(e) {
            "use strict"; {
                var t = e("jquery");
                e("autoResize")
            }
            return {
                resize: function() {
                    t("#thread-detail .resize-textarea").autoResize()
                }
            }
        }), define("components/collapsible", ["require"], function() {
            "use strict";
            return {
                init: function() {
                    var e = ".collapsible-container",
                        t = ".collapsible-target",
                        n = ".collapse-trigger",
                        i = ".collapsible-block",
                        o = ($(i).first(), 40);
                    $(e).each(function() {
                        function i() {
                            return 1 == $(this).parent(e).hasClass("collapsed") ? $(this).parent(e).removeClass("collapsed").addClass("expanded") : $(this).parent(e).removeClass("expanded").addClass("collapsed"), !1
                        }
                        return $(this).each(function() {
                            var e = $(this).find("dt").length;
                            if ($(this).hasClass("collapsible-list")) 10 >= e && $(this).find(n).hide();
                            else if ($(this).hasClass("collapsible-text")) {
                                var r = $(this).find(t).height();
                                $(this).addClass("collapsed"), r - $(this).find(t).innerHeight() < o && ($(this).find(n).hide(), $(this).find(t).css("max-height", "none"))
                            }
                            $(this).unbind("click"), $(this).on("click", n, i)
                        })
                    })
                }
            }
        }), define("components/forum-reply-form", ["require", "components/suggestion", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "underscore", "components/util", "components/login-overlay", "components/auto-resize-textarea", "components/collapsible", "components/suggestion"], function(e) {
            "use strict";
            e("components/suggestion");
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/overlay"),
                o = e("components/config"),
                r = e("components/track"),
                a = e("underscore"),
                s = e("components/util"),
                l = e("components/login-overlay"),
                c = e("components/auto-resize-textarea"),
                u = (e("components/collapsible"), e("components/suggestion"), function(e, n) {
                    var i = "";
                    i = n.post.created_by.official ? t("#thread-reply-template").html() : t("#thread-reply-template-user").html(), e.before(a.template(i)(n))
                }),
                d = function() {
                    var e = t("#post-reply-form");
                    e.find(".role-selector option").each(function() {
                        var e = t(this).val(),
                            i = JSON.parse(e),
                            o = i.reply_as_type,
                            r = i.reply_as_id;
                        n.get("forumReplyAsType") == o && n.get("forumReplyAsId") == r && t(this).attr("selected", "selected")
                    }), e.find(".role-selector option:checked").data("image") && e.find(".avatar-form").css("background-image", "url(" + e.find(".role-selector option:checked").data("image") + ")")
                },
                p = function() {
                    var e = t("#post-reply-form");
                    e.find(".role-selector").on("change", function() {
                        var i = (t(this).find("option:checked").data("image"), t(this).val()),
                            o = JSON.parse(i),
                            r = o.reply_as_type,
                            a = o.reply_as_id;
                        n.set("forumReplyAsType", r, {
                            expires: 365
                        }), n.set("forumReplyAsId", a, {
                            expires: 365
                        }), e.find(".role-selector option:checked").data("image") ? e.find(".avatar-form").css("background-image", "url(" + e.find(".role-selector option:checked").data("image") + ")") : e.find(".avatar-form").css("background-image", "")
                    })
                },
                h = function() {
                    if (t("#thread-detail, #detail-cms").length) {
                        var e = (t(".reply"), t("#post-reply-form")),
                            i = e.offset().top;
                        t("#thread-detail, #detail-cms").each(function() {
                            t(this).on("click", ".reply", function(r) {
                                var a = e.find(".form-control"),
                                    l = t(this).attr("data-id"),
                                    u = o.api.post.updatePost.replace("{post_id}", l);
                                t.ajax(u, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    method: "GET"
                                }).done(function(e) {
                                    var t = e.post_data.body_no_html,
                                        n = e.replyer,
                                        i = e.post_data.hiding_creator,
                                        o = t.replace(/\r/g, "").replace(/\n/g, "\n> "),
                                        r = s.datetimeObjectToUiFullDateTime(new Date(e.post_data.created_at));
                                    a.val(i ? "**Giấu tên** đã viết, vào lúc " + r + "\n> " + o + "\n\n" : "**" + n + "** đã viết, vào lúc " + r + "\n> " + o + "\n\n"), c.resize()
                                }), t("html, body").animate({
                                    scrollTop: i - 100 + "px"
                                }, 500), t("#post-reply-form").find(".form-control.resize-textarea").focus(), r.preventDefault()
                            })
                        })
                    }
                },
                f = function(e) {
                    return e.map(function(e) {
                        return {
                            groupClass: "",
                            groupIcon: "",
                            groupName: "",
                            groupUrl: "",
                            items: [e]
                        }
                    })
                },
                m = function(e, t, n) {
                    var i;
                    return function() {
                        var o = this,
                            r = arguments,
                            a = function() {
                                i = null, n || e.apply(o, r)
                            },
                            s = n && !i;
                        clearTimeout(i), i = setTimeout(a, t), s && e.apply(o, r)
                    }
                },
                g = function() {
                    t("#post-reply-form").find(".input-auto-complete").each(function() {
                        var e = t(this);
                        e.suggestion({
                            lookup: m(function(e, i) {
                                t.ajax(o.api.post.replyerAutocomplete, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    data: {
                                        q: e
                                    },
                                    method: "GET"
                                }).done(function(n) {
                                    if (-1 != n.indexOf("-")) var o = t.makeArray(t(n)).map(function(e) {
                                        var n = t(e.outerHTML).data("value").split("-"),
                                            i = t(e.outerHTML).text();
                                        return {
                                            reply_as_type_id: n[0],
                                            reply_as_id: n[1],
                                            name: i
                                        }
                                    });
                                    else var o = t.makeArray(t(n)).map(function(e) {
                                        var n = t(e.outerHTML).text();
                                        return {
                                            name: n
                                        }
                                    });
                                    i(f(o, e))
                                })
                            }, 400),
                            onSelect: function(t, n) {
                                var i = n.items[0];
                                e.parent(".has-suggestion").after('<div class="result-autocomplete" data-reply-as-type-id="' + i.reply_as_type_id + '" data-reply-as-id="' + i.reply_as_id + '"><i class="fa fa-times"></i>' + i.name + "</div>"), e.hide(), t.preventDefault()
                            }
                        })
                    })
                },
                v = function() {
                    var e = t("#post-reply-form .replyer-autocomplete, #page-title .box-assign");
                    e.on("click", "i", function(e) {
                        var i = t(this).parent(".result-autocomplete").siblings(".has-suggestion").find("input.input-auto-complete");
                        if (t(this).parent().remove(), i.show().val("").focus(), t(this).closest(".box-assign")) {
                            var r = (t("#page-title .result-autocomplete"), t("#thread-detail .question").data("id"));
                            t.ajax(o.api.post.postAssignment, {
                                contentType: "application/json; charset=utf-8",
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                data: JSON.stringify({
                                    action: "cancel",
                                    post_id: r
                                }),
                                method: "POST"
                            })
                        }
                        e.preventDefault()
                    })
                },
                y = function() {
                    t("#thread-detail form.post-new").find(".radio-role-selector").prop("checked", !0), t("#thread-detail form.post-new").on("change", '[name="check-option"]', function(e) {
                        t(".radio-role-selector").is(":checked") && (t(this).siblings(".role-selector").prop("disabled", !1), t(this).closest(".post-new").find(".input-auto-complete").prop("disabled", !0)), t(".radio-check-option").is(":checked") && (t(this).siblings(".has-suggestion").find(".input-auto-complete").prop("disabled", !1), t(this).closest(".post-new").find(".role-selector").prop("disabled", !0)), e.preventDefault()
                    }), t("#thread-detail, #detail-cms").find(".post-new").submit(function(e) {
                        var a = t(this),
                            s = a.find('[name="body"]').val(),
                            l = a.find('[name="thread_id"]').val(),
                            c = a.find('[name="hiding_creator"]').is(":checked"),
                            d = a.find('.censor_images input[type="checkbox"]').is(":checked"),
                            p = a.find(".role-selector").val(),
                            h = "",
                            f = a.find(".result-autocomplete"),
                            m = a.find(".form-upload");
                        if (h = JSON.parse(null != p ? p : t(this).find('[name="reply_as_information"]').val()), f.length) var g = f.data("reply-as-type-id"),
                            v = f.data("reply-as-id");
                        var y = h.reply_as_type,
                            b = h.reply_as_id;
                        a.addClass("submitting");
                        var x = new FormData;
                        x.append("body", s), x.append("thread_id", l), x.append("hiding_creator", c), x.append("censor_images", d), a.find(".radio-check-option").is(":checked") ? (x.append("reply_as_type_id", g), x.append("reply_as_id", v)) : (x.append("reply_as_type", y), x.append("reply_as_id", b)), m.each(function() {
                            var e = t(this).find('input[type="text"]').val(),
                                n = t(this).find('input[type="file"]')[0].files[0];
                            x.append("captions", e), void 0 !== n && x.append("images", n)
                        }), t.ajax(o.api.post.newPost, {
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            processData: !1,
                            contentType: !1,
                            dataType: "json",
                            data: x,
                            method: "POST"
                        }).done(function(e) {
                            if (e.answer_type == "professional") {
                                alert('Trả lời thành công!');
                                location.reload();
                            } else {
                                if (t("#thread-detail").length) u(t("#post-reply-form"), e);
                                else {
                                    var n = a.closest("#post-reply-form").siblings("#list-comment");
                                    n.find("article").length ? (u(n.find("article").first(), e), n.find("article").first().find(".post-meta-data").before('<div class="image"></div>')) : (n.append("<article></article>"), u(n.find("article"), e), n.find("article").first().find(".post-meta-data").before('<div class="image"></div>'))
                                }
                                t("#thread-detail").length ? r.page("/hoi-bac-si/tra-loi/hoan-thanh/", "Trả lời Hỏi bác sĩ thành công") : r.page("/bai-viet/tra-loi/hoan-thanh/", "Trả lời bài viết thành công"), a.removeClass("submitting"), a.find('[name="body"]').val(""), a.find('input[type="checkbox"]').removeAttr("checked"), a.find(".form-upload").each(function() {
                                    t(this).find('input[type="text"]').val("")
                                }), a.find('.form-upload input[type="file"]').val(""), a.find(".form-upload .remove").remove(), a.find(".form-upload").hasClass("show") && a.find(".form-upload").removeClass("show").addClass("hide"), t("#thread-detail .alert-assign").length && t("#thread-detail .alert-assign").remove()
                            }
                        }).fail(function(e) {
                            a.removeClass("submitting"), i.openAlert(t('<h2>Gửi trả lời chưa thành công, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), t("#thread-detail").length ? r.page("/hoi-bac-si/tra-loi/loi", "Trả lời Hỏi bác sĩ gặp lỗi " + e.responseText) : r.page("/bai-viet/tra-loi/loi", "Trả lời bài viết gặp lỗi " + e.responseText)
                        }), e.preventDefault()
                    }).on("focus", "input, textarea, button", function() {
                        t("body").hasClass("not-logged-in") && l.openSignupOverlay(void 0, o.api.account.signup + "?source=forum&next=" + window.location.href)
                    })
                },
                b = function() {
                    var e = t("#thread-detail form.post-new"),
                        n = e.find(".form-upload");
                    n.each(function() {
                        var e = t(this).find('input[type="file"]');
                        t(this).on("change", 'input[type="file"]', function(n) {
                            var i = e[0].files,
                                o = URL.createObjectURL(n.target.files[0]),
                                r = i[0].type.replace("image/", "");
                            t(this).siblings(".form-upload-name-file").find("img").attr("src", o), t(this).siblings(".form-upload-name-file").find(".body").html("Tên ảnh: " + i[0].name + "<br/>Cỡ ảnh: " + (i[0].size / 1e6).toFixed(2) + "Mb<br/>Định dạng ảnh: " + r), n.preventDefault()
                        })
                    })
                },
                x = function() {
                    var e = t("#thread-detail form.post-new"),
                        n = e.find(".form-upload");
                    n.each(function() {
                        t(this).on("change", 'input[type="file"]', function(e) {
                            "" !== t(this).val() ? t(this).parents(".form-upload").removeClass("hide").addClass("show") : t(this).parents(".form-upload").removeClass("show").addClass("hide"), e.preventDefault()
                        }), t(this).on("click", ".remove", function(e) {
                            t(this).parent(".form-upload").removeClass("show").addClass("hide"), e.preventDefault()
                        })
                    })
                },
                w = function() {
                    var e = t("#post-reply-form .form-upload");
                    e.each(function() {
                        t(this).on("change", 'input[type="file"]', function() {
                            t(this).parent(".form-upload-file").siblings(".remove").length || t(this).parent(".form-upload-file").siblings('input[type="text"]').after('<span class="remove"><i class="fa fa-times" aria-hidden="true"></i></span>'), t(this).val() || (t(this).parent(".form-upload-file").siblings(".remove").length && t(this).parent(".form-upload-file").siblings(".remove").remove(), t(this).parents(".form-upload").find('input[type="text"]').val(""), t(this).parents(".form-upload").find(".form-upload-name-file img").attr("src", ""), t(this).parents(".form-upload").find(".form-upload-name-file .body").html("")), t(this).parents(".form-upload").on("click", ".remove", function(e) {
                                t(this).siblings(".form-upload-file").find('input[type="file"]').val(""), t(this).parents(".form-upload").find(".form-upload-name-file img").attr("src", ""), t(this).parents(".form-upload").find(".form-upload-name-file .body").html(""), t(this).remove(), e.preventDefault()
                            })
                        })
                    })
                },
                k = function() {
                    var e = t("#post-reply-form .form-upload"),
                        n = t("#post-reply-form .add-form-upload");
                    n.on("click", function(i) {
                        var o = e.first().clone(!0, !0);
                        o.find('input[type="text"]').val(""), o.find(".form-upload-name-file img").attr("src", ""), o.find(".form-upload-name-file .body").html(""), o.hasClass("show") && o.removeClass("show").addClass("hide"), o.find(".remove").length && o.find(".remove").remove(), n.before(o), 5 == t(this).siblings(".form-upload").size() && n.remove(), b(), w(), x(), i.preventDefault()
                    })
                },
                _ = function() {
                    t("#page-title").find(".input-auto-complete").each(function() {
                        var e = t(this),
                            i = t("#thread-detail .question").data("id");
                        e.suggestion({
                            lookup: m(function(e, i) {
                                t.ajax(o.api.post.createdByAutocomplete, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    data: {
                                        q: e
                                    },
                                    method: "GET"
                                }).done(function(n) {
                                    if (-1 != n.indexOf("-")) var o = t.makeArray(t(n)).map(function(e) {
                                        var n = t(e.outerHTML).text();
                                        return {
                                            name: n
                                        }
                                    });
                                    else var o = t.makeArray(t(n)).map(function(e) {
                                        var n = t(e.outerHTML).text();
                                        return {
                                            name: n
                                        }
                                    });
                                    i(f(o, e))
                                })
                            }, 400),
                            onSelect: function(r, a) {
                                var s = a.items[0];
                                e.parent(".has-suggestion").after('<div class="result-autocomplete" data-reply-as-type-id="' + s.reply_as_type_id + '" data-reply-as-id="' + s.reply_as_id + '"><i class="fa fa-times"></i>' + s.name + "</div>"), e.hide(), t.ajax(o.api.post.postAssignment, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    data: JSON.stringify({
                                        action: "new",
                                        post_id: i,
                                        assigned_to: s.name
                                    }),
                                    method: "POST"
                                }), r.preventDefault()
                            }
                        })
                    })
                };
            return {
                init: function() {
                    y(), p(), d(), h(), c.resize(), g(), v(), w(), k(), x(), _(), b()
                }
            }
        }), define("components/forum-edit-form", ["require", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "underscore", "components/util", "components/login-overlay", "components/auto-resize-textarea"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/overlay"),
                o = e("components/config"),
                r = e("components/track"),
                a = e("underscore"),
                s = e("components/util"),
                l = (e("components/login-overlay"), e("components/auto-resize-textarea")),
                c = function(e, n) {
                    var i = t("#thread-edit-template").html();
                    e.before(a.template(i)(n.post_data))
                },
                u = function(e, n) {
                    var i = t("#post-edit-time-template").html();
                    e.html(a.template(i)(n))
                },
                d = function(e, n) {
                    var i = t("#post-edit-image-template").html();
                    e.html(a.template(i)(n))
                },
                p = function() {
                    t("#thread-detail, #detail-cms").each(function() {
                        t(this).on("click", ".edit", function(e) {
                            var i = t(this).attr("data-id"),
                                a = o.api.post.getPost.replace("{post_id}", i),
                                s = t(this);
                            t.ajax(a, {
                                contentType: "application/json; charset=utf-8",
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                method: "GET"
                            }).done(function(e) {
                                e.post_data.countImage = s.siblings(".inner-boby").find(".media li").length || 0, c(s, e), l.resize(), m(s.siblings("form.edit-post")), t("#thread-detail").length ? r.page("/hoi-bac-si/chinh-sua/" + i + "/", "Chỉnh sửa bài viết") : r.page("/bai-viet/chinh-sua/" + i + "/", "Chỉnh sửa bài viết")
                            }), t(this).parents(".body").addClass("editing"), console.log("clicked"), e.preventDefault()
                        }), t(this).on("submit", ".edit-post", function(e) {
                            {
                                var a = t("#thread-detail, #detail-cms").find("form.edit-post"),
                                    l = t(this).attr("data-id"),
                                    c = o.api.post.updatePost.replace("{post_id}", l),
                                    p = t(this).find(".edit-post-area").val(),
                                    h = t(this).find('[name="update_hiding_creator"]').is(":checked"),
                                    f = t(this),
                                    m = new FormData;
                                a.find(".form-upload").each(function() {
                                    var e = t(this).find('input[type="text"]').val(),
                                        n = t(this).find('input[type="file"]')[0].files[0];
                                    m.append("captions", e), void 0 !== n && m.append("images", n)
                                })
                            }
                            f.addClass("submitting"), m.append("body", p), m.append("hiding_creator", h), t.ajax(c, {
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                processData: !1,
                                contentType: !1,
                                dataType: "json",
                                data: m,
                                method: "PUT"
                            }).done(function(e) {
                                f.parents(".body").find(".inner-boby").find(".post-body-content").html(e.body), e.modified_at = s.datetimeObjectToUiFullDateTime(new Date(e.modified_at)), u(f.parents(".body").find(".meta"), e), t("#thread-detail").length && d(f.parents(".body").find(".media"), e), f.parents(".answer").find(".user").html(e.hiding_creator ? "Giấu tên" : e.created_by.name), f.parents(".body").removeClass("editing"), f.remove(), f.removeClass("submitting"), t("#thread-detail").length ? r.page("/hoi-bac-si/chinh-sua/" + l + "/hoan-thanh/", "Chỉnh sửa bài viết hoàn thành") : r.page("/bai-viet/chinh-sua/" + l + "/hoan-thanh/", "Chỉnh sửa bài viết hoàn thành")
                            }).fail(function(e) {
                                i.openAlert(t('<h2>Gửi trả lời chưa thành công, xin vui lòng thử lại.</h2><p>Nếu bạn vẫn gặp vấn đề, xin liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a>) để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), f.removeClass("submitting")
                            }), e.preventDefault()
                        }), t(this).on("click", ".cancel-edit", function(e) {
                            e.preventDefault(), t(this).parents(".body").removeClass("editing"), t(this).parents(".edit-post").remove()
                        })
                    })
                },
                h = function() {
                    t("#thread-detail").on("click", ".remove-image", function(e) {
                        var a = t(this);
                        i.openConfirm("Bạn có chắc chắn muốn xoá bỏ ảnh này?", function(e) {
                            if (e) {
                                var s = a.siblings(".image").data("id"),
                                    l = o.api.post.deleteImage.replace("{post_image_id}", s);
                                a.parent("li").remove(), t.ajax(l, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    method: "DELETE"
                                }).done(function() {
                                    r.page("/hoi-bac-si/" + s, "Xoá ảnh thành công"), i.openAlert(t("<p>Xoá ảnh thành công.</p>"))
                                }).fail(function(e) {
                                    i.openAlert(t('<p>Xoá ảnh không thành công. Xin vui lòng thử lại.</p><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a> để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>"))
                                })
                            }
                        }), e.preventDefault()
                    })
                },
                f = function() {
                    t("#thread-detail").on("click", ".edit-caption", function(e) {
                        t(this).parent(".caption-image").addClass("editing-caption-image"), e.preventDefault()
                    }).on("keydown", 'input[type="text"]', function(e) {
                        var n = t(this),
                            i = n.val();
                        27 == e.keyCode && (t(this).val(i), n.parent(".caption-image").removeClass("editing-caption-image"))
                    }).on("click", ".complete-edit-caption", function(e) {
                        var a = t(this),
                            s = t(this).parent(".caption-image").siblings(".image").data("id"),
                            l = o.api.post.updateCaption.replace("{post_image_id}", s),
                            c = a.siblings('input[type="text"]').val();
                        t.ajax(l, {
                            contentType: "application/json; charset=utf-8",
                            headers: {
                                "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                            },
                            data: JSON.stringify({
                                caption: c
                            }),
                            method: "PUT"
                        }).done(function() {
                            r.page("/hoi-bac-si/" + s, "sửa caption thành công"), a.siblings(".caption-content").text(c), a.parent(".caption-image").removeClass("editing-caption-image")
                        }).fail(function(e) {
                            i.openAlert(t('<p>Thay đổi ảnh không thành công. Xin vui lòng thử lại.</p><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a> để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>"))
                        }), c || a.parent(".caption-image").removeClass("editing-caption-image"), e.preventDefault()
                    }).on("click", ".cancel-edit-caption", function(e) {
                        var n = t(this),
                            i = n.siblings('input[type="text"]').val();
                        n.siblings(".caption-content").text(i), n.parent(".caption-image").removeClass("editing-caption-image"), e.preventDefault()
                    })
                },
                m = function(e) {
                    e.on("click", ".add-more-image", function(e) {
                        var n = '<div class="form-upload hide"><input type="file" accept=".png, .jpg, .jpeg"><label>Tiêu đề ảnh<input type="text"></label></div>',
                            i = t(this).parent().siblings(".inner-boby").find(".media li").length,
                            o = t(this).siblings(".add-images").find(".form-upload").length;
                        t(this).siblings(".add-images").append(n), i + (o + 1) >= 5 && t(this).remove(), e.preventDefault()
                    }), e.each(function() {
                        t(this).on("change", '.form-upload input[type="file"]', function(e) {
                            "" !== t(this).val() ? t(this).parent(".form-upload").removeClass("hide").addClass("show") : t(this).parent(".form-upload").removeClass("show").addClass("hide"), t(this).siblings(".remove").length || t(this).siblings("label").after('<i class="fa fa-times-circle remove" aria-hidden="true"></i>'), t(this).val() || (t(this).siblings(".remove").length && t(this).siblings(".remove").remove(), t(this).parent(".form-upload").find('input[type="text"]').val("")), t(this).parent().on("click", ".remove", function(e) {
                                t(this).siblings('input[type="file"]').val(""), t(this).parent(".form-upload").removeClass("show").addClass("hide"), t(this).remove(), e.preventDefault()
                            }), e.preventDefault()
                        })
                    })
                };
            return {
                init: function() {
                    p(), h(), f()
                }
            }
        }), define("components/forum-assignment", ["require", "jquery", "js-cookie", "components/overlay", "components/config", "components/track", "underscore"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/overlay"),
                o = e("components/config"),
                r = (e("components/track"), e("underscore"), function() {
                    t("#need-answered .question").on("click", ".decline-answer", function(e) {
                        var r = t(this);
                        i.openConfirm("Bạn có muốn từ chối trả lời?", function(e) {
                            if (e) {
                                var i = r.closest(".question").data("id"),
                                    a = r.closest("#my-threads").find(".active"),
                                    s = a.text(),
                                    l = s.substring(s.indexOf("(") + 1, s.indexOf(")")),
                                    c = (Number(l) - 1).toString(),
                                    u = s.replace(l, c);
                                t.ajax(o.api.post.postAssignment, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    data: JSON.stringify({
                                        action: "reject",
                                        post_id: i
                                    }),
                                    method: "POST"
                                }).done(function() {
                                    r.closest("article").remove(), a.text(u)
                                })
                            }
                        }), e.preventDefault()
                    }), t("#thread-detail").on("click", ".decline-answer", function(e) {
                        var r = t(this);
                        i.openConfirm("Bạn có muốn từ chối trả lời ?", function(e) {
                            if (e) {
                                var i = r.closest("article").find(".question").data("id");
                                t.ajax(o.api.post.postAssignment, {
                                    contentType: "application/json; charset=utf-8",
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    data: JSON.stringify({
                                        action: "reject",
                                        post_id: i
                                    }),
                                    method: "POST"
                                }).done(function() {
                                    r.closest(".alert-assign").remove()
                                })
                            }
                        }), e.preventDefault()
                    })
                }),
                a = function() {
                    var e = t("#thread-detail");
                    e.find(".box-answer").length && e.find(".box-answer").on("click", ".agree-answer", function(n) {
                        var i = e.find("#post-reply-form"),
                            o = i.offset().top;
                        t("html, body").animate({
                            scrollTop: o - 100 + "px"
                        }, 500), t(i).find(".form-control.resize-textarea").focus(), n.preventDefault()
                    })
                };
            return {
                init: function() {
                    r(), a()
                }
            }
        }), define("components/geolocation", ["require", "js-cookie", "components/overlay", "components/util", "components/track"], function(e) {
            "use strict";
            var t = e("js-cookie"),
                n = e("components/overlay"),
                i = e("components/util"),
                o = e("components/track"),
                r = function() {
                    t.remove("user_location"), n.openAlert($("<p>Bạn chưa cho phép trang web được lấy tọa độ hiện tại của bạn qua trình duyệt. Để sử dụng chức năng này, hãy thay đổi tùy chọn trên trình duyệt để cho phép trang web lấy tọa độ của bạn và thử lại.</p>"))
                },
                a = function(e, t) {
                    $(".distance-to-user span").each(function() {
                        var n = i.getDistanceFromLatLonInKm($(this).attr("data-lat"), $(this).attr("data-lon"), e, t);
                        $(this).html(n).parent().addClass("has-distance")
                    })
                },
                s = function() {
                    $(".update-location").on("click", function(e, n) {
                        var s = $(this).addClass("loading");
                        n ? o.event("Geolocation", "Sort by location") : o.event("Geolocation", "Manually update current location"), navigator.geolocation.getCurrentPosition(function(e) {
                            var r = e.coords.latitude,
                                l = e.coords.longitude;
                            if (t("user_location", {
                                    lat: r,
                                    lon: l
                                }, {
                                    secure: !0
                                }), n) {
                                var c = window.location.href;
                                c.indexOf("sort_by=location") > -1 ? window.location.reload() : window.location.href = i.addParamToUrl(c, "sort_by", "location"), n.removeClass("loading")
                            } else a(r, l);
                            s.removeClass("loading"), o.event("Geolocation", "Allow web site to get user location")
                        }, function(e) {
                            s.removeClass("loading"), r(e), o.event("Geolocation", "Not allow web site to get user location")
                        }), e.preventDefault()
                    })
                },
                l = function() {
                    $(".sort-by-location").on("click", function(e) {
                        e.preventDefault(), $(this).addClass("loading"), $(this).hasClass("active") ? window.location.href = window.location.href.replace("?sort_by=location", "").replace("&sort_by=location", "") : $(".update-location").first().trigger("click", $(this))
                    })
                };
            return {
                init: function() {
                    $(document).ready(function() {
                        s(), l(), void 0 === t.get("user_location") && window.location.href.indexOf("sort_by=location") > -1 && $(".update-location").first().trigger("click", !0)
                    })
                }
            }
        }), ! function(e, t) {
            "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", t) : "object" == typeof module && module.exports ? module.exports = t() : e.EvEmitter = t()
        }("undefined" != typeof window ? window : this, function() {
            function e() {}
            var t = e.prototype;
            return t.on = function(e, t) {
                if (e && t) {
                    var n = this._events = this._events || {},
                        i = n[e] = n[e] || [];
                    return -1 == i.indexOf(t) && i.push(t), this
                }
            }, t.once = function(e, t) {
                if (e && t) {
                    this.on(e, t);
                    var n = this._onceEvents = this._onceEvents || {},
                        i = n[e] = n[e] || {};
                    return i[t] = !0, this
                }
            }, t.off = function(e, t) {
                var n = this._events && this._events[e];
                if (n && n.length) {
                    var i = n.indexOf(t);
                    return -1 != i && n.splice(i, 1), this
                }
            }, t.emitEvent = function(e, t) {
                var n = this._events && this._events[e];
                if (n && n.length) {
                    var i = 0,
                        o = n[i];
                    t = t || [];
                    for (var r = this._onceEvents && this._onceEvents[e]; o;) {
                        var a = r && r[o];
                        a && (this.off(e, o), delete r[o]), o.apply(this, t), i += a ? 0 : 1, o = n[i]
                    }
                    return this
                }
            }, e
        }),
        function(e, t) {
            "use strict";
            "function" == typeof define && define.amd ? define("imagesLoaded", ["ev-emitter/ev-emitter"], function(n) {
                return t(e, n)
            }) : "object" == typeof module && module.exports ? module.exports = t(e, require("ev-emitter")) : e.imagesLoaded = t(e, e.EvEmitter)
        }(window, function(e, t) {
            function n(e, t) {
                for (var n in t) e[n] = t[n];
                return e
            }

            function i(e) {
                var t = [];
                if (Array.isArray(e)) t = e;
                else if ("number" == typeof e.length)
                    for (var n = 0; n < e.length; n++) t.push(e[n]);
                else t.push(e);
                return t
            }

            function o(e, t, r) {
                return this instanceof o ? ("string" == typeof e && (e = document.querySelectorAll(e)), this.elements = i(e), this.options = n({}, this.options), "function" == typeof t ? r = t : n(this.options, t), r && this.on("always", r), this.getImages(), s && (this.jqDeferred = new s.Deferred), void setTimeout(function() {
                    this.check()
                }.bind(this))) : new o(e, t, r)
            }

            function r(e) {
                this.img = e
            }

            function a(e, t) {
                this.url = e, this.element = t, this.img = new Image
            }
            var s = e.jQuery,
                l = e.console;
            o.prototype = Object.create(t.prototype), o.prototype.options = {}, o.prototype.getImages = function() {
                this.images = [], this.elements.forEach(this.addElementImages, this)
            }, o.prototype.addElementImages = function(e) {
                "IMG" == e.nodeName && this.addImage(e), this.options.background === !0 && this.addElementBackgroundImages(e);
                var t = e.nodeType;
                if (t && c[t]) {
                    for (var n = e.querySelectorAll("img"), i = 0; i < n.length; i++) {
                        var o = n[i];
                        this.addImage(o)
                    }
                    if ("string" == typeof this.options.background) {
                        var r = e.querySelectorAll(this.options.background);
                        for (i = 0; i < r.length; i++) {
                            var a = r[i];
                            this.addElementBackgroundImages(a)
                        }
                    }
                }
            };
            var c = {
                1: !0,
                9: !0,
                11: !0
            };
            return o.prototype.addElementBackgroundImages = function(e) {
                var t = getComputedStyle(e);
                if (t)
                    for (var n = /url\((['"])?(.*?)\1\)/gi, i = n.exec(t.backgroundImage); null !== i;) {
                        var o = i && i[2];
                        o && this.addBackground(o, e), i = n.exec(t.backgroundImage)
                    }
            }, o.prototype.addImage = function(e) {
                var t = new r(e);
                this.images.push(t)
            }, o.prototype.addBackground = function(e, t) {
                var n = new a(e, t);
                this.images.push(n)
            }, o.prototype.check = function() {
                function e(e, n, i) {
                    setTimeout(function() {
                        t.progress(e, n, i)
                    })
                }
                var t = this;
                return this.progressedCount = 0, this.hasAnyBroken = !1, this.images.length ? void this.images.forEach(function(t) {
                    t.once("progress", e), t.check()
                }) : void this.complete()
            }, o.prototype.progress = function(e, t, n) {
                this.progressedCount++, this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded, this.emitEvent("progress", [this, e, t]), this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, e), this.progressedCount == this.images.length && this.complete(), this.options.debug && l && l.log("progress: " + n, e, t)
            }, o.prototype.complete = function() {
                var e = this.hasAnyBroken ? "fail" : "done";
                if (this.isComplete = !0, this.emitEvent(e, [this]), this.emitEvent("always", [this]), this.jqDeferred) {
                    var t = this.hasAnyBroken ? "reject" : "resolve";
                    this.jqDeferred[t](this)
                }
            }, r.prototype = Object.create(t.prototype), r.prototype.check = function() {
                var e = this.getIsImageComplete();
                return e ? void this.confirm(0 !== this.img.naturalWidth, "naturalWidth") : (this.proxyImage = new Image, this.proxyImage.addEventListener("load", this), this.proxyImage.addEventListener("error", this), this.img.addEventListener("load", this), this.img.addEventListener("error", this), void(this.proxyImage.src = this.img.src))
            }, r.prototype.getIsImageComplete = function() {
                return this.img.complete && void 0 !== this.img.naturalWidth
            }, r.prototype.confirm = function(e, t) {
                this.isLoaded = e, this.emitEvent("progress", [this, this.img, t])
            }, r.prototype.handleEvent = function(e) {
                var t = "on" + e.type;
                this[t] && this[t](e)
            }, r.prototype.onload = function() {
                this.confirm(!0, "onload"), this.unbindEvents()
            }, r.prototype.onerror = function() {
                this.confirm(!1, "onerror"), this.unbindEvents()
            }, r.prototype.unbindEvents = function() {
                this.proxyImage.removeEventListener("load", this), this.proxyImage.removeEventListener("error", this), this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
            }, a.prototype = Object.create(r.prototype), a.prototype.check = function() {
                this.img.addEventListener("load", this), this.img.addEventListener("error", this), this.img.src = this.url;
                var e = this.getIsImageComplete();
                e && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents())
            }, a.prototype.unbindEvents = function() {
                this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
            }, a.prototype.confirm = function(e, t) {
                this.isLoaded = e, this.emitEvent("progress", [this, this.element, t])
            }, o.makeJQueryPlugin = function(t) {
                t = t || e.jQuery, t && (s = t, s.fn.imagesLoaded = function(e, t) {
                    var n = new o(this, e, t);
                    return n.jqDeferred.promise(s(this))
                })
            }, o.makeJQueryPlugin(), o
        }), ! function(e, t) {
            "function" == typeof define && define.amd ? define("jquery-bridget/jquery-bridget", ["jquery"], function(n) {
                return t(e, n)
            }) : "object" == typeof module && module.exports ? module.exports = t(e, require("jquery")) : e.jQueryBridget = t(e, e.jQuery)
        }(window, function(e, t) {
            "use strict";

            function n(n, r, s) {
                function l(e, t, i) {
                    var o, r = "$()." + n + '("' + t + '")';
                    return e.each(function(e, l) {
                        var c = s.data(l, n);
                        if (!c) return void a(n + " not initialized. Cannot call methods, i.e. " + r);
                        var u = c[t];
                        if (!u || "_" == t.charAt(0)) return void a(r + " is not a valid method");
                        var d = u.apply(c, i);
                        o = void 0 === o ? d : o
                    }), void 0 !== o ? o : e
                }

                function c(e, t) {
                    e.each(function(e, i) {
                        var o = s.data(i, n);
                        o ? (o.option(t), o._init()) : (o = new r(i, t), s.data(i, n, o))
                    })
                }
                s = s || t || e.jQuery, s && (r.prototype.option || (r.prototype.option = function(e) {
                    s.isPlainObject(e) && (this.options = s.extend(!0, this.options, e))
                }), s.fn[n] = function(e) {
                    if ("string" == typeof e) {
                        var t = o.call(arguments, 1);
                        return l(this, e, t)
                    }
                    return c(this, e), this
                }, i(s))
            }

            function i(e) {
                !e || e && e.bridget || (e.bridget = n)
            }
            var o = Array.prototype.slice,
                r = e.console,
                a = "undefined" == typeof r ? function() {} : function(e) {
                    r.error(e)
                };
            return i(t || e.jQuery), n
        }),
        function(e, t) {
            "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", t) : "object" == typeof module && module.exports ? module.exports = t() : e.EvEmitter = t()
        }("undefined" != typeof window ? window : this, function() {
            function e() {}
            var t = e.prototype;
            return t.on = function(e, t) {
                if (e && t) {
                    var n = this._events = this._events || {},
                        i = n[e] = n[e] || [];
                    return -1 == i.indexOf(t) && i.push(t), this
                }
            }, t.once = function(e, t) {
                if (e && t) {
                    this.on(e, t);
                    var n = this._onceEvents = this._onceEvents || {},
                        i = n[e] = n[e] || {};
                    return i[t] = !0, this
                }
            }, t.off = function(e, t) {
                var n = this._events && this._events[e];
                if (n && n.length) {
                    var i = n.indexOf(t);
                    return -1 != i && n.splice(i, 1), this
                }
            }, t.emitEvent = function(e, t) {
                var n = this._events && this._events[e];
                if (n && n.length) {
                    var i = 0,
                        o = n[i];
                    t = t || [];
                    for (var r = this._onceEvents && this._onceEvents[e]; o;) {
                        var a = r && r[o];
                        a && (this.off(e, o), delete r[o]), o.apply(this, t), i += a ? 0 : 1, o = n[i]
                    }
                    return this
                }
            }, e
        }),
        function(e, t) {
            "use strict";
            "function" == typeof define && define.amd ? define("get-size/get-size", [], function() {
                return t()
            }) : "object" == typeof module && module.exports ? module.exports = t() : e.getSize = t()
        }(window, function() {
            "use strict";

            function e(e) {
                var t = parseFloat(e),
                    n = -1 == e.indexOf("%") && !isNaN(t);
                return n && t
            }

            function t() {}

            function n() {
                for (var e = {
                        width: 0,
                        height: 0,
                        innerWidth: 0,
                        innerHeight: 0,
                        outerWidth: 0,
                        outerHeight: 0
                    }, t = 0; c > t; t++) {
                    var n = l[t];
                    e[n] = 0
                }
                return e
            }

            function i(e) {
                var t = getComputedStyle(e);
                return t || s("Style returned " + t + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), t
            }

            function o() {
                if (!u) {
                    u = !0;
                    var t = document.createElement("div");
                    t.style.width = "200px", t.style.padding = "1px 2px 3px 4px", t.style.borderStyle = "solid", t.style.borderWidth = "1px 2px 3px 4px", t.style.boxSizing = "border-box";
                    var n = document.body || document.documentElement;
                    n.appendChild(t);
                    var o = i(t);
                    r.isBoxSizeOuter = a = 200 == e(o.width), n.removeChild(t)
                }
            }

            function r(t) {
                if (o(), "string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType) {
                    var r = i(t);
                    if ("none" == r.display) return n();
                    var s = {};
                    s.width = t.offsetWidth, s.height = t.offsetHeight;
                    for (var u = s.isBorderBox = "border-box" == r.boxSizing, d = 0; c > d; d++) {
                        var p = l[d],
                            h = r[p],
                            f = parseFloat(h);
                        s[p] = isNaN(f) ? 0 : f
                    }
                    var m = s.paddingLeft + s.paddingRight,
                        g = s.paddingTop + s.paddingBottom,
                        v = s.marginLeft + s.marginRight,
                        y = s.marginTop + s.marginBottom,
                        b = s.borderLeftWidth + s.borderRightWidth,
                        x = s.borderTopWidth + s.borderBottomWidth,
                        w = u && a,
                        k = e(r.width);
                    k !== !1 && (s.width = k + (w ? 0 : m + b));
                    var _ = e(r.height);
                    return _ !== !1 && (s.height = _ + (w ? 0 : g + x)), s.innerWidth = s.width - (m + b), s.innerHeight = s.height - (g + x), s.outerWidth = s.width + v, s.outerHeight = s.height + y, s
                }
            }
            var a, s = "undefined" == typeof console ? t : function(e) {
                    console.error(e)
                },
                l = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"],
                c = l.length,
                u = !1;
            return r
        }),
        function(e, t) {
            "use strict";
            "function" == typeof define && define.amd ? define("desandro-matches-selector/matches-selector", t) : "object" == typeof module && module.exports ? module.exports = t() : e.matchesSelector = t()
        }(window, function() {
            "use strict";
            var e = function() {
                var e = Element.prototype;
                if (e.matches) return "matches";
                if (e.matchesSelector) return "matchesSelector";
                for (var t = ["webkit", "moz", "ms", "o"], n = 0; n < t.length; n++) {
                    var i = t[n],
                        o = i + "MatchesSelector";
                    if (e[o]) return o
                }
            }();
            return function(t, n) {
                return t[e](n)
            }
        }),
        function(e, t) {
            "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["desandro-matches-selector/matches-selector"], function(n) {
                return t(e, n)
            }) : "object" == typeof module && module.exports ? module.exports = t(e, require("desandro-matches-selector")) : e.fizzyUIUtils = t(e, e.matchesSelector)
        }(window, function(e, t) {
            var n = {};
            n.extend = function(e, t) {
                for (var n in t) e[n] = t[n];
                return e
            }, n.modulo = function(e, t) {
                return (e % t + t) % t
            }, n.makeArray = function(e) {
                var t = [];
                if (Array.isArray(e)) t = e;
                else if (e && "number" == typeof e.length)
                    for (var n = 0; n < e.length; n++) t.push(e[n]);
                else t.push(e);
                return t
            }, n.removeFrom = function(e, t) {
                var n = e.indexOf(t); - 1 != n && e.splice(n, 1)
            }, n.getParent = function(e, n) {
                for (; e != document.body;)
                    if (e = e.parentNode, t(e, n)) return e
            }, n.getQueryElement = function(e) {
                return "string" == typeof e ? document.querySelector(e) : e
            }, n.handleEvent = function(e) {
                var t = "on" + e.type;
                this[t] && this[t](e)
            }, n.filterFindElements = function(e, i) {
                e = n.makeArray(e);
                var o = [];
                return e.forEach(function(e) {
                    if (e instanceof HTMLElement) {
                        if (!i) return void o.push(e);
                        t(e, i) && o.push(e);
                        for (var n = e.querySelectorAll(i), r = 0; r < n.length; r++) o.push(n[r])
                    }
                }), o
            }, n.debounceMethod = function(e, t, n) {
                var i = e.prototype[t],
                    o = t + "Timeout";
                e.prototype[t] = function() {
                    var e = this[o];
                    e && clearTimeout(e);
                    var t = arguments,
                        r = this;
                    this[o] = setTimeout(function() {
                        i.apply(r, t), delete r[o]
                    }, n || 100)
                }
            }, n.docReady = function(e) {
                var t = document.readyState;
                "complete" == t || "interactive" == t ? e() : document.addEventListener("DOMContentLoaded", e)
            }, n.toDashed = function(e) {
                return e.replace(/(.)([A-Z])/g, function(e, t, n) {
                    return t + "-" + n
                }).toLowerCase()
            };
            var i = e.console;
            return n.htmlInit = function(t, o) {
                n.docReady(function() {
                    var r = n.toDashed(o),
                        a = "data-" + r,
                        s = document.querySelectorAll("[" + a + "]"),
                        l = document.querySelectorAll(".js-" + r),
                        c = n.makeArray(s).concat(n.makeArray(l)),
                        u = a + "-options",
                        d = e.jQuery;
                    c.forEach(function(e) {
                        var n, r = e.getAttribute(a) || e.getAttribute(u);
                        try {
                            n = r && JSON.parse(r)
                        } catch (s) {
                            return void(i && i.error("Error parsing " + a + " on " + e.className + ": " + s))
                        }
                        var l = new t(e, n);
                        d && d.data(e, o, l)
                    })
                })
            }, n
        }),
        function(e, t) {
            "function" == typeof define && define.amd ? define("outlayer/item", ["ev-emitter/ev-emitter", "get-size/get-size"], t) : "object" == typeof module && module.exports ? module.exports = t(require("ev-emitter"), require("get-size")) : (e.Outlayer = {}, e.Outlayer.Item = t(e.EvEmitter, e.getSize))
        }(window, function(e, t) {
            "use strict";

            function n(e) {
                for (var t in e) return !1;
                return t = null, !0
            }

            function i(e, t) {
                e && (this.element = e, this.layout = t, this.position = {
                    x: 0,
                    y: 0
                }, this._create())
            }

            function o(e) {
                return e.replace(/([A-Z])/g, function(e) {
                    return "-" + e.toLowerCase()
                })
            }
            var r = document.documentElement.style,
                a = "string" == typeof r.transition ? "transition" : "WebkitTransition",
                s = "string" == typeof r.transform ? "transform" : "WebkitTransform",
                l = {
                    WebkitTransition: "webkitTransitionEnd",
                    transition: "transitionend"
                }[a],
                c = {
                    transform: s,
                    transition: a,
                    transitionDuration: a + "Duration",
                    transitionProperty: a + "Property",
                    transitionDelay: a + "Delay"
                },
                u = i.prototype = Object.create(e.prototype);
            u.constructor = i, u._create = function() {
                this._transn = {
                    ingProperties: {},
                    clean: {},
                    onEnd: {}
                }, this.css({
                    position: "absolute"
                })
            }, u.handleEvent = function(e) {
                var t = "on" + e.type;
                this[t] && this[t](e)
            }, u.getSize = function() {
                this.size = t(this.element)
            }, u.css = function(e) {
                var t = this.element.style;
                for (var n in e) {
                    var i = c[n] || n;
                    t[i] = e[n]
                }
            }, u.getPosition = function() {
                var e = getComputedStyle(this.element),
                    t = this.layout._getOption("originLeft"),
                    n = this.layout._getOption("originTop"),
                    i = e[t ? "left" : "right"],
                    o = e[n ? "top" : "bottom"],
                    r = this.layout.size,
                    a = -1 != i.indexOf("%") ? parseFloat(i) / 100 * r.width : parseInt(i, 10),
                    s = -1 != o.indexOf("%") ? parseFloat(o) / 100 * r.height : parseInt(o, 10);
                a = isNaN(a) ? 0 : a, s = isNaN(s) ? 0 : s, a -= t ? r.paddingLeft : r.paddingRight, s -= n ? r.paddingTop : r.paddingBottom, this.position.x = a, this.position.y = s
            }, u.layoutPosition = function() {
                var e = this.layout.size,
                    t = {},
                    n = this.layout._getOption("originLeft"),
                    i = this.layout._getOption("originTop"),
                    o = n ? "paddingLeft" : "paddingRight",
                    r = n ? "left" : "right",
                    a = n ? "right" : "left",
                    s = this.position.x + e[o];
                t[r] = this.getXValue(s), t[a] = "";
                var l = i ? "paddingTop" : "paddingBottom",
                    c = i ? "top" : "bottom",
                    u = i ? "bottom" : "top",
                    d = this.position.y + e[l];
                t[c] = this.getYValue(d), t[u] = "", this.css(t), this.emitEvent("layout", [this])
            }, u.getXValue = function(e) {
                var t = this.layout._getOption("horizontal");
                return this.layout.options.percentPosition && !t ? e / this.layout.size.width * 100 + "%" : e + "px"
            }, u.getYValue = function(e) {
                var t = this.layout._getOption("horizontal");
                return this.layout.options.percentPosition && t ? e / this.layout.size.height * 100 + "%" : e + "px"
            }, u._transitionTo = function(e, t) {
                this.getPosition();
                var n = this.position.x,
                    i = this.position.y,
                    o = parseInt(e, 10),
                    r = parseInt(t, 10),
                    a = o === this.position.x && r === this.position.y;
                if (this.setPosition(e, t), a && !this.isTransitioning) return void this.layoutPosition();
                var s = e - n,
                    l = t - i,
                    c = {};
                c.transform = this.getTranslate(s, l), this.transition({
                    to: c,
                    onTransitionEnd: {
                        transform: this.layoutPosition
                    },
                    isCleaning: !0
                })
            }, u.getTranslate = function(e, t) {
                var n = this.layout._getOption("originLeft"),
                    i = this.layout._getOption("originTop");
                return e = n ? e : -e, t = i ? t : -t, "translate3d(" + e + "px, " + t + "px, 0)"
            }, u.goTo = function(e, t) {
                this.setPosition(e, t), this.layoutPosition()
            }, u.moveTo = u._transitionTo, u.setPosition = function(e, t) {
                this.position.x = parseInt(e, 10), this.position.y = parseInt(t, 10)
            }, u._nonTransition = function(e) {
                this.css(e.to), e.isCleaning && this._removeStyles(e.to);
                for (var t in e.onTransitionEnd) e.onTransitionEnd[t].call(this)
            }, u.transition = function(e) {
                if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(e);
                var t = this._transn;
                for (var n in e.onTransitionEnd) t.onEnd[n] = e.onTransitionEnd[n];
                for (n in e.to) t.ingProperties[n] = !0, e.isCleaning && (t.clean[n] = !0);
                if (e.from) {
                    this.css(e.from);
                    var i = this.element.offsetHeight;
                    i = null
                }
                this.enableTransition(e.to), this.css(e.to), this.isTransitioning = !0
            };
            var d = "opacity," + o(s);
            u.enableTransition = function() {
                if (!this.isTransitioning) {
                    var e = this.layout.options.transitionDuration;
                    e = "number" == typeof e ? e + "ms" : e, this.css({
                        transitionProperty: d,
                        transitionDuration: e,
                        transitionDelay: this.staggerDelay || 0
                    }), this.element.addEventListener(l, this, !1)
                }
            }, u.onwebkitTransitionEnd = function(e) {
                this.ontransitionend(e)
            }, u.onotransitionend = function(e) {
                this.ontransitionend(e)
            };
            var p = {
                "-webkit-transform": "transform"
            };
            u.ontransitionend = function(e) {
                if (e.target === this.element) {
                    var t = this._transn,
                        i = p[e.propertyName] || e.propertyName;
                    if (delete t.ingProperties[i], n(t.ingProperties) && this.disableTransition(), i in t.clean && (this.element.style[e.propertyName] = "", delete t.clean[i]), i in t.onEnd) {
                        var o = t.onEnd[i];
                        o.call(this), delete t.onEnd[i]
                    }
                    this.emitEvent("transitionEnd", [this])
                }
            }, u.disableTransition = function() {
                this.removeTransitionStyles(), this.element.removeEventListener(l, this, !1), this.isTransitioning = !1
            }, u._removeStyles = function(e) {
                var t = {};
                for (var n in e) t[n] = "";
                this.css(t)
            };
            var h = {
                transitionProperty: "",
                transitionDuration: "",
                transitionDelay: ""
            };
            return u.removeTransitionStyles = function() {
                this.css(h)
            }, u.stagger = function(e) {
                e = isNaN(e) ? 0 : e, this.staggerDelay = e + "ms"
            }, u.removeElem = function() {
                this.element.parentNode.removeChild(this.element), this.css({
                    display: ""
                }), this.emitEvent("remove", [this])
            }, u.remove = function() {
                return a && parseFloat(this.layout.options.transitionDuration) ? (this.once("transitionEnd", function() {
                    this.removeElem()
                }), void this.hide()) : void this.removeElem()
            }, u.reveal = function() {
                delete this.isHidden, this.css({
                    display: ""
                });
                var e = this.layout.options,
                    t = {},
                    n = this.getHideRevealTransitionEndProperty("visibleStyle");
                t[n] = this.onRevealTransitionEnd, this.transition({
                    from: e.hiddenStyle,
                    to: e.visibleStyle,
                    isCleaning: !0,
                    onTransitionEnd: t
                })
            }, u.onRevealTransitionEnd = function() {
                this.isHidden || this.emitEvent("reveal")
            }, u.getHideRevealTransitionEndProperty = function(e) {
                var t = this.layout.options[e];
                if (t.opacity) return "opacity";
                for (var n in t) return n
            }, u.hide = function() {
                this.isHidden = !0, this.css({
                    display: ""
                });
                var e = this.layout.options,
                    t = {},
                    n = this.getHideRevealTransitionEndProperty("hiddenStyle");
                t[n] = this.onHideTransitionEnd, this.transition({
                    from: e.visibleStyle,
                    to: e.hiddenStyle,
                    isCleaning: !0,
                    onTransitionEnd: t
                })
            }, u.onHideTransitionEnd = function() {
                this.isHidden && (this.css({
                    display: "none"
                }), this.emitEvent("hide"))
            }, u.destroy = function() {
                this.css({
                    position: "",
                    left: "",
                    right: "",
                    top: "",
                    bottom: "",
                    transition: "",
                    transform: ""
                })
            }, i
        }),
        function(e, t) {
            "use strict";
            "function" == typeof define && define.amd ? define("outlayer/outlayer", ["ev-emitter/ev-emitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(n, i, o, r) {
                return t(e, n, i, o, r)
            }) : "object" == typeof module && module.exports ? module.exports = t(e, require("ev-emitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : e.Outlayer = t(e, e.EvEmitter, e.getSize, e.fizzyUIUtils, e.Outlayer.Item)
        }(window, function(e, t, n, i, o) {
            "use strict";

            function r(e, t) {
                var n = i.getQueryElement(e);
                if (!n) return void(l && l.error("Bad element for " + this.constructor.namespace + ": " + (n || e)));
                this.element = n, c && (this.$element = c(this.element)), this.options = i.extend({}, this.constructor.defaults), this.option(t);
                var o = ++d;
                this.element.outlayerGUID = o, p[o] = this, this._create();
                var r = this._getOption("initLayout");
                r && this.layout()
            }

            function a(e) {
                function t() {
                    e.apply(this, arguments)
                }
                return t.prototype = Object.create(e.prototype), t.prototype.constructor = t, t
            }

            function s(e) {
                if ("number" == typeof e) return e;
                var t = e.match(/(^\d*\.?\d*)(\w*)/),
                    n = t && t[1],
                    i = t && t[2];
                if (!n.length) return 0;
                n = parseFloat(n);
                var o = f[i] || 1;
                return n * o
            }
            var l = e.console,
                c = e.jQuery,
                u = function() {},
                d = 0,
                p = {};
            r.namespace = "outlayer", r.Item = o, r.defaults = {
                containerStyle: {
                    position: "relative"
                },
                initLayout: !0,
                originLeft: !0,
                originTop: !0,
                resize: !0,
                resizeContainer: !0,
                transitionDuration: "0.4s",
                hiddenStyle: {
                    opacity: 0,
                    transform: "scale(0.001)"
                },
                visibleStyle: {
                    opacity: 1,
                    transform: "scale(1)"
                }
            };
            var h = r.prototype;
            i.extend(h, t.prototype), h.option = function(e) {
                i.extend(this.options, e)
            }, h._getOption = function(e) {
                var t = this.constructor.compatOptions[e];
                return t && void 0 !== this.options[t] ? this.options[t] : this.options[e]
            }, r.compatOptions = {
                initLayout: "isInitLayout",
                horizontal: "isHorizontal",
                layoutInstant: "isLayoutInstant",
                originLeft: "isOriginLeft",
                originTop: "isOriginTop",
                resize: "isResizeBound",
                resizeContainer: "isResizingContainer"
            }, h._create = function() {
                this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), i.extend(this.element.style, this.options.containerStyle);
                var e = this._getOption("resize");
                e && this.bindResize()
            }, h.reloadItems = function() {
                this.items = this._itemize(this.element.children)
            }, h._itemize = function(e) {
                for (var t = this._filterFindItemElements(e), n = this.constructor.Item, i = [], o = 0; o < t.length; o++) {
                    var r = t[o],
                        a = new n(r, this);
                    i.push(a)
                }
                return i
            }, h._filterFindItemElements = function(e) {
                return i.filterFindElements(e, this.options.itemSelector)
            }, h.getItemElements = function() {
                return this.items.map(function(e) {
                    return e.element
                })
            }, h.layout = function() {
                this._resetLayout(), this._manageStamps();
                var e = this._getOption("layoutInstant"),
                    t = void 0 !== e ? e : !this._isLayoutInited;
                this.layoutItems(this.items, t), this._isLayoutInited = !0
            }, h._init = h.layout, h._resetLayout = function() {
                this.getSize()
            }, h.getSize = function() {
                this.size = n(this.element)
            }, h._getMeasurement = function(e, t) {
                var i, o = this.options[e];
                o ? ("string" == typeof o ? i = this.element.querySelector(o) : o instanceof HTMLElement && (i = o), this[e] = i ? n(i)[t] : o) : this[e] = 0
            }, h.layoutItems = function(e, t) {
                e = this._getItemsForLayout(e), this._layoutItems(e, t), this._postLayout()
            }, h._getItemsForLayout = function(e) {
                return e.filter(function(e) {
                    return !e.isIgnored
                })
            }, h._layoutItems = function(e, t) {
                if (this._emitCompleteOnItems("layout", e), e && e.length) {
                    var n = [];
                    e.forEach(function(e) {
                        var i = this._getItemLayoutPosition(e);
                        i.item = e, i.isInstant = t || e.isLayoutInstant, n.push(i)
                    }, this), this._processLayoutQueue(n)
                }
            }, h._getItemLayoutPosition = function() {
                return {
                    x: 0,
                    y: 0
                }
            }, h._processLayoutQueue = function(e) {
                this.updateStagger(), e.forEach(function(e, t) {
                    this._positionItem(e.item, e.x, e.y, e.isInstant, t)
                }, this)
            }, h.updateStagger = function() {
                var e = this.options.stagger;
                return null === e || void 0 === e ? void(this.stagger = 0) : (this.stagger = s(e), this.stagger)
            }, h._positionItem = function(e, t, n, i, o) {
                i ? e.goTo(t, n) : (e.stagger(o * this.stagger), e.moveTo(t, n))
            }, h._postLayout = function() {
                this.resizeContainer()
            }, h.resizeContainer = function() {
                var e = this._getOption("resizeContainer");
                if (e) {
                    var t = this._getContainerSize();
                    t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
                }
            }, h._getContainerSize = u, h._setContainerMeasure = function(e, t) {
                if (void 0 !== e) {
                    var n = this.size;
                    n.isBorderBox && (e += t ? n.paddingLeft + n.paddingRight + n.borderLeftWidth + n.borderRightWidth : n.paddingBottom + n.paddingTop + n.borderTopWidth + n.borderBottomWidth), e = Math.max(e, 0), this.element.style[t ? "width" : "height"] = e + "px"
                }
            }, h._emitCompleteOnItems = function(e, t) {
                function n() {
                    o.dispatchEvent(e + "Complete", null, [t])
                }

                function i() {
                    a++, a == r && n()
                }
                var o = this,
                    r = t.length;
                if (!t || !r) return void n();
                var a = 0;
                t.forEach(function(t) {
                    t.once(e, i)
                })
            }, h.dispatchEvent = function(e, t, n) {
                var i = t ? [t].concat(n) : n;
                if (this.emitEvent(e, i), c)
                    if (this.$element = this.$element || c(this.element), t) {
                        var o = c.Event(t);
                        o.type = e, this.$element.trigger(o, n)
                    } else this.$element.trigger(e, n)
            }, h.ignore = function(e) {
                var t = this.getItem(e);
                t && (t.isIgnored = !0)
            }, h.unignore = function(e) {
                var t = this.getItem(e);
                t && delete t.isIgnored
            }, h.stamp = function(e) {
                e = this._find(e), e && (this.stamps = this.stamps.concat(e), e.forEach(this.ignore, this))
            }, h.unstamp = function(e) {
                e = this._find(e), e && e.forEach(function(e) {
                    i.removeFrom(this.stamps, e), this.unignore(e)
                }, this)
            }, h._find = function(e) {
                return e ? ("string" == typeof e && (e = this.element.querySelectorAll(e)), e = i.makeArray(e)) : void 0
            }, h._manageStamps = function() {
                this.stamps && this.stamps.length && (this._getBoundingRect(), this.stamps.forEach(this._manageStamp, this))
            }, h._getBoundingRect = function() {
                var e = this.element.getBoundingClientRect(),
                    t = this.size;
                this._boundingRect = {
                    left: e.left + t.paddingLeft + t.borderLeftWidth,
                    top: e.top + t.paddingTop + t.borderTopWidth,
                    right: e.right - (t.paddingRight + t.borderRightWidth),
                    bottom: e.bottom - (t.paddingBottom + t.borderBottomWidth)
                }
            }, h._manageStamp = u, h._getElementOffset = function(e) {
                var t = e.getBoundingClientRect(),
                    i = this._boundingRect,
                    o = n(e),
                    r = {
                        left: t.left - i.left - o.marginLeft,
                        top: t.top - i.top - o.marginTop,
                        right: i.right - t.right - o.marginRight,
                        bottom: i.bottom - t.bottom - o.marginBottom
                    };
                return r
            }, h.handleEvent = i.handleEvent, h.bindResize = function() {
                e.addEventListener("resize", this), this.isResizeBound = !0
            }, h.unbindResize = function() {
                e.removeEventListener("resize", this), this.isResizeBound = !1
            }, h.onresize = function() {
                this.resize()
            }, i.debounceMethod(r, "onresize", 100), h.resize = function() {
                this.isResizeBound && this.needsResizeLayout() && this.layout()
            }, h.needsResizeLayout = function() {
                var e = n(this.element),
                    t = this.size && e;
                return t && e.innerWidth !== this.size.innerWidth
            }, h.addItems = function(e) {
                var t = this._itemize(e);
                return t.length && (this.items = this.items.concat(t)), t
            }, h.appended = function(e) {
                var t = this.addItems(e);
                t.length && (this.layoutItems(t, !0), this.reveal(t))
            }, h.prepended = function(e) {
                var t = this._itemize(e);
                if (t.length) {
                    var n = this.items.slice(0);
                    this.items = t.concat(n), this._resetLayout(), this._manageStamps(), this.layoutItems(t, !0), this.reveal(t), this.layoutItems(n)
                }
            }, h.reveal = function(e) {
                if (this._emitCompleteOnItems("reveal", e), e && e.length) {
                    var t = this.updateStagger();
                    e.forEach(function(e, n) {
                        e.stagger(n * t), e.reveal()
                    })
                }
            }, h.hide = function(e) {
                if (this._emitCompleteOnItems("hide", e), e && e.length) {
                    var t = this.updateStagger();
                    e.forEach(function(e, n) {
                        e.stagger(n * t), e.hide()
                    })
                }
            }, h.revealItemElements = function(e) {
                var t = this.getItems(e);
                this.reveal(t)
            }, h.hideItemElements = function(e) {
                var t = this.getItems(e);
                this.hide(t)
            }, h.getItem = function(e) {
                for (var t = 0; t < this.items.length; t++) {
                    var n = this.items[t];
                    if (n.element == e) return n
                }
            }, h.getItems = function(e) {
                e = i.makeArray(e);
                var t = [];
                return e.forEach(function(e) {
                    var n = this.getItem(e);
                    n && t.push(n)
                }, this), t
            }, h.remove = function(e) {
                var t = this.getItems(e);
                this._emitCompleteOnItems("remove", t), t && t.length && t.forEach(function(e) {
                    e.remove(), i.removeFrom(this.items, e)
                }, this)
            }, h.destroy = function() {
                var e = this.element.style;
                e.height = "", e.position = "", e.width = "", this.items.forEach(function(e) {
                    e.destroy()
                }), this.unbindResize();
                var t = this.element.outlayerGUID;
                delete p[t], delete this.element.outlayerGUID, c && c.removeData(this.element, this.constructor.namespace)
            }, r.data = function(e) {
                e = i.getQueryElement(e);
                var t = e && e.outlayerGUID;
                return t && p[t]
            }, r.create = function(e, t) {
                var n = a(r);
                return n.defaults = i.extend({}, r.defaults), i.extend(n.defaults, t), n.compatOptions = i.extend({}, r.compatOptions), n.namespace = e, n.data = r.data, n.Item = a(o), i.htmlInit(n, e), c && c.bridget && c.bridget(e, n), n
            };
            var f = {
                ms: 1,
                s: 1e3
            };
            return r.Item = o, r
        }),
        function(e, t) {
            "function" == typeof define && define.amd ? define("masonry", ["outlayer/outlayer", "get-size/get-size"], t) : "object" == typeof module && module.exports ? module.exports = t(require("outlayer"), require("get-size")) : e.Masonry = t(e.Outlayer, e.getSize)
        }(window, function(e, t) {
            var n = e.create("masonry");
            return n.compatOptions.fitWidth = "isFitWidth", n.prototype._resetLayout = function() {
                this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns(), this.colYs = [];
                for (var e = 0; e < this.cols; e++) this.colYs.push(0);
                this.maxY = 0
            }, n.prototype.measureColumns = function() {
                if (this.getContainerWidth(), !this.columnWidth) {
                    var e = this.items[0],
                        n = e && e.element;
                    this.columnWidth = n && t(n).outerWidth || this.containerWidth
                }
                var i = this.columnWidth += this.gutter,
                    o = this.containerWidth + this.gutter,
                    r = o / i,
                    a = i - o % i,
                    s = a && 1 > a ? "round" : "floor";
                r = Math[s](r), this.cols = Math.max(r, 1)
            }, n.prototype.getContainerWidth = function() {
                var e = this._getOption("fitWidth"),
                    n = e ? this.element.parentNode : this.element,
                    i = t(n);
                this.containerWidth = i && i.innerWidth
            }, n.prototype._getItemLayoutPosition = function(e) {
                e.getSize();
                var t = e.size.outerWidth % this.columnWidth,
                    n = t && 1 > t ? "round" : "ceil",
                    i = Math[n](e.size.outerWidth / this.columnWidth);
                i = Math.min(i, this.cols);
                for (var o = this._getColGroup(i), r = Math.min.apply(Math, o), a = o.indexOf(r), s = {
                        x: this.columnWidth * a,
                        y: r
                    }, l = r + e.size.outerHeight, c = this.cols + 1 - o.length, u = 0; c > u; u++) this.colYs[a + u] = l;
                return s
            }, n.prototype._getColGroup = function(e) {
                if (2 > e) return this.colYs;
                for (var t = [], n = this.cols + 1 - e, i = 0; n > i; i++) {
                    var o = this.colYs.slice(i, i + e);
                    t[i] = Math.max.apply(Math, o)
                }
                return t
            }, n.prototype._manageStamp = function(e) {
                var n = t(e),
                    i = this._getElementOffset(e),
                    o = this._getOption("originLeft"),
                    r = o ? i.left : i.right,
                    a = r + n.outerWidth,
                    s = Math.floor(r / this.columnWidth);
                s = Math.max(0, s);
                var l = Math.floor(a / this.columnWidth);
                l -= a % this.columnWidth ? 0 : 1, l = Math.min(this.cols - 1, l);
                for (var c = this._getOption("originTop"), u = (c ? i.top : i.bottom) + n.outerHeight, d = s; l >= d; d++) this.colYs[d] = Math.max(u, this.colYs[d])
            }, n.prototype._getContainerSize = function() {
                this.maxY = Math.max.apply(Math, this.colYs);
                var e = {
                    height: this.maxY
                };
                return this._getOption("fitWidth") && (e.width = this._getContainerFitWidth()), e
            }, n.prototype._getContainerFitWidth = function() {
                for (var e = 0, t = this.cols; --t && 0 === this.colYs[t];) e++;
                return (this.cols - e) * this.columnWidth - this.gutter
            }, n.prototype.needsResizeLayout = function() {
                var e = this.containerWidth;
                return this.getContainerWidth(), e != this.containerWidth
            }, n
        }),
        function(e, t) {
            "function" == typeof define && define.amd ? define("jqueryBridget", ["jquery"], function(n) {
                return t(e, n)
            }) : "object" == typeof module && module.exports ? module.exports = t(e, require("jquery")) : e.jQueryBridget = t(e, e.jQuery)
        }(window, function(e, t) {
            "use strict";

            function n(n, r, s) {
                function l(e, t, i) {
                    var o, r = "$()." + n + '("' + t + '")';
                    return e.each(function(e, l) {
                        var c = s.data(l, n);
                        if (!c) return void a(n + " not initialized. Cannot call methods, i.e. " + r);
                        var u = c[t];
                        if (!u || "_" == t.charAt(0)) return void a(r + " is not a valid method");
                        var d = u.apply(c, i);
                        o = void 0 === o ? d : o
                    }), void 0 !== o ? o : e
                }

                function c(e, t) {
                    e.each(function(e, i) {
                        var o = s.data(i, n);
                        o ? (o.option(t), o._init()) : (o = new r(i, t), s.data(i, n, o))
                    })
                }
                s = s || t || e.jQuery, s && (r.prototype.option || (r.prototype.option = function(e) {
                    s.isPlainObject(e) && (this.options = s.extend(!0, this.options, e))
                }), s.fn[n] = function(e) {
                    if ("string" == typeof e) {
                        var t = o.call(arguments, 1);
                        return l(this, e, t)
                    }
                    return c(this, e), this
                }, i(s))
            }

            function i(e) {
                !e || e && e.bridget || (e.bridget = n)
            }
            var o = Array.prototype.slice,
                r = e.console,
                a = "undefined" == typeof r ? function() {} : function(e) {
                    r.error(e)
                };
            return i(t || e.jQuery), n
        }), define("components/grid-layout", ["require", "jquery", "imagesLoaded", "masonry", "jqueryBridget"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = (e("imagesLoaded"), e("masonry")),
                i = e("jqueryBridget");
            return {
                init: function() {
                    i("masonry", n, t), t(".grid-layout").each(function() {
                        var e = t(this);
                        e.imagesLoaded(function() {
                            e.masonry({
                                columnWidth: 1,
                                itemSelector: ".grid-item"
                            })
                        })
                    })
                }
            }
        }), define("components/list-filter", ["require", "jquery", "components/config", "components/track", "components/util", "underscore", "components/overlay", "components/tab-content", "underscore", "js-cookie"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = (e("components/config"), e("components/track")),
                i = e("components/util"),
                o = e("underscore"),
                r = e("components/overlay"),
                a = e("components/tab-content"),
                s = (e("underscore"), e("js-cookie")),
                l = "",
                c = [],
                u = {
                    services: "Dịch vụ",
                    languages_spoken: "Ngôn ngữ",
                    provinces: "Tỉnh thành",
                    districts: "Quận huyện",
                    place_types: "Loại cơ sở",
                    specialities: "Chuyên khoa",
                    occupations: "Nghề nghiệp",
                    qualifications: "Nơi đào tạo",
                    titles: "Học hàm",
                    degrees: "Học vị"
                },
                d = function(e) {
                    for (var t in u)
                        if (t == e) return u[t]
                },
                p = function(e) {
                    var t = c.filter(function(t) {
                        return t.name == e.child
                    });
                    return e.data = e.data.map(function(e) {
                        for (var n = 0; n < t[0].options.length; n++) e.slug == t[0].options[n].slug && (e.checked = !0);
                        return e
                    }), e
                },
                h = function() {
                    var e = {};
                    try {
                        e = JSON.parse(t("#current-filter-settings-json").text())
                    } catch (n) {}
                    c = t.map(e, function(e, t) {
                        return {
                            name: t,
                            options: e.list,
                            displayName: d(t),
                            link: e.link || "",
                            child: e.child || "",
                            parent: e.parent || "",
                            parentDisplayName: d(e.parent) || ""
                        }
                    })
                },
                f = function() {
                    var e = [];
                    t.each(c, function(n, i) {
                        var o = "";
                        t.each(i.options, function(e, t) {
                            t.checked && (o.length > 0 && (o += ", "), o += t.name)
                        }), e.push({
                            name: i.name,
                            displayName: d(i.name),
                            value: o,
                            link: i.link || "",
                            child: i.child || "",
                            parent: i.parent || ""
                        })
                    });
                    var n = o.template(t("#filter-summary-template").text())(e);
                    t("#filter-summary").html(n)
                },
                m = function(e, n) {
                    var i = t("#list-filter-template").html();
                    i = o.template(i)(n), e.append(i)
                },
                g = function() {
                    l = t("#full-filter-template").text(), l = o.template(l)(c)
                },
                v = function() {
                    t("#filter-summary").on("click", "a", function(e) {
                        var i = t(this).attr("href");
                        e.preventDefault(), n.page(t(this).attr("data-track-path"), t(this).attr("title")), r.open(t(l), "filter-overlay", function(e) {
                            a.initNewTabContent(e), y(e), x(e), w(e), k(e), t('.tab-content-triggers a[href="' + i + '"]', e).click();
                            var n = e.find(".tab-content-triggers");
                            n.scrollLeft(n.find("a.active").offset().left)
                        })
                    })
                },
                y = function(e) {
                    e.submit(function(n) {
                        n.preventDefault();
                        var o = window.location.href;
                        t.each(c, function(n, r) {
                            var a = [];
                            t('input[name="' + r.name + '"]', e).each(function() {
                                t(this).is(":checked") && a.push(t(this).val())
                            }), a.length ? o = i.addParamToUrl(o, r.name, a.join(",")) : i.getParamValue(r.name, window.location.href) && (o = i.removeParamFromUrl(o, r.name))
                        }), window.location = o
                    })
                },
                b = function() {
                    t("#filter-cta .activator").click(function(e) {
                        e.preventDefault(), t(this).toggleClass("active"), t(t(this).attr("href")).toggle()
                    })
                },
                x = function(e) {
                    e.on("input", ".search input", function() {
                        var e = i.removeVnAccents(t(this).val()).toLowerCase();
                        t(this).closest(".filter-content").find("ul li").each(function() {
                            var n = !1;
                            (i.removeVnAccents(t(this).find("span").text()).toLowerCase().search(e) > -1 || t(this).find("input").prop("checked")) && (n = !0), t(this).toggle(n)
                        })
                    })
                },
                w = function(e) {
                    e.find(".filter-content[data-child]").each(function() {
                        var n = t(this),
                            i = n.data("child"),
                            o = n.data("name"),
                            r = n.data("link");
                        n.find("ul li input").each(function() {
                            t(this).on("change", function() {
                                var a = t(this).val(),
                                    l = !1,
                                    c = e.find(".filter-content." + i);
                                t(this).prop("checked") ? (c.removeClass("has-no-option"), t.ajax(r + "?" + o + "=" + a, {
                                    headers: {
                                        "X-XSRF-TOKEN": s.get("XSRF-TOKEN")
                                    },
                                    contentType: "application/json; charset=utf-8",
                                    method: "GET"
                                }).done(function(e) {
                                    var t = e[0];
                                    t.child = i, t = p(t), m(c.find(".inner"), t)
                                })) : (c.find("." + a).remove(), n.find("ul li").each(function() {
                                    return t(this).find("input").prop("checked") ? void(l = !0) : void 0
                                }), l || c.addClass("has-no-option"))
                            })
                        })
                    })
                },
                k = function(e) {
                    e.find(".filter-content").each(function() {
                        var e = t(this).data("child");
                        e && t(this).find("ul li input").each(function() {
                            t(this).prop("checked") && t(this).trigger("change")
                        })
                    })
                };
            return {
                init: function() {
                    b(), h(), f(), g(), v()
                }
            }
        }), define("components/carousel", ["require", "jquery", "owlcarousel"], function(require) {
            "use strict";
            var $ = require("jquery"),
                owlCarousel = require("owlcarousel");
            return {
                init: function($context) {
                    $context || ($context = $(document)), $(".standard-carousel", $context).each(function() {
                        var defaults = {
                                navText: !1,
                                autoplayHoverPause: !0,
                                dots: !1
                            },
                            options = eval("(" + $(this).attr("data-settings") + ")"),
                            settings = $.extend({}, defaults, options);
                        $(this).owlCarousel(settings)
                    })
                }
            }
        }), jQuery.trumbowyg = {
            langs: {
                en: {
                    viewHTML: "View HTML",
                    undo: "Undo",
                    redo: "Redo",
                    formatting: "Formatting",
                    p: "Paragraph",
                    blockquote: "Quote",
                    code: "Code",
                    header: "Header",
                    bold: "Bold",
                    italic: "Italic",
                    strikethrough: "Stroke",
                    underline: "Underline",
                    strong: "Strong",
                    em: "Emphasis",
                    del: "Deleted",
                    superscript: "Superscript",
                    subscript: "Subscript",
                    unorderedList: "Unordered list",
                    orderedList: "Ordered list",
                    insertImage: "Insert Image",
                    link: "Link",
                    createLink: "Insert link",
                    unlink: "Remove link",
                    justifyLeft: "Align Left",
                    justifyCenter: "Align Center",
                    justifyRight: "Align Right",
                    justifyFull: "Align Justify",
                    horizontalRule: "Insert horizontal rule",
                    removeformat: "Remove format",
                    fullscreen: "Fullscreen",
                    close: "Close",
                    submit: "Confirm",
                    reset: "Cancel",
                    required: "Required",
                    description: "Description",
                    title: "Title",
                    text: "Text",
                    target: "Target"
                }
            },
            plugins: {},
            svgPath: null
        },
        function(e, t, n, i) {
            "use strict";
            i.fn.trumbowyg = function(e, t) {
                var n = "trumbowyg";
                if (e === Object(e) || !e) return this.each(function() {
                    i(this).data(n) || i(this).data(n, new o(this, e))
                });
                if (1 === this.length) try {
                    var r = i(this).data(n);
                    switch (e) {
                        case "execCmd":
                            return r.execCmd(t.cmd, t.param, t.forceCss);
                        case "openModal":
                            return r.openModal(t.title, t.content);
                        case "closeModal":
                            return r.closeModal();
                        case "openModalInsert":
                            return r.openModalInsert(t.title, t.fields, t.callback);
                        case "saveRange":
                            return r.saveRange();
                        case "getRange":
                            return r.range;
                        case "getRangeText":
                            return r.getRangeText();
                        case "restoreRange":
                            return r.restoreRange();
                        case "enable":
                            return r.toggleDisable(!1);
                        case "disable":
                            return r.toggleDisable(!0);
                        case "destroy":
                            return r.destroy();
                        case "empty":
                            return r.empty();
                        case "html":
                            return r.html(t)
                    }
                } catch (a) {}
                return !1
            };
            var o = function(e, o) {
                var r = this,
                    a = "trumbowyg-icons";
                r.doc = e.ownerDocument || n, r.$ta = i(e), r.$c = i(e), o = o || {}, r.lang = null != o.lang || null != i.trumbowyg.langs[o.lang] ? i.extend(!0, {}, i.trumbowyg.langs.en, i.trumbowyg.langs[o.lang]) : i.trumbowyg.langs.en;
                var s = null != i.trumbowyg.svgPath ? i.trumbowyg.svgPath : o.svgPath;
                if (r.hasSvg = s !== !1, r.svgPath = r.doc.querySelector("base") ? t.location.href.split("#")[0] : "", 0 === i("#" + a, r.doc).length && s !== !1) {
                    if (null == s) try {
                        throw new Error
                    } catch (l) {
                        var c = l.stack.split("\n");
                        for (var u in c)
                            if (c[u].match(/http[s]?:\/\//)) {
                                s = c[Number(u)].match(/((http[s]?:\/\/.+\/)([^\/]+\.js))(\?.*)?:/)[1].split("/"), s.pop(), s = s.join("/") + "/ui/icons.svg";
                                break
                            }
                    }
                    var d = r.doc.createElement("div");
                    d.id = a, r.doc.body.insertBefore(d, r.doc.body.childNodes[0]), i.ajax({
                        async: !0,
                        type: "GET",
                        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                        dataType: "xml",
                        url: s,
                        data: null,
                        beforeSend: null,
                        complete: null,
                        success: function(e) {
                            d.innerHTML = (new XMLSerializer).serializeToString(e.documentElement)
                        }
                    })
                }
                var p = r.lang.header,
                    h = function() {
                        return (t.chrome || t.Intl && Intl.v8BreakIterator) && "CSS" in t
                    };
                r.btnsDef = {
                    viewHTML: {
                        fn: "toggle"
                    },
                    undo: {
                        isSupported: h,
                        key: "Z"
                    },
                    redo: {
                        isSupported: h,
                        key: "Y"
                    },
                    p: {
                        fn: "formatBlock"
                    },
                    blockquote: {
                        fn: "formatBlock"
                    },
                    h1: {
                        fn: "formatBlock",
                        title: p + " 1"
                    },
                    h2: {
                        fn: "formatBlock",
                        title: p + " 2"
                    },
                    h3: {
                        fn: "formatBlock",
                        title: p + " 3"
                    },
                    h4: {
                        fn: "formatBlock",
                        title: p + " 4"
                    },
                    subscript: {
                        tag: "sub"
                    },
                    superscript: {
                        tag: "sup"
                    },
                    bold: {
                        key: "B"
                    },
                    italic: {
                        key: "I"
                    },
                    underline: {
                        tag: "u"
                    },
                    strikethrough: {
                        tag: "strike"
                    },
                    strong: {
                        fn: "bold",
                        key: "B"
                    },
                    em: {
                        fn: "italic",
                        key: "I"
                    },
                    del: {
                        fn: "strikethrough"
                    },
                    createLink: {
                        key: "K",
                        tag: "a"
                    },
                    unlink: {},
                    insertImage: {},
                    justifyLeft: {
                        tag: "left",
                        forceCss: !0
                    },
                    justifyCenter: {
                        tag: "center",
                        forceCss: !0
                    },
                    justifyRight: {
                        tag: "right",
                        forceCss: !0
                    },
                    justifyFull: {
                        tag: "justify",
                        forceCss: !0
                    },
                    unorderedList: {
                        fn: "insertUnorderedList",
                        tag: "ul"
                    },
                    orderedList: {
                        fn: "insertOrderedList",
                        tag: "ol"
                    },
                    horizontalRule: {
                        fn: "insertHorizontalRule"
                    },
                    removeformat: {},
                    fullscreen: {
                        "class": "trumbowyg-not-disable"
                    },
                    close: {
                        fn: "destroy",
                        "class": "trumbowyg-not-disable"
                    },
                    formatting: {
                        dropdown: ["p", "blockquote", "h1", "h2", "h3", "h4"],
                        ico: "p"
                    },
                    link: {
                        dropdown: ["createLink", "unlink"]
                    }
                }, r.o = i.extend(!0, {}, {
                    lang: "en",
                    fixedBtnPane: !1,
                    fixedFullWidth: !1,
                    autogrow: !1,
                    prefix: "trumbowyg-",
                    semantic: !0,
                    resetCss: !1,
                    removeformatPasted: !1,
                    tagsToRemove: [],
                    btnsGrps: {
                        design: ["bold", "italic", "underline", "strikethrough"],
                        semantic: ["strong", "em", "del"],
                        justify: ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
                        lists: ["unorderedList", "orderedList"]
                    },
                    btns: [
                        ["viewHTML"],
                        ["undo", "redo"],
                        ["formatting"], "btnGrp-semantic", ["superscript", "subscript"],
                        ["link"],
                        ["insertImage"], "btnGrp-justify", "btnGrp-lists", ["horizontalRule"],
                        ["removeformat"],
                        ["fullscreen"]
                    ],
                    btnsDef: {},
                    inlineElementsSelector: "a,abbr,acronym,b,caption,cite,code,col,dfn,dir,dt,dd,em,font,hr,i,kbd,li,q,span,strikeout,strong,sub,sup,u",
                    pasteHandlers: [],
                    imgDblClickHandler: function() {
                        var e = i(this),
                            t = e.attr("src"),
                            n = "(Base64)";
                        return 0 === t.indexOf("data:image") && (t = n), r.openModalInsert(r.lang.insertImage, {
                            url: {
                                label: "URL",
                                value: t,
                                required: !0
                            },
                            alt: {
                                label: r.lang.description,
                                value: e.attr("alt")
                            }
                        }, function(t) {
                            return t.src !== n && e.attr({
                                src: t.src
                            }), e.attr({
                                alt: t.alt
                            }), !0
                        }), !1
                    },
                    plugins: {}
                }, o), r.disabled = r.o.disabled || "TEXTAREA" === e.nodeName && e.disabled, o.btns ? r.o.btns = o.btns : r.o.semantic || (r.o.btns[4] = "btnGrp-design"), i.each(r.o.btnsDef, function(e, t) {
                    r.addBtnDef(e, t)
                }), r.keys = [], r.tagToButton = {}, r.tagHandlers = [], r.pasteHandlers = [].concat(r.o.pasteHandlers), r.init()
            };
            o.prototype = {
                init: function() {
                    var e = this;
                    e.height = e.$ta.height(), e.initPlugins();
                    try {
                        e.doc.execCommand("enableObjectResizing", !1, !1)
                    } catch (t) {}
                    e.doc.execCommand("defaultParagraphSeparator", !1, "p"), e.buildEditor(), e.buildBtnPane(), e.fixedBtnPaneEvents(), e.buildOverlay(), setTimeout(function() {
                        e.disabled && e.toggleDisable(!0), e.$c.trigger("tbwinit")
                    })
                },
                addBtnDef: function(e, t) {
                    this.btnsDef[e] = t
                },
                buildEditor: function() {
                    var e = this,
                        n = e.o.prefix,
                        o = "";
                    e.$box = i("<div/>", {
                        "class": n + "box " + n + "editor-visible " + n + e.o.lang + " trumbowyg"
                    }), e.isTextarea = e.$ta.is("textarea"), e.isTextarea ? (o = e.$ta.val(), e.$ed = i("<div/>"), e.$box.insertAfter(e.$ta).append(e.$ed, e.$ta)) : (e.$ed = e.$ta, o = e.$ed.html(), e.$ta = i("<textarea/>", {
                        name: e.$ta.attr("id"),
                        height: e.height
                    }).val(o), e.$box.insertAfter(e.$ed).append(e.$ta, e.$ed), e.syncCode()), e.$ta.addClass(n + "textarea").attr("tabindex", -1), e.$ed.addClass(n + "editor").attr({
                        contenteditable: !0,
                        dir: e.lang._dir || "ltr"
                    }).html(o), e.o.tabindex && e.$ed.attr("tabindex", e.o.tabindex), e.$c.is("[placeholder]") && e.$ed.attr("placeholder", e.$c.attr("placeholder")), e.o.resetCss && e.$ed.addClass(n + "reset-css"), e.o.autogrow || e.$ta.add(e.$ed).css({
                        height: e.height
                    }), e.semanticCode();
                    var r, a = !1,
                        s = !1;
                    e.$ed.on("dblclick", "img", e.o.imgDblClickHandler).on("keydown", function(t) {
                        if (s = 229 === t.which, t.ctrlKey) {
                            a = !0;
                            var n = e.keys[String.fromCharCode(t.which).toUpperCase()];
                            try {
                                return e.execCmd(n.fn, n.param), !1
                            } catch (i) {}
                        }
                    }).on("keyup input", function(t) {
                        t.which >= 37 && t.which <= 40 || (!t.ctrlKey || 89 !== t.which && 90 !== t.which ? a || 17 === t.which || s || (e.semanticCode(!1, 13 === t.which), e.$c.trigger("tbwchange")) : e.$c.trigger("tbwchange"), setTimeout(function() {
                            a = !1
                        }, 200))
                    }).on("mouseup keydown keyup", function() {
                        clearTimeout(r), r = setTimeout(function() {
                            e.updateButtonPaneStatus()
                        }, 50)
                    }).on("focus blur", function(t) {
                        e.$c.trigger("tbw" + t.type), "blur" === t.type && i("." + n + "active-button", e.$btnPane).removeClass(n + "active-button " + n + "active")
                    }).on("cut", function() {
                        setTimeout(function() {
                            e.semanticCode(!1, !0), e.$c.trigger("tbwchange")
                        }, 0)
                    }).on("paste", function(n) {
                        if (e.o.removeformatPasted) {
                            n.preventDefault();
                            try {
                                var o = t.clipboardData.getData("Text");
                                try {
                                    e.doc.selection.createRange().pasteHTML(o)
                                } catch (r) {
                                    e.doc.getSelection().getRangeAt(0).insertNode(e.doc.createTextNode(o))
                                }
                            } catch (a) {
                                e.execCmd("insertText", (n.originalEvent || n).clipboardData.getData("text/plain"))
                            }
                        }
                        i.each(e.pasteHandlers, function(e, t) {
                            t(n)
                        }), setTimeout(function() {
                            e.semanticCode(!1, !0), e.$c.trigger("tbwpaste", n)
                        }, 0)
                    }), e.$ta.on("keyup paste", function() {
                        e.$c.trigger("tbwchange")
                    }), e.$box.on("keydown", function(t) {
                        return 27 === t.which && 1 === i("." + n + "modal-box", e.$box).length ? (e.closeModal(), !1) : void 0
                    })
                },
                buildBtnPane: function() {
                    var e = this,
                        t = e.o.prefix,
                        n = e.$btnPane = i("<div/>", {
                            "class": t + "button-pane"
                        });
                    i.each(e.o.btns, function(o, r) {
                        try {
                            var a = r.split("btnGrp-");
                            null != a[1] && (r = e.o.btnsGrps[a[1]])
                        } catch (s) {}
                        i.isArray(r) || (r = [r]);
                        var l = i("<div/>", {
                            "class": t + "button-group " + (r.indexOf("fullscreen") >= 0 ? t + "right" : "")
                        });
                        i.each(r, function(t, n) {
                            try {
                                var i;
                                e.isSupportedBtn(n) && (i = e.buildBtn(n)), l.append(i)
                            } catch (o) {}
                        }), n.append(l)
                    }), e.$box.prepend(n)
                },
                buildBtn: function(e) {
                    var t = this,
                        n = t.o.prefix,
                        o = t.btnsDef[e],
                        r = o.dropdown,
                        a = t.lang[e] || e,
                        s = i("<button/>", {
                            type: "button",
                            "class": n + e + "-button " + (o["class"] || ""),
                            html: t.hasSvg ? '<svg><use xlink:href="' + t.svgPath + "#" + n + (o.ico || e).replace(/([A-Z]+)/g, "-$1").toLowerCase() + '"/></svg>' : "",
                            title: (o.title || o.text || a) + (o.key ? " (Ctrl + " + o.key + ")" : ""),
                            tabindex: -1,
                            mousedown: function() {
                                return (!r || i("." + e + "-" + n + "dropdown", t.$box).is(":hidden")) && i("body", t.doc).trigger("mousedown"), !t.$btnPane.hasClass(n + "disable") || i(this).hasClass(n + "active") || i(this).hasClass(n + "not-disable") ? (t.execCmd((r ? "dropdown" : !1) || o.fn || e, o.param || e, o.forceCss || !1), !1) : !1
                            }
                        });
                    if (r) {
                        s.addClass(n + "open-dropdown");
                        var l = n + "dropdown",
                            c = i("<div/>", {
                                "class": l + "-" + e + " " + l + " " + n + "fixed-top",
                                "data-dropdown": e
                            });
                        i.each(r, function(e, n) {
                            t.btnsDef[n] && t.isSupportedBtn(n) && c.append(t.buildSubBtn(n))
                        }), t.$box.append(c.hide())
                    } else o.key && (t.keys[o.key] = {
                        fn: o.fn || e,
                        param: o.param || e
                    });
                    return r || (t.tagToButton[(o.tag || e).toLowerCase()] = e), s
                },
                buildSubBtn: function(e) {
                    var t = this,
                        n = t.o.prefix,
                        o = t.btnsDef[e];
                    return o.key && (t.keys[o.key] = {
                        fn: o.fn || e,
                        param: o.param || e
                    }), t.tagToButton[(o.tag || e).toLowerCase()] = e, i("<button/>", {
                        type: "button",
                        "class": n + e + "-dropdown-button" + (o.ico ? " " + n + o.ico + "-button" : ""),
                        html: t.hasSvg ? '<svg><use xlink:href="' + t.svgPath + "#" + n + (o.ico || e).replace(/([A-Z]+)/g, "-$1").toLowerCase() + '"/></svg>' + (o.text || o.title || t.lang[e] || e) : "",
                        title: o.key ? " (Ctrl + " + o.key + ")" : null,
                        style: o.style || null,
                        mousedown: function() {
                            return i("body", t.doc).trigger("mousedown"), t.execCmd(o.fn || e, o.param || e, o.forceCss || !1), !1
                        }
                    })
                },
                isSupportedBtn: function(e) {
                    try {
                        return this.btnsDef[e].isSupported()
                    } catch (t) {}
                    return !0
                },
                buildOverlay: function() {
                    var e = this;
                    return e.$overlay = i("<div/>", {
                        "class": e.o.prefix + "overlay"
                    }).css({
                        top: e.$btnPane.outerHeight(),
                        height: e.$ed.outerHeight() + 1 + "px"
                    }).appendTo(e.$box), e.$overlay
                },
                showOverlay: function() {
                    var e = this;
                    i(t).trigger("scroll"), e.$overlay.fadeIn(200), e.$box.addClass(e.o.prefix + "box-blur")
                },
                hideOverlay: function() {
                    var e = this;
                    e.$overlay.fadeOut(50), e.$box.removeClass(e.o.prefix + "box-blur")
                },
                fixedBtnPaneEvents: function() {
                    var e = this,
                        n = e.o.fixedFullWidth,
                        o = e.$box;
                    e.o.fixedBtnPane && (e.isFixed = !1, i(t).on("scroll resize", function() {
                        if (o) {
                            e.syncCode();
                            var r = i(t).scrollTop(),
                                a = o.offset().top + 1,
                                s = e.$btnPane,
                                l = s.outerHeight() - 2;
                            r - a > 0 && r - a - e.height < 0 ? (e.isFixed || (e.isFixed = !0, s.css({
                                position: "fixed",
                                top: 0,
                                left: n ? "0" : "auto",
                                zIndex: 7
                            }), i([e.$ta, e.$ed]).css({
                                marginTop: s.height()
                            })), s.css({
                                width: n ? "100%" : o.width() - 1 + "px"
                            }), i("." + e.o.prefix + "fixed-top", o).css({
                                position: n ? "fixed" : "absolute",
                                top: n ? l : l + (r - a) + "px",
                                zIndex: 15
                            })) : e.isFixed && (e.isFixed = !1, s.removeAttr("style"), i([e.$ta, e.$ed]).css({
                                marginTop: 0
                            }), i("." + e.o.prefix + "fixed-top", o).css({
                                position: "absolute",
                                top: l
                            }))
                        }
                    }))
                },
                toggleDisable: function(e) {
                    var t = this,
                        n = t.o.prefix;
                    t.disabled = e, e ? t.$ta.attr("disabled", !0) : t.$ta.removeAttr("disabled"), t.$box.toggleClass(n + "disabled", e), t.$ed.attr("contenteditable", !e)
                },
                destroy: function() {
                    var e = this,
                        t = e.o.prefix,
                        n = e.height;
                    e.$box.after(e.isTextarea ? e.$ta.css({
                        height: n
                    }).val(e.html()).removeClass(t + "textarea").show() : e.$ed.css({
                        height: n
                    }).removeClass(t + "editor").removeAttr("contenteditable").html(e.html()).show()), e.$ed.off("dblclick", "img"), e.destroyPlugins(), e.$box.remove(), e.$c.removeData("trumbowyg"), i("body").removeClass(t + "body-fullscreen"), e.$c.trigger("tbwclose")
                },
                empty: function() {
                    this.$ta.val(""), this.syncCode(!0)
                },
                toggle: function() {
                    var e = this,
                        t = e.o.prefix;
                    e.semanticCode(!1, !0), setTimeout(function() {
                        e.doc.activeElement.blur(), e.$box.toggleClass(t + "editor-hidden " + t + "editor-visible"), e.$btnPane.toggleClass(t + "disable"), i("." + t + "viewHTML-button", e.$btnPane).toggleClass(t + "active"), e.$box.hasClass(t + "editor-visible") ? e.$ta.attr("tabindex", -1) : e.$ta.removeAttr("tabindex")
                    }, 0)
                },
                dropdown: function(e) {
                    var n = this,
                        o = n.doc,
                        r = n.o.prefix,
                        a = i("[data-dropdown=" + e + "]", n.$box),
                        s = i("." + r + e + "-button", n.$btnPane),
                        l = a.is(":hidden");
                    if (i("body", o).trigger("mousedown"), l) {
                        var c = s.offset().left;
                        s.addClass(r + "active"), a.css({
                            position: "absolute",
                            top: s.offset().top - n.$btnPane.offset().top + s.outerHeight(),
                            left: n.o.fixedFullWidth && n.isFixed ? c + "px" : c - n.$btnPane.offset().left + "px"
                        }).show(), i(t).trigger("scroll"), i("body", o).on("mousedown", function() {
                            i("." + r + "dropdown", o).hide(), i("." + r + "active", o).removeClass(r + "active"), i("body", o).off("mousedown")
                        })
                    }
                },
                html: function(e) {
                    var t = this;
                    return null != e ? (t.$ta.val(e), t.syncCode(!0), t) : t.$ta.val()
                },
                syncTextarea: function() {
                    var e = this;
                    e.$ta.val(e.$ed.text().trim().length > 0 || e.$ed.find("hr,img,embed,iframe,input").length > 0 ? e.$ed.html() : "")
                },
                syncCode: function(e) {
                    var t = this;
                    !e && t.$ed.is(":visible") ? t.syncTextarea() : t.$ed.html(t.$ta.val()), t.o.autogrow && (t.height = t.$ed.height(), t.height !== t.$ta.css("height") && (t.$ta.css({
                        height: t.height
                    }), t.$c.trigger("tbwresize")))
                },
                semanticCode: function(e, t) {
                    var n = this;
                    if (n.saveRange(), n.syncCode(e), i(n.o.tagsToRemove.join(","), n.$ed).remove(), n.o.semantic) {
                        if (n.semanticTag("b", "strong"), n.semanticTag("i", "em"), t) {
                            var o = n.o.inlineElementsSelector,
                                r = ":not(" + o + ")";
                            n.$ed.contents().filter(function() {
                                return 3 === this.nodeType && this.nodeValue.trim().length > 0
                            }).wrap("<span data-tbw/>");
                            var a = function(e) {
                                if (0 !== e.length) {
                                    var t = e.nextUntil(r).addBack().wrapAll("<p/>").parent(),
                                        n = t.nextAll(o).first();
                                    t.next("br").remove(), a(n)
                                }
                            };
                            a(n.$ed.children(o).first()), n.semanticTag("div", "p", !0), n.$ed.find("p").filter(function() {
                                return n.range && this === n.range.startContainer ? !1 : 0 === i(this).text().trim().length && 0 === i(this).children().not("br,span").length
                            }).contents().unwrap(), i("[data-tbw]", n.$ed).contents().unwrap(), n.$ed.find("p:empty").remove()
                        }
                        n.restoreRange(), n.syncTextarea()
                    }
                },
                semanticTag: function(e, t, n) {
                    i(e, this.$ed).each(function() {
                        var e = i(this);
                        e.wrap("<" + t + "/>"), n && i.each(e.prop("attributes"), function() {
                            e.parent().attr(this.name, this.value)
                        }), e.contents().unwrap()
                    })
                },
                createLink: function() {
                    for (var e, t, n, o = this, r = o.doc.getSelection(), a = r.focusNode;
                        ["A", "DIV"].indexOf(a.nodeName) < 0;) a = a.parentNode;
                    if (a && "A" === a.nodeName) {
                        var s = i(a);
                        e = s.attr("href"), t = s.attr("title"), n = s.attr("target");
                        var l = o.doc.createRange();
                        l.selectNode(a), r.addRange(l)
                    }
                    o.saveRange(), o.openModalInsert(o.lang.createLink, {
                        url: {
                            label: "URL",
                            required: !0,
                            value: e
                        },
                        title: {
                            label: o.lang.title,
                            value: t
                        },
                        text: {
                            label: o.lang.text,
                            value: o.getRangeText()
                        },
                        target: {
                            label: o.lang.target,
                            value: n
                        }
                    }, function(e) {
                        var t = i(['<a href="', e.url, '">', e.text, "</a>"].join(""));
                        return e.title.length > 0 && t.attr("title", e.title), e.target.length > 0 && t.attr("target", e.target), o.range.deleteContents(), o.range.insertNode(t[0]), !0
                    })
                },
                unlink: function() {
                    var e = this,
                        t = e.doc.getSelection(),
                        n = t.focusNode;
                    if (t.isCollapsed) {
                        for (;
                            ["A", "DIV"].indexOf(n.nodeName) < 0;) n = n.parentNode;
                        if (n && "A" === n.nodeName) {
                            var i = e.doc.createRange();
                            i.selectNode(n), t.addRange(i)
                        }
                    }
                    e.execCmd("unlink", void 0, void 0, !0)
                },
                insertImage: function() {
                    var e = this;
                    e.saveRange(), e.openModalInsert(e.lang.insertImage, {
                        url: {
                            label: "URL",
                            required: !0
                        },
                        alt: {
                            label: e.lang.description,
                            value: e.getRangeText()
                        }
                    }, function(t) {
                        return e.execCmd("insertImage", t.url), i('img[src="' + t.url + '"]:not([alt])', e.$box).attr("alt", t.alt), !0
                    })
                },
                fullscreen: function() {
                    var e, n = this,
                        o = n.o.prefix,
                        r = o + "fullscreen";
                    n.$box.toggleClass(r), e = n.$box.hasClass(r), i("body").toggleClass(o + "body-fullscreen", e), i(t).trigger("scroll"), n.$c.trigger("tbw" + (e ? "open" : "close") + "fullscreen")
                },
                execCmd: function(t, n, i, o) {
                    var r = this;
                    o = !!o || "", "dropdown" !== t && r.$ed.focus();
                    try {
                        r.doc.execCommand("styleWithCSS", !1, i || !1)
                    } catch (a) {}
                    try {
                        r[t + o](n)
                    } catch (a) {
                        try {
                            t(n)
                        } catch (s) {
                            "insertHorizontalRule" === t ? n = void 0 : "formatBlock" !== t || -1 === e.userAgent.indexOf("MSIE") && -1 === e.appVersion.indexOf("Trident/") || (n = "<" + n + ">"), r.doc.execCommand(t, !1, n), r.syncCode(), r.semanticCode(!1, !0)
                        }
                        "dropdown" !== t && (r.updateButtonPaneStatus(), r.$c.trigger("tbwchange"))
                    }
                },
                openModal: function(e, n) {
                    var o = this,
                        r = o.o.prefix;
                    if (i("." + r + "modal-box", o.$box).length > 0) return !1;
                    o.saveRange(), o.showOverlay(), o.$btnPane.addClass(r + "disable");
                    var a = i("<div/>", {
                        "class": r + "modal " + r + "fixed-top"
                    }).css({
                        top: o.$btnPane.height()
                    }).appendTo(o.$box);
                    o.$overlay.one("click", function() {
                        return a.trigger("tbwcancel"), !1
                    });
                    var s = i("<form/>", {
                            action: "",
                            html: n
                        }).on("submit", function() {
                            return a.trigger("tbwconfirm"), !1
                        }).on("reset", function() {
                            return a.trigger("tbwcancel"), !1
                        }),
                        l = i("<div/>", {
                            "class": r + "modal-box",
                            html: s
                        }).css({
                            top: "-" + o.$btnPane.outerHeight() + "px",
                            opacity: 0
                        }).appendTo(a).animate({
                            top: 0,
                            opacity: 1
                        }, 100);
                    return i("<span/>", {
                        text: e,
                        "class": r + "modal-title"
                    }).prependTo(l), a.height(l.outerHeight() + 10), i("input:first", l).focus(), o.buildModalBtn("submit", l), o.buildModalBtn("reset", l), i(t).trigger("scroll"), a
                },
                buildModalBtn: function(e, t) {
                    var n = this,
                        o = n.o.prefix;
                    return i("<button/>", {
                        "class": o + "modal-button " + o + "modal-" + e,
                        type: e,
                        text: n.lang[e] || e
                    }).appendTo(i("form", t))
                },
                closeModal: function() {
                    var e = this,
                        t = e.o.prefix;
                    e.$btnPane.removeClass(t + "disable"), e.$overlay.off();
                    var n = i("." + t + "modal-box", e.$box);
                    n.animate({
                        top: "-" + n.height()
                    }, 100, function() {
                        n.parent().remove(), e.hideOverlay()
                    }), e.restoreRange()
                },
                openModalInsert: function(e, t, n) {
                    var o = this,
                        r = o.o.prefix,
                        a = o.lang,
                        s = "",
                        l = "tbwconfirm";
                    return i.each(t, function(e, t) {
                        var n = t.label,
                            i = t.name || e;
                        s += '<label><input type="' + (t.type || "text") + '" name="' + i + '" value="' + (t.value || "").replace(/"/g, "&quot;") + '"><span class="' + r + 'input-infos"><span>' + (n ? a[n] ? a[n] : n : a[e] ? a[e] : e) + "</span></span></label>"
                    }), o.openModal(e, s).on(l, function() {
                        var e = i("form", i(this)),
                            r = !0,
                            a = {};
                        i.each(t, function(t, n) {
                            var s = i('input[name="' + t + '"]', e);
                            a[t] = i.trim(s.val()), n.required && "" === a[t] ? (r = !1, o.addErrorOnModalField(s, o.lang.required)) : n.pattern && !n.pattern.test(a[t]) && (r = !1, o.addErrorOnModalField(s, n.patternError))
                        }), r && (o.restoreRange(), n(a, t) && (o.syncCode(), o.$c.trigger("tbwchange"), o.closeModal(), i(this).off(l)))
                    }).one("tbwcancel", function() {
                        i(this).off(l), o.closeModal()
                    })
                },
                addErrorOnModalField: function(e, t) {
                    var n = this.o.prefix,
                        o = e.parent();
                    e.on("change keyup", function() {
                        o.removeClass(n + "input-error")
                    }), o.addClass(n + "input-error").find("input+span").append(i("<span/>", {
                        "class": n + "msg-error",
                        text: t
                    }))
                },
                saveRange: function() {
                    var e = this,
                        t = e.doc.getSelection();
                    if (e.range = null, t.rangeCount) {
                        var n, i = e.range = t.getRangeAt(0),
                            o = e.doc.createRange();
                        o.selectNodeContents(e.$ed[0]), o.setEnd(i.startContainer, i.startOffset), n = (o + "").length, e.metaRange = {
                            start: n,
                            end: n + (i + "").length
                        }
                    }
                },
                restoreRange: function() {
                    var e, t = this,
                        n = t.metaRange,
                        i = t.range,
                        o = t.doc.getSelection();
                    if (i) {
                        if (n && n.start !== n.end) {
                            var r, a = 0,
                                s = [t.$ed[0]],
                                l = !1,
                                c = !1;
                            for (e = t.doc.createRange(); !c && (r = s.pop());)
                                if (3 === r.nodeType) {
                                    var u = a + r.length;
                                    !l && n.start >= a && n.start <= u && (e.setStart(r, n.start - a), l = !0), l && n.end >= a && n.end <= u && (e.setEnd(r, n.end - a), c = !0), a = u
                                } else
                                    for (var d = r.childNodes, p = d.length; p > 0;) p -= 1, s.push(d[p])
                        }
                        o.removeAllRanges(), o.addRange(e || i)
                    }
                },
                getRangeText: function() {
                    return this.range + ""
                },
                updateButtonPaneStatus: function() {
                    var e = this,
                        t = e.o.prefix,
                        n = e.getTagsRecursive(e.doc.getSelection().focusNode),
                        o = t + "active-button " + t + "active";
                    i("." + t + "active-button", e.$btnPane).removeClass(o), i.each(n, function(n, r) {
                        var a = e.tagToButton[r.toLowerCase()],
                            s = i("." + t + a + "-button", e.$btnPane);
                        if (s.length > 0) s.addClass(o);
                        else try {
                            s = i("." + t + "dropdown ." + t + a + "-dropdown-button", e.$box);
                            var l = s.parent().data("dropdown");
                            i("." + t + l + "-button", e.$box).addClass(o)
                        } catch (c) {}
                    })
                },
                getTagsRecursive: function(e, t) {
                    var n = this;
                    if (t = t || [], !e) return t;
                    e = e.parentNode;
                    var o = e.tagName;
                    return "DIV" === o ? t : ("P" === o && "" !== e.style.textAlign && t.push(e.style.textAlign), i.each(n.tagHandlers, function(i, o) {
                        t = t.concat(o(e, n))
                    }), t.push(o), n.getTagsRecursive(e, t))
                },
                initPlugins: function() {
                    var e = this;
                    e.loadedPlugins = [], i.each(i.trumbowyg.plugins, function(t, n) {
                        (!n.shouldInit || n.shouldInit(e)) && (n.init(e), n.tagHandler && e.tagHandlers.push(n.tagHandler), e.loadedPlugins.push(n))
                    })
                },
                destroyPlugins: function() {
                    i.each(this.loadedPlugins, function(e, t) {
                        t.destroy && t.destroy()
                    })
                }
            }
        }(navigator, window, document, jQuery), define("trumbowyg", ["jquery"], function() {}), define("components/professional-edit", ["require", "components/suggestion", "trumbowyg", "jquery", "components/config", "components/util", "js-cookie", "components/overlay", "components/track", "underscore"], function(e) {
            "use strict";
            e("components/suggestion"), e("trumbowyg");
            var t, n, i = e("jquery"),
                o = e("components/config"),
                r = e("components/util"),
                a = e("js-cookie"),
                s = e("components/overlay"),
                l = e("components/track"),
                c = e("underscore"),
                u = 6,
                d = 90,
                p = function(e, t) {
                    var n = i("#professional-image-template").html();
                    e.append(c.template(n)(t))
                },
                h = function() {
                    i(".professional-editor", t).trumbowyg({
                        btns: [
                            ["bold", "italic"], "btnGrp-justify", "btnGrp-lists"
                        ],
                        svgPath: BacsiViet.staticPath + "bower_components/trumbowyg/dist/ui/icons.svg"
                    })
                },
                f = function(e) {
                    var t = [],
                        n = {
                            name: r.truncate(e.name, d, !0),
                            id: e.id,
                            subtitle: e.address
                        };
                    return t.push({
                        items: [n]
                    }), t
                },
                m = function(e) {
                    var t = [],
                        n = 0;
                    return i.each(e, function(e, i) {
                        var o = f(i),
                            r = !1;
                        return o.forEach(function(e) {
                            r || (t.push(e), n++, n >= u && (r = !0))
                        }), r ? !1 : void 0
                    }), t
                },
                g = function(e, t, n) {
                    var i;
                    return function() {
                        var o = this,
                            r = arguments,
                            a = function() {
                                i = null, n || e.apply(o, r)
                            },
                            s = n && !i;
                        clearTimeout(i), i = setTimeout(a, t), s && e.apply(o, r)
                    }
                },
                v = function() {
                    i(".tag-search", t).each(function() {
                        var e = i(this);
                        e.suggestion({
                            lookup: g(function(t, n) {
                                i.ajax(o.api.professional.serviceSearch, {
                                    contentType: "application/json; charset=utf-8",
                                    data: {
                                        q: t,
                                        doc_type: e.data("for")
                                    }
                                }).done(function(e) {
                                    n(m(e.results, t))
                                })
                            }, 400),
                            onSelect: function(t, n) {
                                t.preventDefault();
                                var i = e.closest(".form-field-input").find(".tag-list"),
                                    o = n.items[0];
                                0 == i.find('[data-id="' + o.id + '"]').size() && i.append('<li><a href="#" data-id="' + o.id + '" class="button secondary weak">' + o.name + ' <i class="fa fa-times"></i></a></li>'), e.val("")
                            }
                        })
                    })
                },
                y = function() {
                    i(".tag-list", t).on("click", "a", function(e) {
                        e.preventDefault(), i(this).parent().remove()
                    })
                },
                b = function() {
                    t.on("submit", function(e) {
                        var n = t.find('input[name="professional-id"]').val(),
                            r = o.api.professional.edit.replace("{id}", n),
                            c = t.find('select[name="professional-occupation"]').val(),
                            u = t.find('select[name="professional-title"]').val(),
                            d = [],
                            p = t.find('select[name="professional-degrees"]').val();
                        null != p && i.each(p, function(e, t) {
                            d.push({
                                id: t
                            })
                        });
                        var h = [],
                            f = t.find('select[name="professional-language"]').val();
                        null != f && i.each(f, function(e, t) {
                            h.push({
                                id: t
                            })
                        });
                        var m = t.find('input[name="professional-email"]').val(),
                            g = t.find('input[name="professional-tel"]').val(),
                            v = t.find('input[name="professional-name"]').val(),
                            y = i("#professional-position").trumbowyg("html"),
                            b = i("#professional-description").trumbowyg("html"),
                            x = i("#professional-service-free").trumbowyg("html"),
                            w = [],
                            k = [],
                            _ = [];
                        i(".tag-list", t).each(function() {
                            var e = i(this);
                            "service_index" == e.attr("name") && e.children("li").each(function() {
                                w.push({
                                    id: i(this).find("a").attr("data-id")
                                })
                            }), "speciality_index" == e.attr("name") && e.children("li").each(function() {
                                k.push({
                                    id: i(this).find("a").attr("data-id")
                                })
                            }), "place_index" == e.attr("name") && e.children("li").each(function() {
                                _.push({
                                    id: i(this).find("a").attr("data-id")
                                })
                            })
                        });
                        var C = i("#professional-experience-full").trumbowyg("html"),
                            T = i("#professional-achievements").trumbowyg("html");
                        t.addClass("submitting"), i.ajax(r, {
                            headers: {
                                "X-XSRF-TOKEN": a.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                name: v,
                                phone: g,
                                email: m,
                                description: b,
                                services_free: x,
                                title: u,
                                degrees: d,
                                occupation: c,
                                position: y,
                                services: w,
                                experience_full: C,
                                achievements: T,
                                specialities: k,
                                languages_spoken: h,
                                workplaces: _
                            }),
                            method: "PUT"
                        }).done(function() {
                            t.removeClass("submitting"), s.openAlert(i("<p>Sửa thông tin thành công. Xin cảm ơn bạn!</p>")), l.page("/sua-thong-tin/bac-si/thanh-cong/" + n, "Bác sĩ sửa thông tin thành công")
                        }).fail(function(e) {
                            t.removeClass("submitting"), s.openAlert(i('<p>Sửa không thành công. Xin vui lòng thử lại.</p><p>Nếu bạn vẫn gặp vấn đề, xin vui lòng liên hệ với chúng tôi theo số điện thoại <a href="tel:0473 006 008">0473 006 008</a> hoặc email <a href="mailto:contact@tdoctor.vn">contact@tdoctor.vn</a> để được trợ giúp.</p><p>Mã lỗi: <em>' + e.responseText + "</em></p>")), l.page("/sua-thong-tin/bac-si/loi", "Đăng ký gặp lỗi " + e.responseText)
                        }), e.preventDefault()
                    })
                },
                x = function(e) {
                    e.find(".uploader input").on("change", function(t) {
                        var n = i(this),
                            r = n[0].files[0],
                            s = n.data("prof-id"),
                            l = o.api.professional.image.replace("{id}", s);
                        n.parent().addClass("loading"), e.find(".title-image").text(r.name), n.attr("disabled", "disabled");
                        var c = new FormData;
                        c.append("images", r), i.ajax(l, {
                            headers: {
                                "X-XSRF-TOKEN": a.get("XSRF-TOKEN")
                            },
                            processData: !1,
                            contentType: !1,
                            dataType: "json",
                            data: c,
                            method: "PUT"
                        }).done(function(t) {
                            n.parent().removeClass("loading"), n.attr("disabled", !1);
                            var i = {
                                id: t[t.length - 1].id,
                                professionalId: s,
                                url: t[t.length - 1].origin
                            };
                            p(e.find("ul"), i), e.find(".title-image").text("")
                        }).fail(function() {
                            var t = confirm("Có lỗi khi tải ảnh lên. Bạn có muốn thử lại không?");
                            t ? n.trigger("change") : (n.parent().removeClass("loading"), e.find(".title-image").text(""))
                        }), t.preventDefault()
                    })
                },
                w = function(e) {
                    e.find('ul li input[name="main"]').on("change", function(e) {
                        var t = i(this),
                            n = t.parent().data("id"),
                            r = t.parent().data("prof-id"),
                            s = o.api.professional.image.replace("{id}", r) + n;
                        t.siblings("a").addClass("loading"), i.ajax(s, {
                            headers: {
                                "X-XSRF-TOKEN": a.get("XSRF-TOKEN")
                            },
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                main: !0,
                                id: n
                            }),
                            method: "PUT"
                        }).done(function() {
                            t.siblings("a").removeClass("loading")
                        }).fail(function() {
                            t.siblings("a").removeClass("loading"), alert("Có lỗi khi xét ảnh đại diện, vui lòng thử lại!")
                        }), e.preventDefault()
                    })
                },
                k = function(e) {
                    e.on("click", "a", function(e) {
                        var t = confirm("Bạn có chắc chắn muốn xoá ảnh này không?");
                        if (t) {
                            var n = i(this),
                                r = n.parent().data("id"),
                                s = n.parent().data("prof-id"),
                                l = o.api.professional.image.replace("{id}", s) + r;
                            n.addClass("loading"), i.ajax(l, {
                                headers: {
                                    "X-XSRF-TOKEN": a.get("XSRF-TOKEN")
                                },
                                contentType: "application/json; charset=utf-8",
                                method: "DELETE"
                            }).done(function() {
                                n.closest("li").remove()
                            }).fail(function() {
                                n.removeClass("loading"), alert("Có lỗi khi xoá ảnh, vui lòng thử lại!")
                            })
                        }
                        e.preventDefault()
                    })
                };
            return {
                init: function() {
                    t = i('#detail.editing form[name="professional-edit"]'), 0 != t.size() && (y(), v(), h(), b(), n = i("#detail.editing .professional-edit-image"), x(n), w(n), k(n))
                }
            }
        }), define("components/favourite", ["require", "jquery", "js-cookie", "components/overlay", "components/login-overlay", "components/config", "components/track", "underscore", "components/config"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("js-cookie"),
                i = e("components/overlay"),
                o = e("components/login-overlay"),
                r = e("components/config"),
                a = e("components/track"),
                r = (e("underscore"), e("components/config")),
                s = function(e) {
                    t(".favourite-count").each(function() {
                        var n = t(this).text() || 0;
                        n = parseInt(n), n += e, t(this).text(n)
                    })
                },
                l = function() {
                    var e;
                    localStorage.favourite && (e = JSON.parse(localStorage.favourite)), t(".action-favourite").each(function() {
                        var i = t(this),
                            l = i.data("place-id"),
                            c = i.data("professional-id"),
                            u = {
                                type: l ? "place" : "professional",
                                id: l ? l : c,
                                added: !0
                            };
                        i.on("click", function(e) {
                            t("body").hasClass("not-logged-in") ? (localStorage.setItem("favourite", JSON.stringify(u)), o.openSignupOverlay("source-favourite", r.api.account.signup + "?source=favourite&next=" + window.location.href)) : (u.added = i.hasClass("favourite-added") ? !1 : !0, i.addClass("submitting"), t.ajax(r.api.post.favourite, {
                                headers: {
                                    "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                },
                                contentType: "application/json; charset=utf-8",
                                data: JSON.stringify(u),
                                method: "PUT"
                            }).done(function(e) {
                                i.removeClass("submitting"), e.added ? (i.addClass("favourite-added"), s(1)) : (i.removeClass("favourite-added"), s(-1)), delete localStorage.favourite, a.page("/ghi-nho/them-moi/hoan-thanh/")
                            }).fail(function(e) {
                                i.removeClass("submitting"), localStorage.setItem("favourite", JSON.stringify(param)), 403 == e.status && o.openSignupOverlay("source-favourite", r.api.account.signup + "?source=favourite&next=" + window.location.href), a.page("/ghi-nho/them-moi/loi/")
                            }), e.preventDefault())
                        }), e && t("body").hasClass("logged-in") && ("place" == e.type && e.id == l || "professional" == e.type && e.id == c) && i.trigger("click")
                    })
                },
                c = function() {
                    t(".remove-favourite").each(function() {
                        t(this).on("click", function(e) {
                            var o = t(this),
                                l = o.data("place-id"),
                                c = o.data("professional-id");
                            i.openConfirm("Bạn có chắc chắn muốn bỏ ghi nhớ " + (l ? "cơ sở y tế" : "bác sĩ") + " này?", function(e) {
                                e && (o.closest("article").remove(), s(-1), t.ajax(r.api.post.favourite, {
                                    headers: {
                                        "X-XSRF-TOKEN": n.get("XSRF-TOKEN")
                                    },
                                    contentType: "application/json; charset=utf-8",
                                    data: JSON.stringify({
                                        type: l ? "place" : "professional",
                                        id: l ? l : c,
                                        added: !1
                                    }),
                                    method: "PUT"
                                }).done(function() {
                                    a.page("/ghi-nho/loai-bo/hoan-thanh/")
                                }).fail(function() {
                                    a.page("/ghi-nho/loai-bo/loi/")
                                }))
                            }), e.preventDefault()
                        })
                    })
                };
            return {
                init: function() {
                    l(), c()
                }
            }
        }), define("components/time-countdown", ["require", "jquery"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = function(e) {
                    var t = Date.parse(e) - Date.parse(new Date),
                        n = Math.floor(t / 1e3 % 60),
                        i = Math.floor(t / 1e3 / 60 % 60),
                        o = Math.floor(t / 36e5 % 24),
                        r = Math.floor(t / 864e5);
                    return {
                        total: t,
                        days: r,
                        hours: o,
                        minutes: i,
                        seconds: n
                    }
                },
                i = function(e, t) {
                    function i() {
                        var e = n(t);
                        o.html(e.days), r.html(("0" + e.hours).slice(-2)), a.html(("0" + e.minutes).slice(-2)), s.html(("0" + e.seconds).slice(-2)), e.total <= 0 && clearInterval(l)
                    }
                    var o = e.find(".days"),
                        r = e.find(".hours"),
                        a = e.find(".minutes"),
                        s = e.find(".seconds");
                    i();
                    var l = setInterval(i, 1e3)
                },
                o = function() {
                    t(".time-countdown").each(function() {
                        var e = t(this).data("time");
                        i(t(this), e)
                    })
                };
            return {
                init: function() {
                    o()
                }
            }
        }), define("components/smooth-scroll-link", ["require", "jquery", "components/track"], function(e) {
            "use strict";
            var t, n = e("jquery"),
                i = e("components/track"),
                o = 500,
                r = !1,
                a = function(e) {
                    t = parseInt(n("header").height()) + parseInt(e.height()) + 10
                },
                s = function() {
                    n('a[href*="#"]:not([href="#"]).smooth-scroll').click(function() {
                        if (i.page(n(this).attr("data-track-path"), n(this).attr("data-track-label")), location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                            var e = n(this.hash);
                            if (e = e.length ? e : n("[name=" + this.hash.slice(1) + "]"), e.length) return n("html, body").animate({
                                scrollTop: e.offset().top
                            }, 1e3), !1
                        }
                    })
                },
                l = function(e) {
                    n("a[href*=#]:not([href=#])", e).click(function() {
                        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                            var e = n(this.hash);
                            if (e = e.length ? e : n("[name=" + this.hash.slice(1) + "]"), e.length) {
                                r = !0;
                                var i;
                                return i = "undefined" != typeof n(this).attr("data-scroll-to") && n(this).attr("data-scroll-to") !== !1 ? n(this).attr("data-scroll-to") : e.offset().top - t, n("html, body").animate({
                                    scrollTop: i
                                }, o, function() {
                                    r = !1
                                }), !1
                            }
                        }
                    })
                },
                c = function(e) {
                    e.find("a").click(function() {
                        e.find("a").removeClass("active"), n(this).addClass("active")
                    }), n(window).scroll(function() {
                        if (!r) {
                            {
                                var i = n(window).scrollTop() + t;
                                n(window).height(), n(document).height()
                            }
                            e.find("a").each(function() {
                                var t = n(this),
                                    o = t.attr("href");
                                if (document.getElementById(o.substr(1))) {
                                    var r = n(o).offset().top;
                                    t.parent().is(":first-child") && (r = 0);
                                    var a = n(o).outerHeight();
                                    i >= r && r + a > i ? (t.addClass("active"), e.find("a").not(t).removeClass("active")) : t.removeClass("active")
                                }
                            })
                        }
                    })
                };
            return {
                init: function() {
                    s(), n(".smooth-scroll-link").each(function() {
                        a(n(this)), l(n(this)), c(n(this)), n(window).trigger("scroll")
                    })
                }
            }
        }), define("components/group-filter", ["require", "jquery", "components/carousel", "underscore"], function(require) {
            "use strict";
            var $ = require("jquery"),
                standardCarousel = require("components/carousel"),
                _ = require("underscore"),
                setDotsEach = function(e, t) {
                    var n = 10;
                    return $.each(e.responsive, function(e, i) {
                        i.items * n < t && (i.dotsEach = Math.floor(t / n))
                    }), e
                },
                appendGroupFilterList = function($container, data) {
                    var itemsCount = data.length / 2,
                        templateStr = $("#group-filter-list-template").html();
                    $container.html(_.template(templateStr)({
                        data: data
                    }));
                    var $standardCarousel = $container.find(".standard-carousel"),
                        settings = JSON.stringify(eval("(" + $standardCarousel.data("settings") + ")"));
                    settings = setDotsEach(JSON.parse(settings), itemsCount), $standardCarousel.attr("data-settings", JSON.stringify(settings)), standardCarousel.init($container), $container.siblings(".no-js-professional-list").remove()
                },
                professionalGroupBySpec = function(e) {
                    var t = [];
                    return _.each(e, function(e) {
                        e.specialities ? _.each(e.specialities, function(n) {
                            var i = _.clone(e);
                            i.speciality = n, t.push(i)
                        }) : (e.speciality = "", t.push(e))
                    }), _.groupBy(t, function(e) {
                        return e.speciality
                    })
                },
                initGroupFilter = function() {
                    $(".group-filter .group-filter-option select").each(function() {
                        var e = $(this);
                        e.on("change", function() {
                            var t = e.data("items"),
                                n = e.find("option:selected").val();
                            n && (t = professionalGroupBySpec(t)[n]), appendGroupFilterList(e.closest(".group-filter").find(".carousel-container"), t)
                        }).trigger("change")
                    })
                };
            return {
                init: function() {
                    initGroupFilter()
                }
            }
        }), define("components/hide-other", ["require", "jquery"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = function() {
                    var e = "a.hide-other-trigger",
                        n = ".hide-other-content",
                        i = "";
                    t(e).on("click", function(e) {
                        var o = t(this).attr("href");
                        t(this).siblings(".active").removeClass("active"), t(this).addClass("active"), "#show-all" == o ? t(n).removeClass("hide") : (t(n).addClass("hide").removeClass("show"), i = o.replace("#", "."), t(i).removeClass("hide").addClass("show")), e.preventDefault()
                    })
                };
            return {
                init: function() {
                    n()
                }
            }
        }), define("components/insurance", ["require", "jquery", "underscore", "components/collapsible"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = e("underscore"),
                i = e("components/collapsible"),
                o = function(e, o) {
                    var r = t("#benefit-template").html();
                    r = n.template(r)(o), e.html(r), i.init()
                },
                r = function(e, i, o) {
                    var r = t("#package-template").html();
                    r = n.template(r)(i), e.html(r), o.find('select[name="package"]').on("change", function() {
                        s(o)
                    })
                },
                a = function(e) {
                    var n = e.find('select[name="age"]').val(),
                        i = e.find(".benefit-filter"),
                        o = i.data("benefits"),
                        a = i.data("packages");
                    if (n && a) {
                        var s = o.filter(function(e) {
                                return e.required
                            }),
                            l = s[0] && s[0].age_groups.filter(function(e) {
                                return e.from_age <= n && n <= e.to_age
                            });
                        t.each(a, function(e, t) {
                            t.number = l && l[0].premiums[e]
                        }), r(i.find(".package"), a, e)
                    }
                },
                s = function(e) {
                    var n = e.find('select[name="age"]').val(),
                        i = e.find('select[name="package"]').val(),
                        r = e.find(".benefit-filter"),
                        a = r.data("benefits"),
                        s = r.data("packages"),
                        l = {
                            currency: i && s[i].currency,
                            require: [],
                            notRequire: []
                        };
                    n && i && t.each(a, function(e, t) {
                        for (var o = 0; o < t.age_groups.length; o++)
                            if (t.age_groups[o].from_age <= n && n <= t.age_groups[o].to_age) {
                                t.age_groups[o].premiums[i], t.number = t.age_groups[o].premiums[i], t.medical_services.map(function(e) {
                                    return e.number = e.limits[i], e.children.map(function(e) {
                                        return e.number = e.limits[i], e
                                    }), e
                                }), t.required ? l.require.push(t) : l.notRequire.push(t);
                                break
                            }
                    }), o(e.find(".benefit-content"), l)
                },
                l = function(e) {
                    e.find('select[name="age"]').on("change", function() {
                        s(e), a(e)
                    }).trigger("change")
                };
            return {
                init: function() {
                    var e = t(".insurance-plan-detail .benefit");
                    0 != e.size() && l(e)
                }
            }
        }), requirejs.config({
            paths: {
                jquery: "../bower_components/jquery/dist/jquery",
                owlcarousel: "../bower_components/owl.carousel/dist/owl.carousel.min",
                "js-cookie": "../bower_components/js-cookie/src/js.cookie",
                sticky: "../bower_components/jquery-sticky/jquery.sticky",
                underscore: "../bower_components/underscore/underscore",
                imagesLoaded: "../bower_components/imagesloaded/imagesloaded.pkgd.min",
                masonry: "../bower_components/masonry/dist/masonry.pkgd.min",
                historyJs: "../bower_components/history.js/scripts/bundled/html4+html5/jquery.history",
                autoResize: "../bower_components/autoresize-textarea/dist/autoresize-textarea",
                raty: "../bower_components/raty-fa2/lib/jquery.raty-fa",
                trumbowyg: "../bower_components/trumbowyg/dist/trumbowyg.min",
                jqueryBridget: "../bower_components/jquery-bridget/jquery-bridget",
                app: "./app"
            },
            shim: {
                owlcarousel: ["jquery"],
                "components/suggestion": ["jquery"],
                historyJs: ["jquery"],
                sticky: ["jquery"],
                raty: ["jquery"],
                trumbowyg: ["jquery"],
                masonry: ["jquery"]
            }
        }), define("app", ["require", "jquery", "js-cookie", "components/track", "components/map", "components/nav", "components/sticky-nav", "components/gallery", "components/content", "components/user-location", "components/search", "components/subscribe", "components/comment", "components/booking-form", "components/booking-picker", "components/promotion", "components/signup", "components/email-reset", "components/reset-password", "components/change-password", "components/email-confirm", "components/login", "components/login-overlay", "components/forum-form", "components/forum-feedback", "components/forum-reply-form", "components/forum-edit-form", "components/forum-assignment", "components/geolocation", "components/collapsible", "components/grid-layout", "components/util", "components/list-filter", "components/tab-content", "components/auto-resize-textarea", "components/carousel", "components/star-rating", "components/professional-edit", "components/favourite", "components/time-countdown", "components/smooth-scroll-link", "components/group-filter", "components/hide-other", "components/insurance"], function(e) {
            "use strict";
            var t = e("jquery"),
                n = (e("js-cookie"), {
                    track: e("components/track"),
                    map: e("components/map"),
                    nav: e("components/nav"),
                    stickyNav: e("components/sticky-nav"),
                    gallery: e("components/gallery"),
                    content: e("components/content"),
                    userLocation: e("components/user-location"),
                    search: e("components/search"),
                    subscribe: e("components/subscribe"),
                    comment: e("components/comment"),
                    bookingForm: e("components/booking-form"),
                    bookingPicker: e("components/booking-picker"),
                    promotion: e("components/promotion"),
                    signUp: e("components/signup"),
                    emailReset: e("components/email-reset"),
                    resetPassword: e("components/reset-password"),
                    changePassword: e("components/change-password"),
                    confirmEmail: e("components/email-confirm"),
                    login: e("components/login"),
                    loginOverlay: e("components/login-overlay"),
                    forumForm: e("components/forum-form"),
                    forumFeedback: e("components/forum-feedback"),
                    forumReplyForm: e("components/forum-reply-form"),
                    forumEditForm: e("components/forum-edit-form"),
                    forumAssignment: e("components/forum-assignment"),
                    geolocation: e("components/geolocation"),
                    collapsible: e("components/collapsible"),
                    gridLayout: e("components/grid-layout"),
                    util: e("components/util"),
                    listFilter: e("components/list-filter"),
                    tabContent: e("components/tab-content"),
                    autoResize: e("components/auto-resize-textarea"),
                    carousel: e("components/carousel"),
                    starRating: e("components/star-rating"),
                    professionalEdit: e("components/professional-edit"),
                    favourite: e("components/favourite"),
                    timeCountDown: e("components/time-countdown"),
                    smoothScrollLink: e("components/smooth-scroll-link"),
                    groupFilter: e("components/group-filter"),
                    hideOther: e("components/hide-other"),
                    insurance: e("components/insurance")
                });
            for (var i in n) n[i] && n[i].init && n[i].init();
            t("html").removeClass("no-js"), n.util.isTouchDevice() && t("html").addClass("has-touch")
        }), require(["app"])
}();