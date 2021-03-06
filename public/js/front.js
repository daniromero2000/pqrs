if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery");
! function (t) {
    "use strict";
    var e = jQuery.fn.jquery.split(" ")[0].split(".");
    if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
}(),
function (t) {
    "use strict";
    t.fn.emulateTransitionEnd = function (e) {
        var i = !1,
            n = this;
        t(this).one("bsTransitionEnd", function () {
            i = !0
        });
        return setTimeout(function () {
            i || t(n).trigger(t.support.transition.end)
        }, e), this
    }, t(function () {
        t.support.transition = function () {
            var t = document.createElement("bootstrap"),
                e = {
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "oTransitionEnd otransitionend",
                    transition: "transitionend"
                };
            for (var i in e)
                if (void 0 !== t.style[i]) return {
                    end: e[i]
                };
            return !1
        }(), t.support.transition && (t.event.special.bsTransitionEnd = {
            bindType: t.support.transition.end,
            delegateType: t.support.transition.end,
            handle: function (e) {
                if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
            }
        })
    })
}(jQuery),
function (t) {
    "use strict";
    var e = '[data-dismiss="alert"]',
        i = function (i) {
            t(i).on("click", e, this.close)
        };
    i.VERSION = "3.4.1", i.TRANSITION_DURATION = 150, i.prototype.close = function (e) {
        var n = t(this),
            s = n.attr("data-target");
        s || (s = (s = n.attr("href")) && s.replace(/.*(?=#[^\s]*$)/, "")), s = "#" === s ? [] : s;
        var o = t(document).find(s);

        function r() {
            o.detach().trigger("closed.bs.alert").remove()
        }
        e && e.preventDefault(), o.length || (o = n.closest(".alert")), o.trigger(e = t.Event("close.bs.alert")), e.isDefaultPrevented() || (o.removeClass("in"), t.support.transition && o.hasClass("fade") ? o.one("bsTransitionEnd", r).emulateTransitionEnd(i.TRANSITION_DURATION) : r())
    };
    var n = t.fn.alert;
    t.fn.alert = function (e) {
        return this.each(function () {
            var n = t(this),
                s = n.data("bs.alert");
            s || n.data("bs.alert", s = new i(this)), "string" == typeof e && s[e].call(n)
        })
    }, t.fn.alert.Constructor = i, t.fn.alert.noConflict = function () {
        return t.fn.alert = n, this
    }, t(document).on("click.bs.alert.data-api", e, i.prototype.close)
}(jQuery),
function (t) {
    "use strict";
    var e = function (i, n) {
        this.$element = t(i), this.options = t.extend({}, e.DEFAULTS, n), this.isLoading = !1
    };

    function i(i) {
        return this.each(function () {
            var n = t(this),
                s = n.data("bs.button"),
                o = "object" == typeof i && i;
            s || n.data("bs.button", s = new e(this, o)), "toggle" == i ? s.toggle() : i && s.setState(i)
        })
    }
    e.VERSION = "3.4.1", e.DEFAULTS = {
        loadingText: "loading..."
    }, e.prototype.setState = function (e) {
        var i = "disabled",
            n = this.$element,
            s = n.is("input") ? "val" : "html",
            o = n.data();
        e += "Text", null == o.resetText && n.data("resetText", n[s]()), setTimeout(t.proxy(function () {
            n[s](null == o[e] ? this.options[e] : o[e]), "loadingText" == e ? (this.isLoading = !0, n.addClass(i).attr(i, i).prop(i, !0)) : this.isLoading && (this.isLoading = !1, n.removeClass(i).removeAttr(i).prop(i, !1))
        }, this), 0)
    }, e.prototype.toggle = function () {
        var t = !0,
            e = this.$element.closest('[data-toggle="buttons"]');
        if (e.length) {
            var i = this.$element.find("input");
            "radio" == i.prop("type") ? (i.prop("checked") && (t = !1), e.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == i.prop("type") && (i.prop("checked") !== this.$element.hasClass("active") && (t = !1), this.$element.toggleClass("active")), i.prop("checked", this.$element.hasClass("active")), t && i.trigger("change")
        } else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
    };
    var n = t.fn.button;
    t.fn.button = i, t.fn.button.Constructor = e, t.fn.button.noConflict = function () {
        return t.fn.button = n, this
    }, t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function (e) {
        var n = t(e.target).closest(".btn");
        i.call(n, "toggle"), t(e.target).is('input[type="radio"], input[type="checkbox"]') || (e.preventDefault(), n.is("input,button") ? n.trigger("focus") : n.find("input:visible,button:visible").first().trigger("focus"))
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function (e) {
        t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type))
    })
}(jQuery), $(document).ready(function () {
        var t = ".MultiCarousel",
            e = ".MultiCarousel-inner",
            i = "";

        function n() {
            var n = 0,
                s = 0,
                o = "",
                r = "",
                a = $(t).width(),
                l = $("body").width();
            $(e).each(function () {
                s += 1;
                var t = $(this).find(".item").length;
                o = $(this).parent().attr("data-items"), r = o.split(","), $(this).parent().attr("id", "MultiCarousel" + s), l >= 1200 ? (n = r[1], i = a / n) : l >= 992 ? (n = r[1], i = a / n) : l >= 768 ? (n = r[1], i = a / n) : (n = r[0], i = a / n), $(this).css({
                    transform: "translateX(0px)",
                    width: i * t
                }), $(this).find(".item").each(function () {
                    $(this).outerWidth(i)
                }), $(".leftLst").addClass("over"), $(".rightLst").removeClass("over")
            })
        }

        function s(t, n) {
            var s = "#" + $(n).parent().attr("id");
            ! function (t, n, s) {
                var o = "",
                    r = $(n + " " + e).css("transform").match(/-?[\d\.]+/g),
                    a = Math.abs(r[4]);
                if (0 == t) o = parseInt(a) - parseInt(i * s), $(n + " .rightLst").removeClass("over"), o <= i / 2 && (o = 0, $(n + " .leftLst").addClass("over"));
                else if (1 == t) {
                    var l = $(n).find(e).width() - $(n).width();
                    o = parseInt(a) + parseInt(i * s), $(n + " .leftLst").removeClass("over"), o >= l - i / 2 && (o = l, $(n + " .rightLst").addClass("over"))
                }
                $(n + " " + e).css("transform", "translateX(" + -o + "px)")
            }(t, s, $(s).attr("data-slide"))
        }
        $(".leftLst, .rightLst").click(function () {
            s($(this).hasClass("leftLst") ? 0 : 1, this)
        }), n(), $(window).resize(function () {
            n()
        })
    }),
    function (t) {
        "use strict";
        var e = function (i, n) {
            this.$element = t(i), this.options = t.extend({}, e.DEFAULTS, n), this.$trigger = t('[data-toggle="collapse"][href="#' + i.id + '"],[data-toggle="collapse"][data-target="#' + i.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
        };

        function i(e) {
            var i, n = e.attr("data-target") || (i = e.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, "");
            return t(document).find(n)
        }

        function n(i) {
            return this.each(function () {
                var n = t(this),
                    s = n.data("bs.collapse"),
                    o = t.extend({}, e.DEFAULTS, n.data(), "object" == typeof i && i);
                !s && o.toggle && /show|hide/.test(i) && (o.toggle = !1), s || n.data("bs.collapse", s = new e(this, o)), "string" == typeof i && s[i]()
            })
        }
        e.VERSION = "3.4.1", e.TRANSITION_DURATION = 350, e.DEFAULTS = {
            toggle: !0
        }, e.prototype.dimension = function () {
            return this.$element.hasClass("width") ? "width" : "height"
        }, e.prototype.show = function () {
            if (!this.transitioning && !this.$element.hasClass("in")) {
                var i, s = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
                if (!(s && s.length && (i = s.data("bs.collapse")) && i.transitioning)) {
                    var o = t.Event("show.bs.collapse");
                    if (this.$element.trigger(o), !o.isDefaultPrevented()) {
                        s && s.length && (n.call(s, "hide"), i || s.data("bs.collapse", null));
                        var r = this.dimension();
                        this.$element.removeClass("collapse").addClass("collapsing")[r](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                        var a = function () {
                            this.$element.removeClass("collapsing").addClass("collapse in")[r](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                        };
                        if (!t.support.transition) return a.call(this);
                        var l = t.camelCase(["scroll", r].join("-"));
                        this.$element.one("bsTransitionEnd", t.proxy(a, this)).emulateTransitionEnd(e.TRANSITION_DURATION)[r](this.$element[0][l])
                    }
                }
            }
        }, e.prototype.hide = function () {
            if (!this.transitioning && this.$element.hasClass("in")) {
                var i = t.Event("hide.bs.collapse");
                if (this.$element.trigger(i), !i.isDefaultPrevented()) {
                    var n = this.dimension();
                    this.$element[n](this.$element[n]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                    var s = function () {
                        this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                    };
                    if (!t.support.transition) return s.call(this);
                    this.$element[n](0).one("bsTransitionEnd", t.proxy(s, this)).emulateTransitionEnd(e.TRANSITION_DURATION)
                }
            }
        }, e.prototype.toggle = function () {
            this[this.$element.hasClass("in") ? "hide" : "show"]()
        }, e.prototype.getParent = function () {
            return t(document).find(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function (e, n) {
                var s = t(n);
                this.addAriaAndCollapsedClass(i(s), s)
            }, this)).end()
        }, e.prototype.addAriaAndCollapsedClass = function (t, e) {
            var i = t.hasClass("in");
            t.attr("aria-expanded", i), e.toggleClass("collapsed", !i).attr("aria-expanded", i)
        };
        var s = t.fn.collapse;
        t.fn.collapse = n, t.fn.collapse.Constructor = e, t.fn.collapse.noConflict = function () {
            return t.fn.collapse = s, this
        }, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (e) {
            var s = t(this);
            s.attr("data-target") || e.preventDefault();
            var o = i(s),
                r = o.data("bs.collapse") ? "toggle" : s.data();
            n.call(o, r)
        })
    }(jQuery),
    function (t) {
        "use strict";
        var e = ".dropdown-backdrop",
            i = '[data-toggle="dropdown"]',
            n = function (e) {
                t(e).on("click.bs.dropdown", this.toggle)
            };

        function s(e) {
            var i = e.attr("data-target");
            i || (i = (i = e.attr("href")) && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, ""));
            var n = "#" !== i ? t(document).find(i) : null;
            return n && n.length ? n : e.parent()
        }

        function o(n) {
            n && 3 === n.which || (t(e).remove(), t(i).each(function () {
                var e = t(this),
                    i = s(e),
                    o = {
                        relatedTarget: this
                    };
                i.hasClass("open") && (n && "click" == n.type && /input|textarea/i.test(n.target.tagName) && t.contains(i[0], n.target) || (i.trigger(n = t.Event("hide.bs.dropdown", o)), n.isDefaultPrevented() || (e.attr("aria-expanded", "false"), i.removeClass("open").trigger(t.Event("hidden.bs.dropdown", o)))))
            }))
        }
        n.VERSION = "3.4.1", n.prototype.toggle = function (e) {
            var i = t(this);
            if (!i.is(".disabled, :disabled")) {
                var n = s(i),
                    r = n.hasClass("open");
                if (o(), !r) {
                    "ontouchstart" in document.documentElement && !n.closest(".navbar-nav").length && t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click", o);
                    var a = {
                        relatedTarget: this
                    };
                    if (n.trigger(e = t.Event("show.bs.dropdown", a)), e.isDefaultPrevented()) return;
                    i.trigger("focus").attr("aria-expanded", "true"), n.toggleClass("open").trigger(t.Event("shown.bs.dropdown", a))
                }
                return !1
            }
        }, n.prototype.keydown = function (e) {
            if (/(38|40|27|32)/.test(e.which) && !/input|textarea/i.test(e.target.tagName)) {
                var n = t(this);
                if (e.preventDefault(), e.stopPropagation(), !n.is(".disabled, :disabled")) {
                    var o = s(n),
                        r = o.hasClass("open");
                    if (!r && 27 != e.which || r && 27 == e.which) return 27 == e.which && o.find(i).trigger("focus"), n.trigger("click");
                    var a = o.find(".dropdown-menu li:not(.disabled):visible a");
                    if (a.length) {
                        var l = a.index(e.target);
                        38 == e.which && l > 0 && l--, 40 == e.which && l < a.length - 1 && l++, ~l || (l = 0), a.eq(l).trigger("focus")
                    }
                }
            }
        };
        var r = t.fn.dropdown;
        t.fn.dropdown = function (e) {
            return this.each(function () {
                var i = t(this),
                    s = i.data("bs.dropdown");
                s || i.data("bs.dropdown", s = new n(this)), "string" == typeof e && s[e].call(i)
            })
        }, t.fn.dropdown.Constructor = n, t.fn.dropdown.noConflict = function () {
            return t.fn.dropdown = r, this
        }, t(document).on("click.bs.dropdown.data-api", o).on("click.bs.dropdown.data-api", ".dropdown form", function (t) {
            t.stopPropagation()
        }).on("click.bs.dropdown.data-api", i, n.prototype.toggle).on("keydown.bs.dropdown.data-api", i, n.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", n.prototype.keydown)
    }(jQuery),
    function (t) {
        "use strict";
        var e = function (e, i) {
            this.options = i, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.fixedContent = ".navbar-fixed-top, .navbar-fixed-bottom", this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function () {
                this.$element.trigger("loaded.bs.modal")
            }, this))
        };

        function i(i, n) {
            return this.each(function () {
                var s = t(this),
                    o = s.data("bs.modal"),
                    r = t.extend({}, e.DEFAULTS, s.data(), "object" == typeof i && i);
                o || s.data("bs.modal", o = new e(this, r)), "string" == typeof i ? o[i](n) : r.show && o.show(n)
            })
        }
        e.VERSION = "3.4.1", e.TRANSITION_DURATION = 300, e.BACKDROP_TRANSITION_DURATION = 150, e.DEFAULTS = {
            backdrop: !0,
            keyboard: !0,
            show: !0
        }, e.prototype.toggle = function (t) {
            return this.isShown ? this.hide() : this.show(t)
        }, e.prototype.show = function (i) {
            var n = this,
                s = t.Event("show.bs.modal", {
                    relatedTarget: i
                });
            this.$element.trigger(s), this.isShown || s.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
                n.$element.one("mouseup.dismiss.bs.modal", function (e) {
                    t(e.target).is(n.$element) && (n.ignoreBackdropClick = !0)
                })
            }), this.backdrop(function () {
                var s = t.support.transition && n.$element.hasClass("fade");
                n.$element.parent().length || n.$element.appendTo(n.$body), n.$element.show().scrollTop(0), n.adjustDialog(), s && n.$element[0].offsetWidth, n.$element.addClass("in"), n.enforceFocus();
                var o = t.Event("shown.bs.modal", {
                    relatedTarget: i
                });
                s ? n.$dialog.one("bsTransitionEnd", function () {
                    n.$element.trigger("focus").trigger(o)
                }).emulateTransitionEnd(e.TRANSITION_DURATION) : n.$element.trigger("focus").trigger(o)
            }))
        }, e.prototype.hide = function (i) {
            i && i.preventDefault(), i = t.Event("hide.bs.modal"), this.$element.trigger(i), this.isShown && !i.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(e.TRANSITION_DURATION) : this.hideModal())
        }, e.prototype.enforceFocus = function () {
            t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function (t) {
                document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
            }, this))
        }, e.prototype.escape = function () {
            this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function (t) {
                27 == t.which && this.hide()
            }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
        }, e.prototype.resize = function () {
            this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
        }, e.prototype.hideModal = function () {
            var t = this;
            this.$element.hide(), this.backdrop(function () {
                t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
            })
        }, e.prototype.removeBackdrop = function () {
            this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
        }, e.prototype.backdrop = function (i) {
            var n = this,
                s = this.$element.hasClass("fade") ? "fade" : "";
            if (this.isShown && this.options.backdrop) {
                var o = t.support.transition && s;
                if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + s).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function (t) {
                        this.ignoreBackdropClick ? this.ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide())
                    }, this)), o && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !i) return;
                o ? this.$backdrop.one("bsTransitionEnd", i).emulateTransitionEnd(e.BACKDROP_TRANSITION_DURATION) : i()
            } else if (!this.isShown && this.$backdrop) {
                this.$backdrop.removeClass("in");
                var r = function () {
                    n.removeBackdrop(), i && i()
                };
                t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", r).emulateTransitionEnd(e.BACKDROP_TRANSITION_DURATION) : r()
            } else i && i()
        }, e.prototype.handleUpdate = function () {
            this.adjustDialog()
        }, e.prototype.adjustDialog = function () {
            var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
            this.$element.css({
                paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
                paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
            })
        }, e.prototype.resetAdjustments = function () {
            this.$element.css({
                paddingLeft: "",
                paddingRight: ""
            })
        }, e.prototype.checkScrollbar = function () {
            var t = window.innerWidth;
            if (!t) {
                var e = document.documentElement.getBoundingClientRect();
                t = e.right - Math.abs(e.left)
            }
            this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
        }, e.prototype.setScrollbar = function () {
            var e = parseInt(this.$body.css("padding-right") || 0, 10);
            this.originalBodyPad = document.body.style.paddingRight || "";
            var i = this.scrollbarWidth;
            this.bodyIsOverflowing && (this.$body.css("padding-right", e + i), t(this.fixedContent).each(function (e, n) {
                var s = n.style.paddingRight,
                    o = t(n).css("padding-right");
                t(n).data("padding-right", s).css("padding-right", parseFloat(o) + i + "px")
            }))
        }, e.prototype.resetScrollbar = function () {
            this.$body.css("padding-right", this.originalBodyPad), t(this.fixedContent).each(function (e, i) {
                var n = t(i).data("padding-right");
                t(i).removeData("padding-right"), i.style.paddingRight = n || ""
            })
        }, e.prototype.measureScrollbar = function () {
            var t = document.createElement("div");
            t.className = "modal-scrollbar-measure", this.$body.append(t);
            var e = t.offsetWidth - t.clientWidth;
            return this.$body[0].removeChild(t), e
        };
        var n = t.fn.modal;
        t.fn.modal = i, t.fn.modal.Constructor = e, t.fn.modal.noConflict = function () {
            return t.fn.modal = n, this
        }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (e) {
            var n = t(this),
                s = n.attr("href"),
                o = n.attr("data-target") || s && s.replace(/.*(?=#[^\s]+$)/, ""),
                r = t(document).find(o),
                a = r.data("bs.modal") ? "toggle" : t.extend({
                    remote: !/#/.test(s) && s
                }, r.data(), n.data());
            n.is("a") && e.preventDefault(), r.one("show.bs.modal", function (t) {
                t.isDefaultPrevented() || r.one("hidden.bs.modal", function () {
                    n.is(":visible") && n.trigger("focus")
                })
            }), i.call(r, a, this)
        })
    }(jQuery),
    function (t) {
        "use strict";
        var e = ["sanitize", "whiteList", "sanitizeFn"],
            i = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
            n = {
                "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                a: ["target", "href", "title", "rel"],
                area: [],
                b: [],
                br: [],
                col: [],
                code: [],
                div: [],
                em: [],
                hr: [],
                h1: [],
                h2: [],
                h3: [],
                h4: [],
                h5: [],
                h6: [],
                i: [],
                img: ["src", "alt", "title", "width", "height"],
                li: [],
                ol: [],
                p: [],
                pre: [],
                s: [],
                small: [],
                span: [],
                sub: [],
                sup: [],
                strong: [],
                u: [],
                ul: []
            },
            s = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:\/?#]*(?:[\/?#]|$))/gi,
            o = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+\/]+=*$/i;

        function r(e, n) {
            var r = e.nodeName.toLowerCase();
            if (-1 !== t.inArray(r, n)) return -1 === t.inArray(r, i) || Boolean(e.nodeValue.match(s) || e.nodeValue.match(o));
            for (var a = t(n).filter(function (t, e) {
                    return e instanceof RegExp
                }), l = 0, c = a.length; l < c; l++)
                if (r.match(a[l])) return !0;
            return !1
        }

        function a(e, i, n) {
            if (0 === e.length) return e;
            if (n && "function" == typeof n) return n(e);
            if (!document.implementation || !document.implementation.createHTMLDocument) return e;
            var s = document.implementation.createHTMLDocument("sanitization");
            s.body.innerHTML = e;
            for (var o = t.map(i, function (t, e) {
                    return e
                }), a = t(s.body).find("*"), l = 0, c = a.length; l < c; l++) {
                var h = a[l],
                    u = h.nodeName.toLowerCase();
                if (-1 !== t.inArray(u, o))
                    for (var d = t.map(h.attributes, function (t) {
                            return t
                        }), p = [].concat(i["*"] || [], i[u] || []), f = 0, m = d.length; f < m; f++) r(d[f], p) || h.removeAttribute(d[f].nodeName);
                else h.parentNode.removeChild(h)
            }
            return s.body.innerHTML
        }
        var l = function (t, e) {
            this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e)
        };
        l.VERSION = "3.4.1", l.TRANSITION_DURATION = 150, l.DEFAULTS = {
            animation: !0,
            placement: "top",
            selector: !1,
            template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            trigger: "hover focus",
            title: "",
            delay: 0,
            html: !1,
            container: !1,
            viewport: {
                selector: "body",
                padding: 0
            },
            sanitize: !0,
            sanitizeFn: null,
            whiteList: n
        }, l.prototype.init = function (e, i, n) {
            if (this.enabled = !0, this.type = e, this.$element = t(i), this.options = this.getOptions(n), this.$viewport = this.options.viewport && t(document).find(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
                    click: !1,
                    hover: !1,
                    focus: !1
                }, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
            for (var s = this.options.trigger.split(" "), o = s.length; o--;) {
                var r = s[o];
                if ("click" == r) this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this));
                else if ("manual" != r) {
                    var a = "hover" == r ? "mouseenter" : "focusin",
                        l = "hover" == r ? "mouseleave" : "focusout";
                    this.$element.on(a + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
                }
            }
            this.options.selector ? this._options = t.extend({}, this.options, {
                trigger: "manual",
                selector: ""
            }) : this.fixTitle()
        }, l.prototype.getDefaults = function () {
            return l.DEFAULTS
        }, l.prototype.getOptions = function (i) {
            var n = this.$element.data();
            for (var s in n) n.hasOwnProperty(s) && -1 !== t.inArray(s, e) && delete n[s];
            return (i = t.extend({}, this.getDefaults(), n, i)).delay && "number" == typeof i.delay && (i.delay = {
                show: i.delay,
                hide: i.delay
            }), i.sanitize && (i.template = a(i.template, i.whiteList, i.sanitizeFn)), i
        }, l.prototype.getDelegateOptions = function () {
            var e = {},
                i = this.getDefaults();
            return this._options && t.each(this._options, function (t, n) {
                i[t] != n && (e[t] = n)
            }), e
        }, l.prototype.enter = function (e) {
            var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
            if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusin" == e.type ? "focus" : "hover"] = !0), i.tip().hasClass("in") || "in" == i.hoverState) i.hoverState = "in";
            else {
                if (clearTimeout(i.timeout), i.hoverState = "in", !i.options.delay || !i.options.delay.show) return i.show();
                i.timeout = setTimeout(function () {
                    "in" == i.hoverState && i.show()
                }, i.options.delay.show)
            }
        }, l.prototype.isInStateTrue = function () {
            for (var t in this.inState)
                if (this.inState[t]) return !0;
            return !1
        }, l.prototype.leave = function (e) {
            var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
            if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusout" == e.type ? "focus" : "hover"] = !1), !i.isInStateTrue()) {
                if (clearTimeout(i.timeout), i.hoverState = "out", !i.options.delay || !i.options.delay.hide) return i.hide();
                i.timeout = setTimeout(function () {
                    "out" == i.hoverState && i.hide()
                }, i.options.delay.hide)
            }
        }, l.prototype.show = function () {
            var e = t.Event("show.bs." + this.type);
            if (this.hasContent() && this.enabled) {
                this.$element.trigger(e);
                var i = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
                if (e.isDefaultPrevented() || !i) return;
                var n = this,
                    s = this.tip(),
                    o = this.getUID(this.type);
                this.setContent(), s.attr("id", o), this.$element.attr("aria-describedby", o), this.options.animation && s.addClass("fade");
                var r = "function" == typeof this.options.placement ? this.options.placement.call(this, s[0], this.$element[0]) : this.options.placement,
                    a = /\s?auto?\s?/i,
                    c = a.test(r);
                c && (r = r.replace(a, "") || "top"), s.detach().css({
                    top: 0,
                    left: 0,
                    display: "block"
                }).addClass(r).data("bs." + this.type, this), this.options.container ? s.appendTo(t(document).find(this.options.container)) : s.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
                var h = this.getPosition(),
                    u = s[0].offsetWidth,
                    d = s[0].offsetHeight;
                if (c) {
                    var p = r,
                        f = this.getPosition(this.$viewport);
                    r = "bottom" == r && h.bottom + d > f.bottom ? "top" : "top" == r && h.top - d < f.top ? "bottom" : "right" == r && h.right + u > f.width ? "left" : "left" == r && h.left - u < f.left ? "right" : r, s.removeClass(p).addClass(r)
                }
                var m = this.getCalculatedOffset(r, h, u, d);
                this.applyPlacement(m, r);
                var g = function () {
                    var t = n.hoverState;
                    n.$element.trigger("shown.bs." + n.type), n.hoverState = null, "out" == t && n.leave(n)
                };
                t.support.transition && this.$tip.hasClass("fade") ? s.one("bsTransitionEnd", g).emulateTransitionEnd(l.TRANSITION_DURATION) : g()
            }
        }, l.prototype.applyPlacement = function (e, i) {
            var n = this.tip(),
                s = n[0].offsetWidth,
                o = n[0].offsetHeight,
                r = parseInt(n.css("margin-top"), 10),
                a = parseInt(n.css("margin-left"), 10);
            isNaN(r) && (r = 0), isNaN(a) && (a = 0), e.top += r, e.left += a, t.offset.setOffset(n[0], t.extend({
                using: function (t) {
                    n.css({
                        top: Math.round(t.top),
                        left: Math.round(t.left)
                    })
                }
            }, e), 0), n.addClass("in");
            var l = n[0].offsetWidth,
                c = n[0].offsetHeight;
            "top" == i && c != o && (e.top = e.top + o - c);
            var h = this.getViewportAdjustedDelta(i, e, l, c);
            h.left ? e.left += h.left : e.top += h.top;
            var u = /top|bottom/.test(i),
                d = u ? 2 * h.left - s + l : 2 * h.top - o + c,
                p = u ? "offsetWidth" : "offsetHeight";
            n.offset(e), this.replaceArrow(d, n[0][p], u)
        }, l.prototype.replaceArrow = function (t, e, i) {
            this.arrow().css(i ? "left" : "top", 50 * (1 - t / e) + "%").css(i ? "top" : "left", "")
        }, l.prototype.setContent = function () {
            var t = this.tip(),
                e = this.getTitle();
            this.options.html ? (this.options.sanitize && (e = a(e, this.options.whiteList, this.options.sanitizeFn)), t.find(".tooltip-inner").html(e)) : t.find(".tooltip-inner").text(e), t.removeClass("fade in top bottom left right")
        }, l.prototype.hide = function (e) {
            var i = this,
                n = t(this.$tip),
                s = t.Event("hide.bs." + this.type);

            function o() {
                "in" != i.hoverState && n.detach(), i.$element && i.$element.removeAttr("aria-describedby").trigger("hidden.bs." + i.type), e && e()
            }
            if (this.$element.trigger(s), !s.isDefaultPrevented()) return n.removeClass("in"), t.support.transition && n.hasClass("fade") ? n.one("bsTransitionEnd", o).emulateTransitionEnd(l.TRANSITION_DURATION) : o(), this.hoverState = null, this
        }, l.prototype.fixTitle = function () {
            var t = this.$element;
            (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
        }, l.prototype.hasContent = function () {
            return this.getTitle()
        }, l.prototype.getPosition = function (e) {
            var i = (e = e || this.$element)[0],
                n = "BODY" == i.tagName,
                s = i.getBoundingClientRect();
            null == s.width && (s = t.extend({}, s, {
                width: s.right - s.left,
                height: s.bottom - s.top
            }));
            var o = window.SVGElement && i instanceof window.SVGElement,
                r = n ? {
                    top: 0,
                    left: 0
                } : o ? null : e.offset(),
                a = {
                    scroll: n ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()
                },
                l = n ? {
                    width: t(window).width(),
                    height: t(window).height()
                } : null;
            return t.extend({}, s, a, l, r)
        }, l.prototype.getCalculatedOffset = function (t, e, i, n) {
            return "bottom" == t ? {
                top: e.top + e.height,
                left: e.left + e.width / 2 - i / 2
            } : "top" == t ? {
                top: e.top - n,
                left: e.left + e.width / 2 - i / 2
            } : "left" == t ? {
                top: e.top + e.height / 2 - n / 2,
                left: e.left - i
            } : {
                top: e.top + e.height / 2 - n / 2,
                left: e.left + e.width
            }
        }, l.prototype.getViewportAdjustedDelta = function (t, e, i, n) {
            var s = {
                top: 0,
                left: 0
            };
            if (!this.$viewport) return s;
            var o = this.options.viewport && this.options.viewport.padding || 0,
                r = this.getPosition(this.$viewport);
            if (/right|left/.test(t)) {
                var a = e.top - o - r.scroll,
                    l = e.top + o - r.scroll + n;
                a < r.top ? s.top = r.top - a : l > r.top + r.height && (s.top = r.top + r.height - l)
            } else {
                var c = e.left - o,
                    h = e.left + o + i;
                c < r.left ? s.left = r.left - c : h > r.right && (s.left = r.left + r.width - h)
            }
            return s
        }, l.prototype.getTitle = function () {
            var t = this.$element,
                e = this.options;
            return t.attr("data-original-title") || ("function" == typeof e.title ? e.title.call(t[0]) : e.title)
        }, l.prototype.getUID = function (t) {
            do {
                t += ~~(1e6 * Math.random())
            } while (document.getElementById(t));
            return t
        }, l.prototype.tip = function () {
            if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
            return this.$tip
        }, l.prototype.arrow = function () {
            return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
        }, l.prototype.enable = function () {
            this.enabled = !0
        }, l.prototype.disable = function () {
            this.enabled = !1
        }, l.prototype.toggleEnabled = function () {
            this.enabled = !this.enabled
        }, l.prototype.toggle = function (e) {
            var i = this;
            e && ((i = t(e.currentTarget).data("bs." + this.type)) || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i))), e ? (i.inState.click = !i.inState.click, i.isInStateTrue() ? i.enter(i) : i.leave(i)) : i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
        }, l.prototype.destroy = function () {
            var t = this;
            clearTimeout(this.timeout), this.hide(function () {
                t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null, t.$element = null
            })
        }, l.prototype.sanitizeHtml = function (t) {
            return a(t, this.options.whiteList, this.options.sanitizeFn)
        };
        var c = t.fn.tooltip;
        t.fn.tooltip = function (e) {
            return this.each(function () {
                var i = t(this),
                    n = i.data("bs.tooltip"),
                    s = "object" == typeof e && e;
                !n && /destroy|hide/.test(e) || (n || i.data("bs.tooltip", n = new l(this, s)), "string" == typeof e && n[e]())
            })
        }, t.fn.tooltip.Constructor = l, t.fn.tooltip.noConflict = function () {
            return t.fn.tooltip = c, this
        }
    }(jQuery),
    function (t) {
        "use strict";
        var e = function (t, e) {
            this.init("popover", t, e)
        };
        if (!t.fn.tooltip) throw new Error("Popover requires tooltip.js");
        e.VERSION = "3.4.1", e.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, {
            placement: "right",
            trigger: "click",
            content: "",
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
        }), e.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype), e.prototype.constructor = e, e.prototype.getDefaults = function () {
            return e.DEFAULTS
        }, e.prototype.setContent = function () {
            var t = this.tip(),
                e = this.getTitle(),
                i = this.getContent();
            if (this.options.html) {
                var n = typeof i;
                this.options.sanitize && (e = this.sanitizeHtml(e), "string" === n && (i = this.sanitizeHtml(i))), t.find(".popover-title").html(e), t.find(".popover-content").children().detach().end()["string" === n ? "html" : "append"](i)
            } else t.find(".popover-title").text(e), t.find(".popover-content").children().detach().end().text(i);
            t.removeClass("fade top bottom left right in"), t.find(".popover-title").html() || t.find(".popover-title").hide()
        }, e.prototype.hasContent = function () {
            return this.getTitle() || this.getContent()
        }, e.prototype.getContent = function () {
            var t = this.$element,
                e = this.options;
            return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
        }, e.prototype.arrow = function () {
            return this.$arrow = this.$arrow || this.tip().find(".arrow")
        };
        var i = t.fn.popover;
        t.fn.popover = function (i) {
            return this.each(function () {
                var n = t(this),
                    s = n.data("bs.popover"),
                    o = "object" == typeof i && i;
                !s && /destroy|hide/.test(i) || (s || n.data("bs.popover", s = new e(this, o)), "string" == typeof i && s[i]())
            })
        }, t.fn.popover.Constructor = e, t.fn.popover.noConflict = function () {
            return t.fn.popover = i, this
        }
    }(jQuery),
    function (t) {
        "use strict";

        function e(i, n) {
            this.$body = t(document.body), this.$scrollElement = t(i).is(document.body) ? t(window) : t(i), this.options = t.extend({}, e.DEFAULTS, n), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)), this.refresh(), this.process()
        }

        function i(i) {
            return this.each(function () {
                var n = t(this),
                    s = n.data("bs.scrollspy"),
                    o = "object" == typeof i && i;
                s || n.data("bs.scrollspy", s = new e(this, o)), "string" == typeof i && s[i]()
            })
        }
        e.VERSION = "3.4.1", e.DEFAULTS = {
            offset: 10
        }, e.prototype.getScrollHeight = function () {
            return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
        }, e.prototype.refresh = function () {
            var e = this,
                i = "offset",
                n = 0;
            this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), t.isWindow(this.$scrollElement[0]) || (i = "position", n = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function () {
                var e = t(this),
                    s = e.data("target") || e.attr("href"),
                    o = /^#./.test(s) && t(s);
                return o && o.length && o.is(":visible") && [
                    [o[i]().top + n, s]
                ] || null
            }).sort(function (t, e) {
                return t[0] - e[0]
            }).each(function () {
                e.offsets.push(this[0]), e.targets.push(this[1])
            })
        }, e.prototype.process = function () {
            var t, e = this.$scrollElement.scrollTop() + this.options.offset,
                i = this.getScrollHeight(),
                n = this.options.offset + i - this.$scrollElement.height(),
                s = this.offsets,
                o = this.targets,
                r = this.activeTarget;
            if (this.scrollHeight != i && this.refresh(), e >= n) return r != (t = o[o.length - 1]) && this.activate(t);
            if (r && e < s[0]) return this.activeTarget = null, this.clear();
            for (t = s.length; t--;) r != o[t] && e >= s[t] && (void 0 === s[t + 1] || e < s[t + 1]) && this.activate(o[t])
        }, e.prototype.activate = function (e) {
            this.activeTarget = e, this.clear();
            var i = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]',
                n = t(i).parents("li").addClass("active");
            n.parent(".dropdown-menu").length && (n = n.closest("li.dropdown").addClass("active")), n.trigger("activate.bs.scrollspy")
        }, e.prototype.clear = function () {
            t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
        };
        var n = t.fn.scrollspy;
        t.fn.scrollspy = i, t.fn.scrollspy.Constructor = e, t.fn.scrollspy.noConflict = function () {
            return t.fn.scrollspy = n, this
        }, t(window).on("load.bs.scrollspy.data-api", function () {
            t('[data-spy="scroll"]').each(function () {
                var e = t(this);
                i.call(e, e.data())
            })
        })
    }(jQuery),
    function (t) {
        "use strict";
        var e = function (e) {
            this.element = t(e)
        };

        function i(i) {
            return this.each(function () {
                var n = t(this),
                    s = n.data("bs.tab");
                s || n.data("bs.tab", s = new e(this)), "string" == typeof i && s[i]()
            })
        }
        e.VERSION = "3.4.1", e.TRANSITION_DURATION = 150, e.prototype.show = function () {
            var e = this.element,
                i = e.closest("ul:not(.dropdown-menu)"),
                n = e.data("target");
            if (n || (n = (n = e.attr("href")) && n.replace(/.*(?=#[^\s]*$)/, "")), !e.parent("li").hasClass("active")) {
                var s = i.find(".active:last a"),
                    o = t.Event("hide.bs.tab", {
                        relatedTarget: e[0]
                    }),
                    r = t.Event("show.bs.tab", {
                        relatedTarget: s[0]
                    });
                if (s.trigger(o), e.trigger(r), !r.isDefaultPrevented() && !o.isDefaultPrevented()) {
                    var a = t(document).find(n);
                    this.activate(e.closest("li"), i), this.activate(a, a.parent(), function () {
                        s.trigger({
                            type: "hidden.bs.tab",
                            relatedTarget: e[0]
                        }), e.trigger({
                            type: "shown.bs.tab",
                            relatedTarget: s[0]
                        })
                    })
                }
            }
        }, e.prototype.activate = function (i, n, s) {
            var o = n.find("> .active"),
                r = s && t.support.transition && (o.length && o.hasClass("fade") || !!n.find("> .fade").length);

            function a() {
                o.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), i.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), r ? (i[0].offsetWidth, i.addClass("in")) : i.removeClass("fade"), i.parent(".dropdown-menu").length && i.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), s && s()
            }
            o.length && r ? o.one("bsTransitionEnd", a).emulateTransitionEnd(e.TRANSITION_DURATION) : a(), o.removeClass("in")
        };
        var n = t.fn.tab;
        t.fn.tab = i, t.fn.tab.Constructor = e, t.fn.tab.noConflict = function () {
            return t.fn.tab = n, this
        };
        var s = function (e) {
            e.preventDefault(), i.call(t(this), "show")
        };
        t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', s).on("click.bs.tab.data-api", '[data-toggle="pill"]', s)
    }(jQuery),
    function (t) {
        "use strict";
        var e = function (i, n) {
            this.options = t.extend({}, e.DEFAULTS, n);
            var s = this.options.target === e.DEFAULTS.target ? t(this.options.target) : t(document).find(this.options.target);
            this.$target = s.on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)), this.$element = t(i), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
        };

        function i(i) {
            return this.each(function () {
                var n = t(this),
                    s = n.data("bs.affix"),
                    o = "object" == typeof i && i;
                s || n.data("bs.affix", s = new e(this, o)), "string" == typeof i && s[i]()
            })
        }
        e.VERSION = "3.4.1", e.RESET = "affix affix-top affix-bottom", e.DEFAULTS = {
            offset: 0,
            target: window
        }, e.prototype.getState = function (t, e, i, n) {
            var s = this.$target.scrollTop(),
                o = this.$element.offset(),
                r = this.$target.height();
            if (null != i && "top" == this.affixed) return s < i && "top";
            if ("bottom" == this.affixed) return null != i ? !(s + this.unpin <= o.top) && "bottom" : !(s + r <= t - n) && "bottom";
            var a = null == this.affixed,
                l = a ? s : o.top;
            return null != i && s <= i ? "top" : null != n && l + (a ? r : e) >= t - n && "bottom"
        }, e.prototype.getPinnedOffset = function () {
            if (this.pinnedOffset) return this.pinnedOffset;
            this.$element.removeClass(e.RESET).addClass("affix");
            var t = this.$target.scrollTop(),
                i = this.$element.offset();
            return this.pinnedOffset = i.top - t
        }, e.prototype.checkPositionWithEventLoop = function () {
            setTimeout(t.proxy(this.checkPosition, this), 1)
        }, e.prototype.checkPosition = function () {
            if (this.$element.is(":visible")) {
                var i = this.$element.height(),
                    n = this.options.offset,
                    s = n.top,
                    o = n.bottom,
                    r = Math.max(t(document).height(), t(document.body).height());
                "object" != typeof n && (o = s = n), "function" == typeof s && (s = n.top(this.$element)), "function" == typeof o && (o = n.bottom(this.$element));
                var a = this.getState(r, i, s, o);
                if (this.affixed != a) {
                    null != this.unpin && this.$element.css("top", "");
                    var l = "affix" + (a ? "-" + a : ""),
                        c = t.Event(l + ".bs.affix");
                    if (this.$element.trigger(c), c.isDefaultPrevented()) return;
                    this.affixed = a, this.unpin = "bottom" == a ? this.getPinnedOffset() : null, this.$element.removeClass(e.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
                }
                "bottom" == a && this.$element.offset({
                    top: r - i - o
                })
            }
        };
        var n = t.fn.affix;
        t.fn.affix = i, t.fn.affix.Constructor = e, t.fn.affix.noConflict = function () {
            return t.fn.affix = n, this
        }, t(window).on("load", function () {
            t('[data-spy="affix"]').each(function () {
                var e = t(this),
                    n = e.data();
                n.offset = n.offset || {}, null != n.offsetBottom && (n.offset.bottom = n.offsetBottom), null != n.offsetTop && (n.offset.top = n.offsetTop), i.call(e, n)
            })
        })
    }(jQuery),
    function (t) {
        "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof module && module.exports ? module.exports = function (e, i) {
            return void 0 === i && (i = "undefined" != typeof window ? require("jquery") : require("jquery")(e)), t(i), i
        } : t(jQuery)
    }(function (t) {
        var e = function () {
                if (t && t.fn && t.fn.select2 && t.fn.select2.amd) var e = t.fn.select2.amd;
                var i, n, s;
                return e && e.requirejs || (e ? n = e : e = {}, function (t) {
                    var e, o, r, a, l = {},
                        c = {},
                        h = {},
                        u = {},
                        d = Object.prototype.hasOwnProperty,
                        p = [].slice,
                        f = /\.js$/;

                    function m(t, e) {
                        return d.call(t, e)
                    }

                    function g(t, e) {
                        var i, n, s, o, r, a, l, c, u, d, p, m = e && e.split("/"),
                            g = h.map,
                            v = g && g["*"] || {};
                        if (t) {
                            for (r = (t = t.split("/")).length - 1, h.nodeIdCompat && f.test(t[r]) && (t[r] = t[r].replace(f, "")), "." === t[0].charAt(0) && m && (t = m.slice(0, m.length - 1).concat(t)), u = 0; u < t.length; u++)
                                if ("." === (p = t[u])) t.splice(u, 1), u -= 1;
                                else if (".." === p) {
                                if (0 === u || 1 === u && ".." === t[2] || ".." === t[u - 1]) continue;
                                u > 0 && (t.splice(u - 1, 2), u -= 2)
                            }
                            t = t.join("/")
                        }
                        if ((m || v) && g) {
                            for (u = (i = t.split("/")).length; u > 0; u -= 1) {
                                if (n = i.slice(0, u).join("/"), m)
                                    for (d = m.length; d > 0; d -= 1)
                                        if ((s = g[m.slice(0, d).join("/")]) && (s = s[n])) {
                                            o = s, a = u;
                                            break
                                        } if (o) break;
                                !l && v && v[n] && (l = v[n], c = u)
                            }!o && l && (o = l, a = c), o && (i.splice(0, a, o), t = i.join("/"))
                        }
                        return t
                    }

                    function v(e, i) {
                        return function () {
                            var n = p.call(arguments, 0);
                            return "string" != typeof n[0] && 1 === n.length && n.push(null), o.apply(t, n.concat([e, i]))
                        }
                    }

                    function y(t) {
                        return function (e) {
                            l[t] = e
                        }
                    }

                    function w(i) {
                        if (m(c, i)) {
                            var n = c[i];
                            delete c[i], u[i] = !0, e.apply(t, n)
                        }
                        if (!m(l, i) && !m(u, i)) throw new Error("No " + i);
                        return l[i]
                    }

                    function b(t) {
                        var e, i = t ? t.indexOf("!") : -1;
                        return i > -1 && (e = t.substring(0, i), t = t.substring(i + 1, t.length)), [e, t]
                    }

                    function $(t) {
                        return t ? b(t) : []
                    }

                    function C(t) {
                        return function () {
                            return h && h.config && h.config[t] || {}
                        }
                    }
                    r = function (t, e) {
                        var i, n, s = b(t),
                            o = s[0],
                            r = e[1];
                        return t = s[1], o && (i = w(o = g(o, r))), o ? t = i && i.normalize ? i.normalize(t, (n = r, function (t) {
                            return g(t, n)
                        })) : g(t, r) : (o = (s = b(t = g(t, r)))[0], t = s[1], o && (i = w(o))), {
                            f: o ? o + "!" + t : t,
                            n: t,
                            pr: o,
                            p: i
                        }
                    }, a = {
                        require: function (t) {
                            return v(t)
                        },
                        exports: function (t) {
                            var e = l[t];
                            return void 0 !== e ? e : l[t] = {}
                        },
                        module: function (t) {
                            return {
                                id: t,
                                uri: "",
                                exports: l[t],
                                config: C(t)
                            }
                        }
                    }, e = function (e, i, n, s) {
                        var o, h, d, p, f, g, b, C = [],
                            _ = typeof n;
                        if (g = $(s = s || e), "undefined" === _ || "function" === _) {
                            for (i = !i.length && n.length ? ["require", "exports", "module"] : i, f = 0; f < i.length; f += 1)
                                if ("require" === (h = (p = r(i[f], g)).f)) C[f] = a.require(e);
                                else if ("exports" === h) C[f] = a.exports(e), b = !0;
                            else if ("module" === h) o = C[f] = a.module(e);
                            else if (m(l, h) || m(c, h) || m(u, h)) C[f] = w(h);
                            else {
                                if (!p.p) throw new Error(e + " missing " + h);
                                p.p.load(p.n, v(s, !0), y(h), {}), C[f] = l[h]
                            }
                            d = n ? n.apply(l[e], C) : void 0, e && (o && o.exports !== t && o.exports !== l[e] ? l[e] = o.exports : d === t && b || (l[e] = d))
                        } else e && (l[e] = n)
                    }, i = n = o = function (i, n, s, l, c) {
                        if ("string" == typeof i) return a[i] ? a[i](n) : w(r(i, $(n)).f);
                        if (!i.splice) {
                            if ((h = i).deps && o(h.deps, h.callback), !n) return;
                            n.splice ? (i = n, n = s, s = null) : i = t
                        }
                        return n = n || function () {}, "function" == typeof s && (s = l, l = c), l ? e(t, i, n, s) : setTimeout(function () {
                            e(t, i, n, s)
                        }, 4), o
                    }, o.config = function (t) {
                        return o(t)
                    }, i._defined = l, (s = function (t, e, i) {
                        if ("string" != typeof t) throw new Error("See almond README: incorrect module build, no module name");
                        e.splice || (i = e, e = []), m(l, t) || m(c, t) || (c[t] = [t, e, i])
                    }).amd = {
                        jQuery: !0
                    }
                }(), e.requirejs = i, e.require = n, e.define = s), e.define("almond", function () {}), e.define("jquery", [], function () {
                    var e = t || $;
                    return null == e && console && console.error && console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."), e
                }), e.define("select2/utils", ["jquery"], function (t) {
                    var e = {};

                    function i(t) {
                        var e = t.prototype,
                            i = [];
                        for (var n in e) {
                            "function" == typeof e[n] && ("constructor" !== n && i.push(n))
                        }
                        return i
                    }
                    e.Extend = function (t, e) {
                        var i = {}.hasOwnProperty;

                        function n() {
                            this.constructor = t
                        }
                        for (var s in e) i.call(e, s) && (t[s] = e[s]);
                        return n.prototype = e.prototype, t.prototype = new n, t.__super__ = e.prototype, t
                    }, e.Decorate = function (t, e) {
                        var n = i(e),
                            s = i(t);

                        function o() {
                            var i = Array.prototype.unshift,
                                n = e.prototype.constructor.length,
                                s = t.prototype.constructor;
                            n > 0 && (i.call(arguments, t.prototype.constructor), s = e.prototype.constructor), s.apply(this, arguments)
                        }
                        e.displayName = t.displayName, o.prototype = new function () {
                            this.constructor = o
                        };
                        for (var r = 0; r < s.length; r++) {
                            var a = s[r];
                            o.prototype[a] = t.prototype[a]
                        }
                        for (var l = function (t) {
                                var i = function () {};
                                t in o.prototype && (i = o.prototype[t]);
                                var n = e.prototype[t];
                                return function () {
                                    return Array.prototype.unshift.call(arguments, i), n.apply(this, arguments)
                                }
                            }, c = 0; c < n.length; c++) {
                            var h = n[c];
                            o.prototype[h] = l(h)
                        }
                        return o
                    };
                    var n = function () {
                        this.listeners = {}
                    };
                    n.prototype.on = function (t, e) {
                        this.listeners = this.listeners || {}, t in this.listeners ? this.listeners[t].push(e) : this.listeners[t] = [e]
                    }, n.prototype.trigger = function (t) {
                        var e = Array.prototype.slice,
                            i = e.call(arguments, 1);
                        this.listeners = this.listeners || {}, null == i && (i = []), 0 === i.length && i.push({}), i[0]._type = t, t in this.listeners && this.invoke(this.listeners[t], e.call(arguments, 1)), "*" in this.listeners && this.invoke(this.listeners["*"], arguments)
                    }, n.prototype.invoke = function (t, e) {
                        for (var i = 0, n = t.length; i < n; i++) t[i].apply(this, e)
                    }, e.Observable = n, e.generateChars = function (t) {
                        for (var e = "", i = 0; i < t; i++) {
                            e += Math.floor(36 * Math.random()).toString(36)
                        }
                        return e
                    }, e.bind = function (t, e) {
                        return function () {
                            t.apply(e, arguments)
                        }
                    }, e._convertData = function (t) {
                        for (var e in t) {
                            var i = e.split("-"),
                                n = t;
                            if (1 !== i.length) {
                                for (var s = 0; s < i.length; s++) {
                                    var o = i[s];
                                    (o = o.substring(0, 1).toLowerCase() + o.substring(1)) in n || (n[o] = {}), s == i.length - 1 && (n[o] = t[e]), n = n[o]
                                }
                                delete t[e]
                            }
                        }
                        return t
                    }, e.hasScroll = function (e, i) {
                        var n = t(i),
                            s = i.style.overflowX,
                            o = i.style.overflowY;
                        return (s !== o || "hidden" !== o && "visible" !== o) && ("scroll" === s || "scroll" === o || (n.innerHeight() < i.scrollHeight || n.innerWidth() < i.scrollWidth))
                    }, e.escapeMarkup = function (t) {
                        var e = {
                            "\\": "&#92;",
                            "&": "&amp;",
                            "<": "&lt;",
                            ">": "&gt;",
                            '"': "&quot;",
                            "'": "&#39;",
                            "/": "&#47;"
                        };
                        return "string" != typeof t ? t : String(t).replace(/[&<>"'\/\\]/g, function (t) {
                            return e[t]
                        })
                    }, e.appendMany = function (e, i) {
                        if ("1.7" === t.fn.jquery.substr(0, 3)) {
                            var n = t();
                            t.map(i, function (t) {
                                n = n.add(t)
                            }), i = n
                        }
                        e.append(i)
                    }, e.__cache = {};
                    var s = 0;
                    return e.GetUniqueElementId = function (t) {
                        var e = t.getAttribute("data-select2-id");
                        return null == e && (t.id ? (e = t.id, t.setAttribute("data-select2-id", e)) : (t.setAttribute("data-select2-id", ++s), e = s.toString())), e
                    }, e.StoreData = function (t, i, n) {
                        var s = e.GetUniqueElementId(t);
                        e.__cache[s] || (e.__cache[s] = {}), e.__cache[s][i] = n
                    }, e.GetData = function (i, n) {
                        var s = e.GetUniqueElementId(i);
                        return n ? e.__cache[s] && null != e.__cache[s][n] ? e.__cache[s][n] : t(i).data(n) : e.__cache[s]
                    }, e.RemoveData = function (t) {
                        var i = e.GetUniqueElementId(t);
                        null != e.__cache[i] && delete e.__cache[i]
                    }, e
                }), e.define("select2/results", ["jquery", "./utils"], function (t, e) {
                    function i(t, e, n) {
                        this.$element = t, this.data = n, this.options = e, i.__super__.constructor.call(this)
                    }
                    return e.Extend(i, e.Observable), i.prototype.render = function () {
                        var e = t('<ul class="select2-results__options" role="tree"></ul>');
                        return this.options.get("multiple") && e.attr("aria-multiselectable", "true"), this.$results = e, e
                    }, i.prototype.clear = function () {
                        this.$results.empty()
                    }, i.prototype.displayMessage = function (e) {
                        var i = this.options.get("escapeMarkup");
                        this.clear(), this.hideLoading();
                        var n = t('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),
                            s = this.options.get("translations").get(e.message);
                        n.append(i(s(e.args))), n[0].className += " select2-results__message", this.$results.append(n)
                    }, i.prototype.hideMessages = function () {
                        this.$results.find(".select2-results__message").remove()
                    }, i.prototype.append = function (t) {
                        this.hideLoading();
                        var e = [];
                        if (null != t.results && 0 !== t.results.length) {
                            t.results = this.sort(t.results);
                            for (var i = 0; i < t.results.length; i++) {
                                var n = t.results[i],
                                    s = this.option(n);
                                e.push(s)
                            }
                            this.$results.append(e)
                        } else 0 === this.$results.children().length && this.trigger("results:message", {
                            message: "noResults"
                        })
                    }, i.prototype.position = function (t, e) {
                        e.find(".select2-results").append(t)
                    }, i.prototype.sort = function (t) {
                        return this.options.get("sorter")(t)
                    }, i.prototype.highlightFirstItem = function () {
                        var t = this.$results.find(".select2-results__option[aria-selected]"),
                            e = t.filter("[aria-selected=true]");
                        e.length > 0 ? e.first().trigger("mouseenter") : t.first().trigger("mouseenter"), this.ensureHighlightVisible()
                    }, i.prototype.setClasses = function () {
                        var i = this;
                        this.data.current(function (n) {
                            var s = t.map(n, function (t) {
                                return t.id.toString()
                            });
                            i.$results.find(".select2-results__option[aria-selected]").each(function () {
                                var i = t(this),
                                    n = e.GetData(this, "data"),
                                    o = "" + n.id;
                                null != n.element && n.element.selected || null == n.element && t.inArray(o, s) > -1 ? i.attr("aria-selected", "true") : i.attr("aria-selected", "false")
                            })
                        })
                    }, i.prototype.showLoading = function (t) {
                        this.hideLoading();
                        var e = {
                                disabled: !0,
                                loading: !0,
                                text: this.options.get("translations").get("searching")(t)
                            },
                            i = this.option(e);
                        i.className += " loading-results", this.$results.prepend(i)
                    }, i.prototype.hideLoading = function () {
                        this.$results.find(".loading-results").remove()
                    }, i.prototype.option = function (i) {
                        var n = document.createElement("li");
                        n.className = "select2-results__option";
                        var s = {
                            role: "treeitem",
                            "aria-selected": "false"
                        };
                        for (var o in i.disabled && (delete s["aria-selected"], s["aria-disabled"] = "true"), null == i.id && delete s["aria-selected"], null != i._resultId && (n.id = i._resultId), i.title && (n.title = i.title), i.children && (s.role = "group", s["aria-label"] = i.text, delete s["aria-selected"]), s) {
                            var r = s[o];
                            n.setAttribute(o, r)
                        }
                        if (i.children) {
                            var a = t(n),
                                l = document.createElement("strong");
                            l.className = "select2-results__group";
                            t(l);
                            this.template(i, l);
                            for (var c = [], h = 0; h < i.children.length; h++) {
                                var u = i.children[h],
                                    d = this.option(u);
                                c.push(d)
                            }
                            var p = t("<ul></ul>", {
                                class: "select2-results__options select2-results__options--nested"
                            });
                            p.append(c), a.append(l), a.append(p)
                        } else this.template(i, n);
                        return e.StoreData(n, "data", i), n
                    }, i.prototype.bind = function (i, n) {
                        var s = this,
                            o = i.id + "-results";
                        this.$results.attr("id", o), i.on("results:all", function (t) {
                            s.clear(), s.append(t.data), i.isOpen() && (s.setClasses(), s.highlightFirstItem())
                        }), i.on("results:append", function (t) {
                            s.append(t.data), i.isOpen() && s.setClasses()
                        }), i.on("query", function (t) {
                            s.hideMessages(), s.showLoading(t)
                        }), i.on("select", function () {
                            i.isOpen() && (s.setClasses(), s.highlightFirstItem())
                        }), i.on("unselect", function () {
                            i.isOpen() && (s.setClasses(), s.highlightFirstItem())
                        }), i.on("open", function () {
                            s.$results.attr("aria-expanded", "true"), s.$results.attr("aria-hidden", "false"), s.setClasses(), s.ensureHighlightVisible()
                        }), i.on("close", function () {
                            s.$results.attr("aria-expanded", "false"), s.$results.attr("aria-hidden", "true"), s.$results.removeAttr("aria-activedescendant")
                        }), i.on("results:toggle", function () {
                            var t = s.getHighlightedResults();
                            0 !== t.length && t.trigger("mouseup")
                        }), i.on("results:select", function () {
                            var t = s.getHighlightedResults();
                            if (0 !== t.length) {
                                var i = e.GetData(t[0], "data");
                                "true" == t.attr("aria-selected") ? s.trigger("close", {}) : s.trigger("select", {
                                    data: i
                                })
                            }
                        }), i.on("results:previous", function () {
                            var t = s.getHighlightedResults(),
                                e = s.$results.find("[aria-selected]"),
                                i = e.index(t);
                            if (!(i <= 0)) {
                                var n = i - 1;
                                0 === t.length && (n = 0);
                                var o = e.eq(n);
                                o.trigger("mouseenter");
                                var r = s.$results.offset().top,
                                    a = o.offset().top,
                                    l = s.$results.scrollTop() + (a - r);
                                0 === n ? s.$results.scrollTop(0) : a - r < 0 && s.$results.scrollTop(l)
                            }
                        }), i.on("results:next", function () {
                            var t = s.getHighlightedResults(),
                                e = s.$results.find("[aria-selected]"),
                                i = e.index(t) + 1;
                            if (!(i >= e.length)) {
                                var n = e.eq(i);
                                n.trigger("mouseenter");
                                var o = s.$results.offset().top + s.$results.outerHeight(!1),
                                    r = n.offset().top + n.outerHeight(!1),
                                    a = s.$results.scrollTop() + r - o;
                                0 === i ? s.$results.scrollTop(0) : r > o && s.$results.scrollTop(a)
                            }
                        }), i.on("results:focus", function (t) {
                            t.element.addClass("select2-results__option--highlighted")
                        }), i.on("results:message", function (t) {
                            s.displayMessage(t)
                        }), t.fn.mousewheel && this.$results.on("mousewheel", function (t) {
                            var e = s.$results.scrollTop(),
                                i = s.$results.get(0).scrollHeight - e + t.deltaY,
                                n = t.deltaY > 0 && e - t.deltaY <= 0,
                                o = t.deltaY < 0 && i <= s.$results.height();
                            n ? (s.$results.scrollTop(0), t.preventDefault(), t.stopPropagation()) : o && (s.$results.scrollTop(s.$results.get(0).scrollHeight - s.$results.height()), t.preventDefault(), t.stopPropagation())
                        }), this.$results.on("mouseup", ".select2-results__option[aria-selected]", function (i) {
                            var n = t(this),
                                o = e.GetData(this, "data");
                            "true" !== n.attr("aria-selected") ? s.trigger("select", {
                                originalEvent: i,
                                data: o
                            }) : s.options.get("multiple") ? s.trigger("unselect", {
                                originalEvent: i,
                                data: o
                            }) : s.trigger("close", {})
                        }), this.$results.on("mouseenter", ".select2-results__option[aria-selected]", function (i) {
                            var n = e.GetData(this, "data");
                            s.getHighlightedResults().removeClass("select2-results__option--highlighted"), s.trigger("results:focus", {
                                data: n,
                                element: t(this)
                            })
                        })
                    }, i.prototype.getHighlightedResults = function () {
                        return this.$results.find(".select2-results__option--highlighted")
                    }, i.prototype.destroy = function () {
                        this.$results.remove()
                    }, i.prototype.ensureHighlightVisible = function () {
                        var t = this.getHighlightedResults();
                        if (0 !== t.length) {
                            var e = this.$results.find("[aria-selected]").index(t),
                                i = this.$results.offset().top,
                                n = t.offset().top,
                                s = this.$results.scrollTop() + (n - i),
                                o = n - i;
                            s -= 2 * t.outerHeight(!1), e <= 2 ? this.$results.scrollTop(0) : (o > this.$results.outerHeight() || o < 0) && this.$results.scrollTop(s)
                        }
                    }, i.prototype.template = function (e, i) {
                        var n = this.options.get("templateResult"),
                            s = this.options.get("escapeMarkup"),
                            o = n(e, i);
                        null == o ? i.style.display = "none" : "string" == typeof o ? i.innerHTML = s(o) : t(i).append(o)
                    }, i
                }), e.define("select2/keys", [], function () {
                    return {
                        BACKSPACE: 8,
                        TAB: 9,
                        ENTER: 13,
                        SHIFT: 16,
                        CTRL: 17,
                        ALT: 18,
                        ESC: 27,
                        SPACE: 32,
                        PAGE_UP: 33,
                        PAGE_DOWN: 34,
                        END: 35,
                        HOME: 36,
                        LEFT: 37,
                        UP: 38,
                        RIGHT: 39,
                        DOWN: 40,
                        DELETE: 46
                    }
                }), e.define("select2/selection/base", ["jquery", "../utils", "../keys"], function (t, e, i) {
                    function n(t, e) {
                        this.$element = t, this.options = e, n.__super__.constructor.call(this)
                    }
                    return e.Extend(n, e.Observable), n.prototype.render = function () {
                        var i = t('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');
                        return this._tabindex = 0, null != e.GetData(this.$element[0], "old-tabindex") ? this._tabindex = e.GetData(this.$element[0], "old-tabindex") : null != this.$element.attr("tabindex") && (this._tabindex = this.$element.attr("tabindex")), i.attr("title", this.$element.attr("title")), i.attr("tabindex", this._tabindex), this.$selection = i, i
                    }, n.prototype.bind = function (t, e) {
                        var n = this,
                            s = (t.id, t.id + "-results");
                        this.container = t, this.$selection.on("focus", function (t) {
                            n.trigger("focus", t)
                        }), this.$selection.on("blur", function (t) {
                            n._handleBlur(t)
                        }), this.$selection.on("keydown", function (t) {
                            n.trigger("keypress", t), t.which === i.SPACE && t.preventDefault()
                        }), t.on("results:focus", function (t) {
                            n.$selection.attr("aria-activedescendant", t.data._resultId)
                        }), t.on("selection:update", function (t) {
                            n.update(t.data)
                        }), t.on("open", function () {
                            n.$selection.attr("aria-expanded", "true"), n.$selection.attr("aria-owns", s), n._attachCloseHandler(t)
                        }), t.on("close", function () {
                            n.$selection.attr("aria-expanded", "false"), n.$selection.removeAttr("aria-activedescendant"), n.$selection.removeAttr("aria-owns"), n.$selection.focus(), window.setTimeout(function () {
                                n.$selection.focus()
                            }, 0), n._detachCloseHandler(t)
                        }), t.on("enable", function () {
                            n.$selection.attr("tabindex", n._tabindex)
                        }), t.on("disable", function () {
                            n.$selection.attr("tabindex", "-1")
                        })
                    }, n.prototype._handleBlur = function (e) {
                        var i = this;
                        window.setTimeout(function () {
                            document.activeElement == i.$selection[0] || t.contains(i.$selection[0], document.activeElement) || i.trigger("blur", e)
                        }, 1)
                    }, n.prototype._attachCloseHandler = function (i) {
                        t(document.body).on("mousedown.select2." + i.id, function (i) {
                            var n = t(i.target).closest(".select2");
                            t(".select2.select2-container--open").each(function () {
                                t(this);
                                this != n[0] && e.GetData(this, "element").select2("close")
                            })
                        })
                    }, n.prototype._detachCloseHandler = function (e) {
                        t(document.body).off("mousedown.select2." + e.id)
                    }, n.prototype.position = function (t, e) {
                        e.find(".selection").append(t)
                    }, n.prototype.destroy = function () {
                        this._detachCloseHandler(this.container)
                    }, n.prototype.update = function (t) {
                        throw new Error("The `update` method must be defined in child classes.")
                    }, n
                }), e.define("select2/selection/single", ["jquery", "./base", "../utils", "../keys"], function (t, e, i, n) {
                    function s() {
                        s.__super__.constructor.apply(this, arguments)
                    }
                    return i.Extend(s, e), s.prototype.render = function () {
                        var t = s.__super__.render.call(this);
                        return t.addClass("select2-selection--single"), t.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'), t
                    }, s.prototype.bind = function (t, e) {
                        var i = this;
                        s.__super__.bind.apply(this, arguments);
                        var n = t.id + "-container";
                        this.$selection.find(".select2-selection__rendered").attr("id", n).attr("role", "textbox").attr("aria-readonly", "true"), this.$selection.attr("aria-labelledby", n), this.$selection.on("mousedown", function (t) {
                            1 === t.which && i.trigger("toggle", {
                                originalEvent: t
                            })
                        }), this.$selection.on("focus", function (t) {}), this.$selection.on("blur", function (t) {}), t.on("focus", function (e) {
                            t.isOpen() || i.$selection.focus()
                        })
                    }, s.prototype.clear = function () {
                        var t = this.$selection.find(".select2-selection__rendered");
                        t.empty(), t.removeAttr("title")
                    }, s.prototype.display = function (t, e) {
                        var i = this.options.get("templateSelection");
                        return this.options.get("escapeMarkup")(i(t, e))
                    }, s.prototype.selectionContainer = function () {
                        return t("<span></span>")
                    }, s.prototype.update = function (t) {
                        if (0 !== t.length) {
                            var e = t[0],
                                i = this.$selection.find(".select2-selection__rendered"),
                                n = this.display(e, i);
                            i.empty().append(n), i.attr("title", e.title || e.text)
                        } else this.clear()
                    }, s
                }), e.define("select2/selection/multiple", ["jquery", "./base", "../utils"], function (t, e, i) {
                    function n(t, e) {
                        n.__super__.constructor.apply(this, arguments)
                    }
                    return i.Extend(n, e), n.prototype.render = function () {
                        var t = n.__super__.render.call(this);
                        return t.addClass("select2-selection--multiple"), t.html('<ul class="select2-selection__rendered"></ul>'), t
                    }, n.prototype.bind = function (e, s) {
                        var o = this;
                        n.__super__.bind.apply(this, arguments), this.$selection.on("click", function (t) {
                            o.trigger("toggle", {
                                originalEvent: t
                            })
                        }), this.$selection.on("click", ".select2-selection__choice__remove", function (e) {
                            if (!o.options.get("disabled")) {
                                var n = t(this).parent(),
                                    s = i.GetData(n[0], "data");
                                o.trigger("unselect", {
                                    originalEvent: e,
                                    data: s
                                })
                            }
                        })
                    }, n.prototype.clear = function () {
                        var t = this.$selection.find(".select2-selection__rendered");
                        t.empty(), t.removeAttr("title")
                    }, n.prototype.display = function (t, e) {
                        var i = this.options.get("templateSelection");
                        return this.options.get("escapeMarkup")(i(t, e))
                    }, n.prototype.selectionContainer = function () {
                        return t('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>')
                    }, n.prototype.update = function (t) {
                        if (this.clear(), 0 !== t.length) {
                            for (var e = [], n = 0; n < t.length; n++) {
                                var s = t[n],
                                    o = this.selectionContainer(),
                                    r = this.display(s, o);
                                o.append(r), o.attr("title", s.title || s.text), i.StoreData(o[0], "data", s), e.push(o)
                            }
                            var a = this.$selection.find(".select2-selection__rendered");
                            i.appendMany(a, e)
                        }
                    }, n
                }), e.define("select2/selection/placeholder", ["../utils"], function (t) {
                    function e(t, e, i) {
                        this.placeholder = this.normalizePlaceholder(i.get("placeholder")), t.call(this, e, i)
                    }
                    return e.prototype.normalizePlaceholder = function (t, e) {
                        return "string" == typeof e && (e = {
                            id: "",
                            text: e
                        }), e
                    }, e.prototype.createPlaceholder = function (t, e) {
                        var i = this.selectionContainer();
                        return i.html(this.display(e)), i.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"), i
                    }, e.prototype.update = function (t, e) {
                        var i = 1 == e.length && e[0].id != this.placeholder.id;
                        if (e.length > 1 || i) return t.call(this, e);
                        this.clear();
                        var n = this.createPlaceholder(this.placeholder);
                        this.$selection.find(".select2-selection__rendered").append(n)
                    }, e
                }), e.define("select2/selection/allowClear", ["jquery", "../keys", "../utils"], function (t, e, i) {
                    function n() {}
                    return n.prototype.bind = function (t, e, i) {
                        var n = this;
                        t.call(this, e, i), null == this.placeholder && this.options.get("debug") && window.console && console.error && console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."), this.$selection.on("mousedown", ".select2-selection__clear", function (t) {
                            n._handleClear(t)
                        }), e.on("keypress", function (t) {
                            n._handleKeyboardClear(t, e)
                        })
                    }, n.prototype._handleClear = function (t, e) {
                        if (!this.options.get("disabled")) {
                            var n = this.$selection.find(".select2-selection__clear");
                            if (0 !== n.length) {
                                e.stopPropagation();
                                var s = i.GetData(n[0], "data"),
                                    o = this.$element.val();
                                this.$element.val(this.placeholder.id);
                                var r = {
                                    data: s
                                };
                                if (this.trigger("clear", r), r.prevented) this.$element.val(o);
                                else {
                                    for (var a = 0; a < s.length; a++)
                                        if (r = {
                                                data: s[a]
                                            }, this.trigger("unselect", r), r.prevented) return void this.$element.val(o);
                                    this.$element.trigger("change"), this.trigger("toggle", {})
                                }
                            }
                        }
                    }, n.prototype._handleKeyboardClear = function (t, i, n) {
                        n.isOpen() || i.which != e.DELETE && i.which != e.BACKSPACE || this._handleClear(i)
                    }, n.prototype.update = function (e, n) {
                        if (e.call(this, n), !(this.$selection.find(".select2-selection__placeholder").length > 0 || 0 === n.length)) {
                            var s = t('<span class="select2-selection__clear">&times;</span>');
                            i.StoreData(s[0], "data", n), this.$selection.find(".select2-selection__rendered").prepend(s)
                        }
                    }, n
                }), e.define("select2/selection/search", ["jquery", "../utils", "../keys"], function (t, e, i) {
                    function n(t, e, i) {
                        t.call(this, e, i)
                    }
                    return n.prototype.render = function (e) {
                        var i = t('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');
                        this.$searchContainer = i, this.$search = i.find("input");
                        var n = e.call(this);
                        return this._transferTabIndex(), n
                    }, n.prototype.bind = function (t, n, s) {
                        var o = this;
                        t.call(this, n, s), n.on("open", function () {
                            o.$search.trigger("focus")
                        }), n.on("close", function () {
                            o.$search.val(""), o.$search.removeAttr("aria-activedescendant"), o.$search.trigger("focus")
                        }), n.on("enable", function () {
                            o.$search.prop("disabled", !1), o._transferTabIndex()
                        }), n.on("disable", function () {
                            o.$search.prop("disabled", !0)
                        }), n.on("focus", function (t) {
                            o.$search.trigger("focus")
                        }), n.on("results:focus", function (t) {
                            o.$search.attr("aria-activedescendant", t.id)
                        }), this.$selection.on("focusin", ".select2-search--inline", function (t) {
                            o.trigger("focus", t)
                        }), this.$selection.on("focusout", ".select2-search--inline", function (t) {
                            o._handleBlur(t)
                        }), this.$selection.on("keydown", ".select2-search--inline", function (t) {
                            if (t.stopPropagation(), o.trigger("keypress", t), o._keyUpPrevented = t.isDefaultPrevented(), t.which === i.BACKSPACE && "" === o.$search.val()) {
                                var n = o.$searchContainer.prev(".select2-selection__choice");
                                if (n.length > 0) {
                                    var s = e.GetData(n[0], "data");
                                    o.searchRemoveChoice(s), t.preventDefault()
                                }
                            }
                        });
                        var r = document.documentMode,
                            a = r && r <= 11;
                        this.$selection.on("input.searchcheck", ".select2-search--inline", function (t) {
                            a ? o.$selection.off("input.search input.searchcheck") : o.$selection.off("keyup.search")
                        }), this.$selection.on("keyup.search input.search", ".select2-search--inline", function (t) {
                            if (a && "input" === t.type) o.$selection.off("input.search input.searchcheck");
                            else {
                                var e = t.which;
                                e != i.SHIFT && e != i.CTRL && e != i.ALT && e != i.TAB && o.handleSearch(t)
                            }
                        })
                    }, n.prototype._transferTabIndex = function (t) {
                        this.$search.attr("tabindex", this.$selection.attr("tabindex")), this.$selection.attr("tabindex", "-1")
                    }, n.prototype.createPlaceholder = function (t, e) {
                        this.$search.attr("placeholder", e.text)
                    }, n.prototype.update = function (t, e) {
                        var i = this.$search[0] == document.activeElement;
                        (this.$search.attr("placeholder", ""), t.call(this, e), this.$selection.find(".select2-selection__rendered").append(this.$searchContainer), this.resizeSearch(), i) && (this.$element.find("[data-select2-tag]").length ? this.$element.focus() : this.$search.focus())
                    }, n.prototype.handleSearch = function () {
                        if (this.resizeSearch(), !this._keyUpPrevented) {
                            var t = this.$search.val();
                            this.trigger("query", {
                                term: t
                            })
                        }
                        this._keyUpPrevented = !1
                    }, n.prototype.searchRemoveChoice = function (t, e) {
                        this.trigger("unselect", {
                            data: e
                        }), this.$search.val(e.text), this.handleSearch()
                    }, n.prototype.resizeSearch = function () {
                        this.$search.css("width", "25px");
                        var t = "";
                        "" !== this.$search.attr("placeholder") ? t = this.$selection.find(".select2-selection__rendered").innerWidth() : t = .75 * (this.$search.val().length + 1) + "em";
                        this.$search.css("width", t)
                    }, n
                }), e.define("select2/selection/eventRelay", ["jquery"], function (t) {
                    function e() {}
                    return e.prototype.bind = function (e, i, n) {
                        var s = this,
                            o = ["open", "opening", "close", "closing", "select", "selecting", "unselect", "unselecting", "clear", "clearing"],
                            r = ["opening", "closing", "selecting", "unselecting", "clearing"];
                        e.call(this, i, n), i.on("*", function (e, i) {
                            if (-1 !== t.inArray(e, o)) {
                                i = i || {};
                                var n = t.Event("select2:" + e, {
                                    params: i
                                });
                                s.$element.trigger(n), -1 !== t.inArray(e, r) && (i.prevented = n.isDefaultPrevented())
                            }
                        })
                    }, e
                }), e.define("select2/translation", ["jquery", "require"], function (t, e) {
                    function i(t) {
                        this.dict = t || {}
                    }
                    return i.prototype.all = function () {
                        return this.dict
                    }, i.prototype.get = function (t) {
                        return this.dict[t]
                    }, i.prototype.extend = function (e) {
                        this.dict = t.extend({}, e.all(), this.dict)
                    }, i._cache = {}, i.loadPath = function (t) {
                        if (!(t in i._cache)) {
                            var n = e(t);
                            i._cache[t] = n
                        }
                        return new i(i._cache[t])
                    }, i
                }), e.define("select2/diacritics", [], function () {
                    return {
                        "Ⓐ": "A",
                        "Ａ": "A",
                        "À": "A",
                        "Á": "A",
                        "Â": "A",
                        "Ầ": "A",
                        "Ấ": "A",
                        "Ẫ": "A",
                        "Ẩ": "A",
                        "Ã": "A",
                        "Ā": "A",
                        "Ă": "A",
                        "Ằ": "A",
                        "Ắ": "A",
                        "Ẵ": "A",
                        "Ẳ": "A",
                        "Ȧ": "A",
                        "Ǡ": "A",
                        "Ä": "A",
                        "Ǟ": "A",
                        "Ả": "A",
                        "Å": "A",
                        "Ǻ": "A",
                        "Ǎ": "A",
                        "Ȁ": "A",
                        "Ȃ": "A",
                        "Ạ": "A",
                        "Ậ": "A",
                        "Ặ": "A",
                        "Ḁ": "A",
                        "Ą": "A",
                        "Ⱥ": "A",
                        "Ɐ": "A",
                        "Ꜳ": "AA",
                        "Æ": "AE",
                        "Ǽ": "AE",
                        "Ǣ": "AE",
                        "Ꜵ": "AO",
                        "Ꜷ": "AU",
                        "Ꜹ": "AV",
                        "Ꜻ": "AV",
                        "Ꜽ": "AY",
                        "Ⓑ": "B",
                        "Ｂ": "B",
                        "Ḃ": "B",
                        "Ḅ": "B",
                        "Ḇ": "B",
                        "Ƀ": "B",
                        "Ƃ": "B",
                        "Ɓ": "B",
                        "Ⓒ": "C",
                        "Ｃ": "C",
                        "Ć": "C",
                        "Ĉ": "C",
                        "Ċ": "C",
                        "Č": "C",
                        "Ç": "C",
                        "Ḉ": "C",
                        "Ƈ": "C",
                        "Ȼ": "C",
                        "Ꜿ": "C",
                        "Ⓓ": "D",
                        "Ｄ": "D",
                        "Ḋ": "D",
                        "Ď": "D",
                        "Ḍ": "D",
                        "Ḑ": "D",
                        "Ḓ": "D",
                        "Ḏ": "D",
                        "Đ": "D",
                        "Ƌ": "D",
                        "Ɗ": "D",
                        "Ɖ": "D",
                        "Ꝺ": "D",
                        "Ǳ": "DZ",
                        "Ǆ": "DZ",
                        "ǲ": "Dz",
                        "ǅ": "Dz",
                        "Ⓔ": "E",
                        "Ｅ": "E",
                        "È": "E",
                        "É": "E",
                        "Ê": "E",
                        "Ề": "E",
                        "Ế": "E",
                        "Ễ": "E",
                        "Ể": "E",
                        "Ẽ": "E",
                        "Ē": "E",
                        "Ḕ": "E",
                        "Ḗ": "E",
                        "Ĕ": "E",
                        "Ė": "E",
                        "Ë": "E",
                        "Ẻ": "E",
                        "Ě": "E",
                        "Ȅ": "E",
                        "Ȇ": "E",
                        "Ẹ": "E",
                        "Ệ": "E",
                        "Ȩ": "E",
                        "Ḝ": "E",
                        "Ę": "E",
                        "Ḙ": "E",
                        "Ḛ": "E",
                        "Ɛ": "E",
                        "Ǝ": "E",
                        "Ⓕ": "F",
                        "Ｆ": "F",
                        "Ḟ": "F",
                        "Ƒ": "F",
                        "Ꝼ": "F",
                        "Ⓖ": "G",
                        "Ｇ": "G",
                        "Ǵ": "G",
                        "Ĝ": "G",
                        "Ḡ": "G",
                        "Ğ": "G",
                        "Ġ": "G",
                        "Ǧ": "G",
                        "Ģ": "G",
                        "Ǥ": "G",
                        "Ɠ": "G",
                        "Ꞡ": "G",
                        "Ᵹ": "G",
                        "Ꝿ": "G",
                        "Ⓗ": "H",
                        "Ｈ": "H",
                        "Ĥ": "H",
                        "Ḣ": "H",
                        "Ḧ": "H",
                        "Ȟ": "H",
                        "Ḥ": "H",
                        "Ḩ": "H",
                        "Ḫ": "H",
                        "Ħ": "H",
                        "Ⱨ": "H",
                        "Ⱶ": "H",
                        "Ɥ": "H",
                        "Ⓘ": "I",
                        "Ｉ": "I",
                        "Ì": "I",
                        "Í": "I",
                        "Î": "I",
                        "Ĩ": "I",
                        "Ī": "I",
                        "Ĭ": "I",
                        "İ": "I",
                        "Ï": "I",
                        "Ḯ": "I",
                        "Ỉ": "I",
                        "Ǐ": "I",
                        "Ȉ": "I",
                        "Ȋ": "I",
                        "Ị": "I",
                        "Į": "I",
                        "Ḭ": "I",
                        "Ɨ": "I",
                        "Ⓙ": "J",
                        "Ｊ": "J",
                        "Ĵ": "J",
                        "Ɉ": "J",
                        "Ⓚ": "K",
                        "Ｋ": "K",
                        "Ḱ": "K",
                        "Ǩ": "K",
                        "Ḳ": "K",
                        "Ķ": "K",
                        "Ḵ": "K",
                        "Ƙ": "K",
                        "Ⱪ": "K",
                        "Ꝁ": "K",
                        "Ꝃ": "K",
                        "Ꝅ": "K",
                        "Ꞣ": "K",
                        "Ⓛ": "L",
                        "Ｌ": "L",
                        "Ŀ": "L",
                        "Ĺ": "L",
                        "Ľ": "L",
                        "Ḷ": "L",
                        "Ḹ": "L",
                        "Ļ": "L",
                        "Ḽ": "L",
                        "Ḻ": "L",
                        "Ł": "L",
                        "Ƚ": "L",
                        "Ɫ": "L",
                        "Ⱡ": "L",
                        "Ꝉ": "L",
                        "Ꝇ": "L",
                        "Ꞁ": "L",
                        "Ǉ": "LJ",
                        "ǈ": "Lj",
                        "Ⓜ": "M",
                        "Ｍ": "M",
                        "Ḿ": "M",
                        "Ṁ": "M",
                        "Ṃ": "M",
                        "Ɱ": "M",
                        "Ɯ": "M",
                        "Ⓝ": "N",
                        "Ｎ": "N",
                        "Ǹ": "N",
                        "Ń": "N",
                        "Ñ": "N",
                        "Ṅ": "N",
                        "Ň": "N",
                        "Ṇ": "N",
                        "Ņ": "N",
                        "Ṋ": "N",
                        "Ṉ": "N",
                        "Ƞ": "N",
                        "Ɲ": "N",
                        "Ꞑ": "N",
                        "Ꞥ": "N",
                        "Ǌ": "NJ",
                        "ǋ": "Nj",
                        "Ⓞ": "O",
                        "Ｏ": "O",
                        "Ò": "O",
                        "Ó": "O",
                        "Ô": "O",
                        "Ồ": "O",
                        "Ố": "O",
                        "Ỗ": "O",
                        "Ổ": "O",
                        "Õ": "O",
                        "Ṍ": "O",
                        "Ȭ": "O",
                        "Ṏ": "O",
                        "Ō": "O",
                        "Ṑ": "O",
                        "Ṓ": "O",
                        "Ŏ": "O",
                        "Ȯ": "O",
                        "Ȱ": "O",
                        "Ö": "O",
                        "Ȫ": "O",
                        "Ỏ": "O",
                        "Ő": "O",
                        "Ǒ": "O",
                        "Ȍ": "O",
                        "Ȏ": "O",
                        "Ơ": "O",
                        "Ờ": "O",
                        "Ớ": "O",
                        "Ỡ": "O",
                        "Ở": "O",
                        "Ợ": "O",
                        "Ọ": "O",
                        "Ộ": "O",
                        "Ǫ": "O",
                        "Ǭ": "O",
                        "Ø": "O",
                        "Ǿ": "O",
                        "Ɔ": "O",
                        "Ɵ": "O",
                        "Ꝋ": "O",
                        "Ꝍ": "O",
                        "Ƣ": "OI",
                        "Ꝏ": "OO",
                        "Ȣ": "OU",
                        "Ⓟ": "P",
                        "Ｐ": "P",
                        "Ṕ": "P",
                        "Ṗ": "P",
                        "Ƥ": "P",
                        "Ᵽ": "P",
                        "Ꝑ": "P",
                        "Ꝓ": "P",
                        "Ꝕ": "P",
                        "Ⓠ": "Q",
                        "Ｑ": "Q",
                        "Ꝗ": "Q",
                        "Ꝙ": "Q",
                        "Ɋ": "Q",
                        "Ⓡ": "R",
                        "Ｒ": "R",
                        "Ŕ": "R",
                        "Ṙ": "R",
                        "Ř": "R",
                        "Ȑ": "R",
                        "Ȓ": "R",
                        "Ṛ": "R",
                        "Ṝ": "R",
                        "Ŗ": "R",
                        "Ṟ": "R",
                        "Ɍ": "R",
                        "Ɽ": "R",
                        "Ꝛ": "R",
                        "Ꞧ": "R",
                        "Ꞃ": "R",
                        "Ⓢ": "S",
                        "Ｓ": "S",
                        "ẞ": "S",
                        "Ś": "S",
                        "Ṥ": "S",
                        "Ŝ": "S",
                        "Ṡ": "S",
                        "Š": "S",
                        "Ṧ": "S",
                        "Ṣ": "S",
                        "Ṩ": "S",
                        "Ș": "S",
                        "Ş": "S",
                        "Ȿ": "S",
                        "Ꞩ": "S",
                        "Ꞅ": "S",
                        "Ⓣ": "T",
                        "Ｔ": "T",
                        "Ṫ": "T",
                        "Ť": "T",
                        "Ṭ": "T",
                        "Ț": "T",
                        "Ţ": "T",
                        "Ṱ": "T",
                        "Ṯ": "T",
                        "Ŧ": "T",
                        "Ƭ": "T",
                        "Ʈ": "T",
                        "Ⱦ": "T",
                        "Ꞇ": "T",
                        "Ꜩ": "TZ",
                        "Ⓤ": "U",
                        "Ｕ": "U",
                        "Ù": "U",
                        "Ú": "U",
                        "Û": "U",
                        "Ũ": "U",
                        "Ṹ": "U",
                        "Ū": "U",
                        "Ṻ": "U",
                        "Ŭ": "U",
                        "Ü": "U",
                        "Ǜ": "U",
                        "Ǘ": "U",
                        "Ǖ": "U",
                        "Ǚ": "U",
                        "Ủ": "U",
                        "Ů": "U",
                        "Ű": "U",
                        "Ǔ": "U",
                        "Ȕ": "U",
                        "Ȗ": "U",
                        "Ư": "U",
                        "Ừ": "U",
                        "Ứ": "U",
                        "Ữ": "U",
                        "Ử": "U",
                        "Ự": "U",
                        "Ụ": "U",
                        "Ṳ": "U",
                        "Ų": "U",
                        "Ṷ": "U",
                        "Ṵ": "U",
                        "Ʉ": "U",
                        "Ⓥ": "V",
                        "Ｖ": "V",
                        "Ṽ": "V",
                        "Ṿ": "V",
                        "Ʋ": "V",
                        "Ꝟ": "V",
                        "Ʌ": "V",
                        "Ꝡ": "VY",
                        "Ⓦ": "W",
                        "Ｗ": "W",
                        "Ẁ": "W",
                        "Ẃ": "W",
                        "Ŵ": "W",
                        "Ẇ": "W",
                        "Ẅ": "W",
                        "Ẉ": "W",
                        "Ⱳ": "W",
                        "Ⓧ": "X",
                        "Ｘ": "X",
                        "Ẋ": "X",
                        "Ẍ": "X",
                        "Ⓨ": "Y",
                        "Ｙ": "Y",
                        "Ỳ": "Y",
                        "Ý": "Y",
                        "Ŷ": "Y",
                        "Ỹ": "Y",
                        "Ȳ": "Y",
                        "Ẏ": "Y",
                        "Ÿ": "Y",
                        "Ỷ": "Y",
                        "Ỵ": "Y",
                        "Ƴ": "Y",
                        "Ɏ": "Y",
                        "Ỿ": "Y",
                        "Ⓩ": "Z",
                        "Ｚ": "Z",
                        "Ź": "Z",
                        "Ẑ": "Z",
                        "Ż": "Z",
                        "Ž": "Z",
                        "Ẓ": "Z",
                        "Ẕ": "Z",
                        "Ƶ": "Z",
                        "Ȥ": "Z",
                        "Ɀ": "Z",
                        "Ⱬ": "Z",
                        "Ꝣ": "Z",
                        "ⓐ": "a",
                        "ａ": "a",
                        "ẚ": "a",
                        "à": "a",
                        "á": "a",
                        "â": "a",
                        "ầ": "a",
                        "ấ": "a",
                        "ẫ": "a",
                        "ẩ": "a",
                        "ã": "a",
                        "ā": "a",
                        "ă": "a",
                        "ằ": "a",
                        "ắ": "a",
                        "ẵ": "a",
                        "ẳ": "a",
                        "ȧ": "a",
                        "ǡ": "a",
                        "ä": "a",
                        "ǟ": "a",
                        "ả": "a",
                        "å": "a",
                        "ǻ": "a",
                        "ǎ": "a",
                        "ȁ": "a",
                        "ȃ": "a",
                        "ạ": "a",
                        "ậ": "a",
                        "ặ": "a",
                        "ḁ": "a",
                        "ą": "a",
                        "ⱥ": "a",
                        "ɐ": "a",
                        "ꜳ": "aa",
                        "æ": "ae",
                        "ǽ": "ae",
                        "ǣ": "ae",
                        "ꜵ": "ao",
                        "ꜷ": "au",
                        "ꜹ": "av",
                        "ꜻ": "av",
                        "ꜽ": "ay",
                        "ⓑ": "b",
                        "ｂ": "b",
                        "ḃ": "b",
                        "ḅ": "b",
                        "ḇ": "b",
                        "ƀ": "b",
                        "ƃ": "b",
                        "ɓ": "b",
                        "ⓒ": "c",
                        "ｃ": "c",
                        "ć": "c",
                        "ĉ": "c",
                        "ċ": "c",
                        "č": "c",
                        "ç": "c",
                        "ḉ": "c",
                        "ƈ": "c",
                        "ȼ": "c",
                        "ꜿ": "c",
                        "ↄ": "c",
                        "ⓓ": "d",
                        "ｄ": "d",
                        "ḋ": "d",
                        "ď": "d",
                        "ḍ": "d",
                        "ḑ": "d",
                        "ḓ": "d",
                        "ḏ": "d",
                        "đ": "d",
                        "ƌ": "d",
                        "ɖ": "d",
                        "ɗ": "d",
                        "ꝺ": "d",
                        "ǳ": "dz",
                        "ǆ": "dz",
                        "ⓔ": "e",
                        "ｅ": "e",
                        "è": "e",
                        "é": "e",
                        "ê": "e",
                        "ề": "e",
                        "ế": "e",
                        "ễ": "e",
                        "ể": "e",
                        "ẽ": "e",
                        "ē": "e",
                        "ḕ": "e",
                        "ḗ": "e",
                        "ĕ": "e",
                        "ė": "e",
                        "ë": "e",
                        "ẻ": "e",
                        "ě": "e",
                        "ȅ": "e",
                        "ȇ": "e",
                        "ẹ": "e",
                        "ệ": "e",
                        "ȩ": "e",
                        "ḝ": "e",
                        "ę": "e",
                        "ḙ": "e",
                        "ḛ": "e",
                        "ɇ": "e",
                        "ɛ": "e",
                        "ǝ": "e",
                        "ⓕ": "f",
                        "ｆ": "f",
                        "ḟ": "f",
                        "ƒ": "f",
                        "ꝼ": "f",
                        "ⓖ": "g",
                        "ｇ": "g",
                        "ǵ": "g",
                        "ĝ": "g",
                        "ḡ": "g",
                        "ğ": "g",
                        "ġ": "g",
                        "ǧ": "g",
                        "ģ": "g",
                        "ǥ": "g",
                        "ɠ": "g",
                        "ꞡ": "g",
                        "ᵹ": "g",
                        "ꝿ": "g",
                        "ⓗ": "h",
                        "ｈ": "h",
                        "ĥ": "h",
                        "ḣ": "h",
                        "ḧ": "h",
                        "ȟ": "h",
                        "ḥ": "h",
                        "ḩ": "h",
                        "ḫ": "h",
                        "ẖ": "h",
                        "ħ": "h",
                        "ⱨ": "h",
                        "ⱶ": "h",
                        "ɥ": "h",
                        "ƕ": "hv",
                        "ⓘ": "i",
                        "ｉ": "i",
                        "ì": "i",
                        "í": "i",
                        "î": "i",
                        "ĩ": "i",
                        "ī": "i",
                        "ĭ": "i",
                        "ï": "i",
                        "ḯ": "i",
                        "ỉ": "i",
                        "ǐ": "i",
                        "ȉ": "i",
                        "ȋ": "i",
                        "ị": "i",
                        "į": "i",
                        "ḭ": "i",
                        "ɨ": "i",
                        "ı": "i",
                        "ⓙ": "j",
                        "ｊ": "j",
                        "ĵ": "j",
                        "ǰ": "j",
                        "ɉ": "j",
                        "ⓚ": "k",
                        "ｋ": "k",
                        "ḱ": "k",
                        "ǩ": "k",
                        "ḳ": "k",
                        "ķ": "k",
                        "ḵ": "k",
                        "ƙ": "k",
                        "ⱪ": "k",
                        "ꝁ": "k",
                        "ꝃ": "k",
                        "ꝅ": "k",
                        "ꞣ": "k",
                        "ⓛ": "l",
                        "ｌ": "l",
                        "ŀ": "l",
                        "ĺ": "l",
                        "ľ": "l",
                        "ḷ": "l",
                        "ḹ": "l",
                        "ļ": "l",
                        "ḽ": "l",
                        "ḻ": "l",
                        "ſ": "l",
                        "ł": "l",
                        "ƚ": "l",
                        "ɫ": "l",
                        "ⱡ": "l",
                        "ꝉ": "l",
                        "ꞁ": "l",
                        "ꝇ": "l",
                        "ǉ": "lj",
                        "ⓜ": "m",
                        "ｍ": "m",
                        "ḿ": "m",
                        "ṁ": "m",
                        "ṃ": "m",
                        "ɱ": "m",
                        "ɯ": "m",
                        "ⓝ": "n",
                        "ｎ": "n",
                        "ǹ": "n",
                        "ń": "n",
                        "ñ": "n",
                        "ṅ": "n",
                        "ň": "n",
                        "ṇ": "n",
                        "ņ": "n",
                        "ṋ": "n",
                        "ṉ": "n",
                        "ƞ": "n",
                        "ɲ": "n",
                        "ŉ": "n",
                        "ꞑ": "n",
                        "ꞥ": "n",
                        "ǌ": "nj",
                        "ⓞ": "o",
                        "ｏ": "o",
                        "ò": "o",
                        "ó": "o",
                        "ô": "o",
                        "ồ": "o",
                        "ố": "o",
                        "ỗ": "o",
                        "ổ": "o",
                        "õ": "o",
                        "ṍ": "o",
                        "ȭ": "o",
                        "ṏ": "o",
                        "ō": "o",
                        "ṑ": "o",
                        "ṓ": "o",
                        "ŏ": "o",
                        "ȯ": "o",
                        "ȱ": "o",
                        "ö": "o",
                        "ȫ": "o",
                        "ỏ": "o",
                        "ő": "o",
                        "ǒ": "o",
                        "ȍ": "o",
                        "ȏ": "o",
                        "ơ": "o",
                        "ờ": "o",
                        "ớ": "o",
                        "ỡ": "o",
                        "ở": "o",
                        "ợ": "o",
                        "ọ": "o",
                        "ộ": "o",
                        "ǫ": "o",
                        "ǭ": "o",
                        "ø": "o",
                        "ǿ": "o",
                        "ɔ": "o",
                        "ꝋ": "o",
                        "ꝍ": "o",
                        "ɵ": "o",
                        "ƣ": "oi",
                        "ȣ": "ou",
                        "ꝏ": "oo",
                        "ⓟ": "p",
                        "ｐ": "p",
                        "ṕ": "p",
                        "ṗ": "p",
                        "ƥ": "p",
                        "ᵽ": "p",
                        "ꝑ": "p",
                        "ꝓ": "p",
                        "ꝕ": "p",
                        "ⓠ": "q",
                        "ｑ": "q",
                        "ɋ": "q",
                        "ꝗ": "q",
                        "ꝙ": "q",
                        "ⓡ": "r",
                        "ｒ": "r",
                        "ŕ": "r",
                        "ṙ": "r",
                        "ř": "r",
                        "ȑ": "r",
                        "ȓ": "r",
                        "ṛ": "r",
                        "ṝ": "r",
                        "ŗ": "r",
                        "ṟ": "r",
                        "ɍ": "r",
                        "ɽ": "r",
                        "ꝛ": "r",
                        "ꞧ": "r",
                        "ꞃ": "r",
                        "ⓢ": "s",
                        "ｓ": "s",
                        "ß": "s",
                        "ś": "s",
                        "ṥ": "s",
                        "ŝ": "s",
                        "ṡ": "s",
                        "š": "s",
                        "ṧ": "s",
                        "ṣ": "s",
                        "ṩ": "s",
                        "ș": "s",
                        "ş": "s",
                        "ȿ": "s",
                        "ꞩ": "s",
                        "ꞅ": "s",
                        "ẛ": "s",
                        "ⓣ": "t",
                        "ｔ": "t",
                        "ṫ": "t",
                        "ẗ": "t",
                        "ť": "t",
                        "ṭ": "t",
                        "ț": "t",
                        "ţ": "t",
                        "ṱ": "t",
                        "ṯ": "t",
                        "ŧ": "t",
                        "ƭ": "t",
                        "ʈ": "t",
                        "ⱦ": "t",
                        "ꞇ": "t",
                        "ꜩ": "tz",
                        "ⓤ": "u",
                        "ｕ": "u",
                        "ù": "u",
                        "ú": "u",
                        "û": "u",
                        "ũ": "u",
                        "ṹ": "u",
                        "ū": "u",
                        "ṻ": "u",
                        "ŭ": "u",
                        "ü": "u",
                        "ǜ": "u",
                        "ǘ": "u",
                        "ǖ": "u",
                        "ǚ": "u",
                        "ủ": "u",
                        "ů": "u",
                        "ű": "u",
                        "ǔ": "u",
                        "ȕ": "u",
                        "ȗ": "u",
                        "ư": "u",
                        "ừ": "u",
                        "ứ": "u",
                        "ữ": "u",
                        "ử": "u",
                        "ự": "u",
                        "ụ": "u",
                        "ṳ": "u",
                        "ų": "u",
                        "ṷ": "u",
                        "ṵ": "u",
                        "ʉ": "u",
                        "ⓥ": "v",
                        "ｖ": "v",
                        "ṽ": "v",
                        "ṿ": "v",
                        "ʋ": "v",
                        "ꝟ": "v",
                        "ʌ": "v",
                        "ꝡ": "vy",
                        "ⓦ": "w",
                        "ｗ": "w",
                        "ẁ": "w",
                        "ẃ": "w",
                        "ŵ": "w",
                        "ẇ": "w",
                        "ẅ": "w",
                        "ẘ": "w",
                        "ẉ": "w",
                        "ⱳ": "w",
                        "ⓧ": "x",
                        "ｘ": "x",
                        "ẋ": "x",
                        "ẍ": "x",
                        "ⓨ": "y",
                        "ｙ": "y",
                        "ỳ": "y",
                        "ý": "y",
                        "ŷ": "y",
                        "ỹ": "y",
                        "ȳ": "y",
                        "ẏ": "y",
                        "ÿ": "y",
                        "ỷ": "y",
                        "ẙ": "y",
                        "ỵ": "y",
                        "ƴ": "y",
                        "ɏ": "y",
                        "ỿ": "y",
                        "ⓩ": "z",
                        "ｚ": "z",
                        "ź": "z",
                        "ẑ": "z",
                        "ż": "z",
                        "ž": "z",
                        "ẓ": "z",
                        "ẕ": "z",
                        "ƶ": "z",
                        "ȥ": "z",
                        "ɀ": "z",
                        "ⱬ": "z",
                        "ꝣ": "z",
                        "Ά": "Α",
                        "Έ": "Ε",
                        "Ή": "Η",
                        "Ί": "Ι",
                        "Ϊ": "Ι",
                        "Ό": "Ο",
                        "Ύ": "Υ",
                        "Ϋ": "Υ",
                        "Ώ": "Ω",
                        "ά": "α",
                        "έ": "ε",
                        "ή": "η",
                        "ί": "ι",
                        "ϊ": "ι",
                        "ΐ": "ι",
                        "ό": "ο",
                        "ύ": "υ",
                        "ϋ": "υ",
                        "ΰ": "υ",
                        "ω": "ω",
                        "ς": "σ"
                    }
                }), e.define("select2/data/base", ["../utils"], function (t) {
                    function e(t, i) {
                        e.__super__.constructor.call(this)
                    }
                    return t.Extend(e, t.Observable), e.prototype.current = function (t) {
                        throw new Error("The `current` method must be defined in child classes.")
                    }, e.prototype.query = function (t, e) {
                        throw new Error("The `query` method must be defined in child classes.")
                    }, e.prototype.bind = function (t, e) {}, e.prototype.destroy = function () {}, e.prototype.generateResultId = function (e, i) {
                        var n = e.id + "-result-";
                        return n += t.generateChars(4), null != i.id ? n += "-" + i.id.toString() : n += "-" + t.generateChars(4), n
                    }, e
                }), e.define("select2/data/select", ["./base", "../utils", "jquery"], function (t, e, i) {
                    function n(t, e) {
                        this.$element = t, this.options = e, n.__super__.constructor.call(this)
                    }
                    return e.Extend(n, t), n.prototype.current = function (t) {
                        var e = [],
                            n = this;
                        this.$element.find(":selected").each(function () {
                            var t = i(this),
                                s = n.item(t);
                            e.push(s)
                        }), t(e)
                    }, n.prototype.select = function (t) {
                        var e = this;
                        if (t.selected = !0, i(t.element).is("option")) return t.element.selected = !0, void this.$element.trigger("change");
                        if (this.$element.prop("multiple")) this.current(function (n) {
                            var s = [];
                            (t = [t]).push.apply(t, n);
                            for (var o = 0; o < t.length; o++) {
                                var r = t[o].id; - 1 === i.inArray(r, s) && s.push(r)
                            }
                            e.$element.val(s), e.$element.trigger("change")
                        });
                        else {
                            var n = t.id;
                            this.$element.val(n), this.$element.trigger("change")
                        }
                    }, n.prototype.unselect = function (t) {
                        var e = this;
                        if (this.$element.prop("multiple")) {
                            if (t.selected = !1, i(t.element).is("option")) return t.element.selected = !1, void this.$element.trigger("change");
                            this.current(function (n) {
                                for (var s = [], o = 0; o < n.length; o++) {
                                    var r = n[o].id;
                                    r !== t.id && -1 === i.inArray(r, s) && s.push(r)
                                }
                                e.$element.val(s), e.$element.trigger("change")
                            })
                        }
                    }, n.prototype.bind = function (t, e) {
                        var i = this;
                        this.container = t, t.on("select", function (t) {
                            i.select(t.data)
                        }), t.on("unselect", function (t) {
                            i.unselect(t.data)
                        })
                    }, n.prototype.destroy = function () {
                        this.$element.find("*").each(function () {
                            e.RemoveData(this)
                        })
                    }, n.prototype.query = function (t, e) {
                        var n = [],
                            s = this;
                        this.$element.children().each(function () {
                            var e = i(this);
                            if (e.is("option") || e.is("optgroup")) {
                                var o = s.item(e),
                                    r = s.matches(t, o);
                                null !== r && n.push(r)
                            }
                        }), e({
                            results: n
                        })
                    }, n.prototype.addOptions = function (t) {
                        e.appendMany(this.$element, t)
                    }, n.prototype.option = function (t) {
                        var n;
                        t.children ? (n = document.createElement("optgroup")).label = t.text : void 0 !== (n = document.createElement("option")).textContent ? n.textContent = t.text : n.innerText = t.text, void 0 !== t.id && (n.value = t.id), t.disabled && (n.disabled = !0), t.selected && (n.selected = !0), t.title && (n.title = t.title);
                        var s = i(n),
                            o = this._normalizeItem(t);
                        return o.element = n, e.StoreData(n, "data", o), s
                    }, n.prototype.item = function (t) {
                        var n = {};
                        if (null != (n = e.GetData(t[0], "data"))) return n;
                        if (t.is("option")) n = {
                            id: t.val(),
                            text: t.text(),
                            disabled: t.prop("disabled"),
                            selected: t.prop("selected"),
                            title: t.prop("title")
                        };
                        else if (t.is("optgroup")) {
                            n = {
                                text: t.prop("label"),
                                children: [],
                                title: t.prop("title")
                            };
                            for (var s = t.children("option"), o = [], r = 0; r < s.length; r++) {
                                var a = i(s[r]),
                                    l = this.item(a);
                                o.push(l)
                            }
                            n.children = o
                        }
                        return (n = this._normalizeItem(n)).element = t[0], e.StoreData(t[0], "data", n), n
                    }, n.prototype._normalizeItem = function (t) {
                        t !== Object(t) && (t = {
                            id: t,
                            text: t
                        });
                        return null != (t = i.extend({}, {
                            text: ""
                        }, t)).id && (t.id = t.id.toString()), null != t.text && (t.text = t.text.toString()), null == t._resultId && t.id && null != this.container && (t._resultId = this.generateResultId(this.container, t)), i.extend({}, {
                            selected: !1,
                            disabled: !1
                        }, t)
                    }, n.prototype.matches = function (t, e) {
                        return this.options.get("matcher")(t, e)
                    }, n
                }), e.define("select2/data/array", ["./select", "../utils", "jquery"], function (t, e, i) {
                    function n(t, e) {
                        var i = e.get("data") || [];
                        n.__super__.constructor.call(this, t, e), this.addOptions(this.convertToOptions(i))
                    }
                    return e.Extend(n, t), n.prototype.select = function (t) {
                        var e = this.$element.find("option").filter(function (e, i) {
                            return i.value == t.id.toString()
                        });
                        0 === e.length && (e = this.option(t), this.addOptions(e)), n.__super__.select.call(this, t)
                    }, n.prototype.convertToOptions = function (t) {
                        var n = this,
                            s = this.$element.find("option"),
                            o = s.map(function () {
                                return n.item(i(this)).id
                            }).get(),
                            r = [];

                        function a(t) {
                            return function () {
                                return i(this).val() == t.id
                            }
                        }
                        for (var l = 0; l < t.length; l++) {
                            var c = this._normalizeItem(t[l]);
                            if (i.inArray(c.id, o) >= 0) {
                                var h = s.filter(a(c)),
                                    u = this.item(h),
                                    d = i.extend(!0, {}, c, u),
                                    p = this.option(d);
                                h.replaceWith(p)
                            } else {
                                var f = this.option(c);
                                if (c.children) {
                                    var m = this.convertToOptions(c.children);
                                    e.appendMany(f, m)
                                }
                                r.push(f)
                            }
                        }
                        return r
                    }, n
                }), e.define("select2/data/ajax", ["./array", "../utils", "jquery"], function (t, e, i) {
                    function n(t, e) {
                        this.ajaxOptions = this._applyDefaults(e.get("ajax")), null != this.ajaxOptions.processResults && (this.processResults = this.ajaxOptions.processResults), n.__super__.constructor.call(this, t, e)
                    }
                    return e.Extend(n, t), n.prototype._applyDefaults = function (t) {
                        var e = {
                            data: function (t) {
                                return i.extend({}, t, {
                                    q: t.term
                                })
                            },
                            transport: function (t, e, n) {
                                var s = i.ajax(t);
                                return s.then(e), s.fail(n), s
                            }
                        };
                        return i.extend({}, e, t, !0)
                    }, n.prototype.processResults = function (t) {
                        return t
                    }, n.prototype.query = function (t, e) {
                        var n = this;
                        null != this._request && (i.isFunction(this._request.abort) && this._request.abort(), this._request = null);
                        var s = i.extend({
                            type: "GET"
                        }, this.ajaxOptions);

                        function o() {
                            var o = s.transport(s, function (s) {
                                var o = n.processResults(s, t);
                                n.options.get("debug") && window.console && console.error && (o && o.results && i.isArray(o.results) || console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")), e(o)
                            }, function () {
                                "status" in o && (0 === o.status || "0" === o.status) || n.trigger("results:message", {
                                    message: "errorLoading"
                                })
                            });
                            n._request = o
                        }
                        "function" == typeof s.url && (s.url = s.url.call(this.$element, t)), "function" == typeof s.data && (s.data = s.data.call(this.$element, t)), this.ajaxOptions.delay && null != t.term ? (this._queryTimeout && window.clearTimeout(this._queryTimeout), this._queryTimeout = window.setTimeout(o, this.ajaxOptions.delay)) : o()
                    }, n
                }), e.define("select2/data/tags", ["jquery"], function (t) {
                    function e(e, i, n) {
                        var s = n.get("tags"),
                            o = n.get("createTag");
                        void 0 !== o && (this.createTag = o);
                        var r = n.get("insertTag");
                        if (void 0 !== r && (this.insertTag = r), e.call(this, i, n), t.isArray(s))
                            for (var a = 0; a < s.length; a++) {
                                var l = s[a],
                                    c = this._normalizeItem(l),
                                    h = this.option(c);
                                this.$element.append(h)
                            }
                    }
                    return e.prototype.query = function (t, e, i) {
                        var n = this;
                        this._removeOldTags(), null != e.term && null == e.page ? t.call(this, e, function t(s, o) {
                            for (var r = s.results, a = 0; a < r.length; a++) {
                                var l = r[a],
                                    c = null != l.children && !t({
                                        results: l.children
                                    }, !0);
                                if ((l.text || "").toUpperCase() === (e.term || "").toUpperCase() || c) return !o && (s.data = r, void i(s))
                            }
                            if (o) return !0;
                            var h = n.createTag(e);
                            if (null != h) {
                                var u = n.option(h);
                                u.attr("data-select2-tag", !0), n.addOptions([u]), n.insertTag(r, h)
                            }
                            s.results = r, i(s)
                        }) : t.call(this, e, i)
                    }, e.prototype.createTag = function (e, i) {
                        var n = t.trim(i.term);
                        return "" === n ? null : {
                            id: n,
                            text: n
                        }
                    }, e.prototype.insertTag = function (t, e, i) {
                        e.unshift(i)
                    }, e.prototype._removeOldTags = function (e) {
                        this._lastTag;
                        this.$element.find("option[data-select2-tag]").each(function () {
                            this.selected || t(this).remove()
                        })
                    }, e
                }), e.define("select2/data/tokenizer", ["jquery"], function (t) {
                    function e(t, e, i) {
                        var n = i.get("tokenizer");
                        void 0 !== n && (this.tokenizer = n), t.call(this, e, i)
                    }
                    return e.prototype.bind = function (t, e, i) {
                        t.call(this, e, i), this.$search = e.dropdown.$search || e.selection.$search || i.find(".select2-search__field")
                    }, e.prototype.query = function (e, i, n) {
                        var s = this;
                        i.term = i.term || "";
                        var o = this.tokenizer(i, this.options, function (e) {
                            var i = s._normalizeItem(e);
                            if (!s.$element.find("option").filter(function () {
                                    return t(this).val() === i.id
                                }).length) {
                                var n = s.option(i);
                                n.attr("data-select2-tag", !0), s._removeOldTags(), s.addOptions([n])
                            }! function (t) {
                                s.trigger("select", {
                                    data: t
                                })
                            }(i)
                        });
                        o.term !== i.term && (this.$search.length && (this.$search.val(o.term), this.$search.focus()), i.term = o.term), e.call(this, i, n)
                    }, e.prototype.tokenizer = function (e, i, n, s) {
                        for (var o = n.get("tokenSeparators") || [], r = i.term, a = 0, l = this.createTag || function (t) {
                                return {
                                    id: t.term,
                                    text: t.term
                                }
                            }; a < r.length;) {
                            var c = r[a];
                            if (-1 !== t.inArray(c, o)) {
                                var h = r.substr(0, a),
                                    u = l(t.extend({}, i, {
                                        term: h
                                    }));
                                null != u ? (s(u), r = r.substr(a + 1) || "", a = 0) : a++
                            } else a++
                        }
                        return {
                            term: r
                        }
                    }, e
                }), e.define("select2/data/minimumInputLength", [], function () {
                    function t(t, e, i) {
                        this.minimumInputLength = i.get("minimumInputLength"), t.call(this, e, i)
                    }
                    return t.prototype.query = function (t, e, i) {
                        e.term = e.term || "", e.term.length < this.minimumInputLength ? this.trigger("results:message", {
                            message: "inputTooShort",
                            args: {
                                minimum: this.minimumInputLength,
                                input: e.term,
                                params: e
                            }
                        }) : t.call(this, e, i)
                    }, t
                }), e.define("select2/data/maximumInputLength", [], function () {
                    function t(t, e, i) {
                        this.maximumInputLength = i.get("maximumInputLength"), t.call(this, e, i)
                    }
                    return t.prototype.query = function (t, e, i) {
                        e.term = e.term || "", this.maximumInputLength > 0 && e.term.length > this.maximumInputLength ? this.trigger("results:message", {
                            message: "inputTooLong",
                            args: {
                                maximum: this.maximumInputLength,
                                input: e.term,
                                params: e
                            }
                        }) : t.call(this, e, i)
                    }, t
                }), e.define("select2/data/maximumSelectionLength", [], function () {
                    function t(t, e, i) {
                        this.maximumSelectionLength = i.get("maximumSelectionLength"), t.call(this, e, i)
                    }
                    return t.prototype.query = function (t, e, i) {
                        var n = this;
                        this.current(function (s) {
                            var o = null != s ? s.length : 0;
                            n.maximumSelectionLength > 0 && o >= n.maximumSelectionLength ? n.trigger("results:message", {
                                message: "maximumSelected",
                                args: {
                                    maximum: n.maximumSelectionLength
                                }
                            }) : t.call(n, e, i)
                        })
                    }, t
                }), e.define("select2/dropdown", ["jquery", "./utils"], function (t, e) {
                    function i(t, e) {
                        this.$element = t, this.options = e, i.__super__.constructor.call(this)
                    }
                    return e.Extend(i, e.Observable), i.prototype.render = function () {
                        var e = t('<span class="select2-dropdown"><span class="select2-results"></span></span>');
                        return e.attr("dir", this.options.get("dir")), this.$dropdown = e, e
                    }, i.prototype.bind = function () {}, i.prototype.position = function (t, e) {}, i.prototype.destroy = function () {
                        this.$dropdown.remove()
                    }, i
                }), e.define("select2/dropdown/search", ["jquery", "../utils"], function (t, e) {
                    function i() {}
                    return i.prototype.render = function (e) {
                        var i = e.call(this),
                            n = t('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" /></span>');
                        return this.$searchContainer = n, this.$search = n.find("input"), i.prepend(n), i
                    }, i.prototype.bind = function (e, i, n) {
                        var s = this;
                        e.call(this, i, n), this.$search.on("keydown", function (t) {
                            s.trigger("keypress", t), s._keyUpPrevented = t.isDefaultPrevented()
                        }), this.$search.on("input", function (e) {
                            t(this).off("keyup")
                        }), this.$search.on("keyup input", function (t) {
                            s.handleSearch(t)
                        }), i.on("open", function () {
                            s.$search.attr("tabindex", 0), s.$search.focus(), window.setTimeout(function () {
                                s.$search.focus()
                            }, 0)
                        }), i.on("close", function () {
                            s.$search.attr("tabindex", -1), s.$search.val(""), s.$search.blur()
                        }), i.on("focus", function () {
                            i.isOpen() || s.$search.focus()
                        }), i.on("results:all", function (t) {
                            null != t.query.term && "" !== t.query.term || (s.showSearch(t) ? s.$searchContainer.removeClass("select2-search--hide") : s.$searchContainer.addClass("select2-search--hide"))
                        })
                    }, i.prototype.handleSearch = function (t) {
                        if (!this._keyUpPrevented) {
                            var e = this.$search.val();
                            this.trigger("query", {
                                term: e
                            })
                        }
                        this._keyUpPrevented = !1
                    }, i.prototype.showSearch = function (t, e) {
                        return !0
                    }, i
                }), e.define("select2/dropdown/hidePlaceholder", [], function () {
                    function t(t, e, i, n) {
                        this.placeholder = this.normalizePlaceholder(i.get("placeholder")), t.call(this, e, i, n)
                    }
                    return t.prototype.append = function (t, e) {
                        e.results = this.removePlaceholder(e.results), t.call(this, e)
                    }, t.prototype.normalizePlaceholder = function (t, e) {
                        return "string" == typeof e && (e = {
                            id: "",
                            text: e
                        }), e
                    }, t.prototype.removePlaceholder = function (t, e) {
                        for (var i = e.slice(0), n = e.length - 1; n >= 0; n--) {
                            var s = e[n];
                            this.placeholder.id === s.id && i.splice(n, 1)
                        }
                        return i
                    }, t
                }), e.define("select2/dropdown/infiniteScroll", ["jquery"], function (t) {
                    function e(t, e, i, n) {
                        this.lastParams = {}, t.call(this, e, i, n), this.$loadingMore = this.createLoadingMore(), this.loading = !1
                    }
                    return e.prototype.append = function (t, e) {
                        this.$loadingMore.remove(), this.loading = !1, t.call(this, e), this.showLoadingMore(e) && this.$results.append(this.$loadingMore)
                    }, e.prototype.bind = function (e, i, n) {
                        var s = this;
                        e.call(this, i, n), i.on("query", function (t) {
                            s.lastParams = t, s.loading = !0
                        }), i.on("query:append", function (t) {
                            s.lastParams = t, s.loading = !0
                        }), this.$results.on("scroll", function () {
                            var e = t.contains(document.documentElement, s.$loadingMore[0]);
                            !s.loading && e && (s.$results.offset().top + s.$results.outerHeight(!1) + 50 >= s.$loadingMore.offset().top + s.$loadingMore.outerHeight(!1) && s.loadMore())
                        })
                    }, e.prototype.loadMore = function () {
                        this.loading = !0;
                        var e = t.extend({}, {
                            page: 1
                        }, this.lastParams);
                        e.page++, this.trigger("query:append", e)
                    }, e.prototype.showLoadingMore = function (t, e) {
                        return e.pagination && e.pagination.more
                    }, e.prototype.createLoadingMore = function () {
                        var e = t('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),
                            i = this.options.get("translations").get("loadingMore");
                        return e.html(i(this.lastParams)), e
                    }, e
                }), e.define("select2/dropdown/attachBody", ["jquery", "../utils"], function (t, e) {
                    function i(e, i, n) {
                        this.$dropdownParent = n.get("dropdownParent") || t(document.body), e.call(this, i, n)
                    }
                    return i.prototype.bind = function (t, e, i) {
                        var n = this,
                            s = !1;
                        t.call(this, e, i), e.on("open", function () {
                            n._showDropdown(), n._attachPositioningHandler(e), s || (s = !0, e.on("results:all", function () {
                                n._positionDropdown(), n._resizeDropdown()
                            }), e.on("results:append", function () {
                                n._positionDropdown(), n._resizeDropdown()
                            }))
                        }), e.on("close", function () {
                            n._hideDropdown(), n._detachPositioningHandler(e)
                        }), this.$dropdownContainer.on("mousedown", function (t) {
                            t.stopPropagation()
                        })
                    }, i.prototype.destroy = function (t) {
                        t.call(this), this.$dropdownContainer.remove()
                    }, i.prototype.position = function (t, e, i) {
                        e.attr("class", i.attr("class")), e.removeClass("select2"), e.addClass("select2-container--open"), e.css({
                            position: "absolute",
                            top: -999999
                        }), this.$container = i
                    }, i.prototype.render = function (e) {
                        var i = t("<span></span>"),
                            n = e.call(this);
                        return i.append(n), this.$dropdownContainer = i, i
                    }, i.prototype._hideDropdown = function (t) {
                        this.$dropdownContainer.detach()
                    }, i.prototype._attachPositioningHandler = function (i, n) {
                        var s = this,
                            o = "scroll.select2." + n.id,
                            r = "resize.select2." + n.id,
                            a = "orientationchange.select2." + n.id,
                            l = this.$container.parents().filter(e.hasScroll);
                        l.each(function () {
                            e.StoreData(this, "select2-scroll-position", {
                                x: t(this).scrollLeft(),
                                y: t(this).scrollTop()
                            })
                        }), l.on(o, function (i) {
                            var n = e.GetData(this, "select2-scroll-position");
                            t(this).scrollTop(n.y)
                        }), t(window).on(o + " " + r + " " + a, function (t) {
                            s._positionDropdown(), s._resizeDropdown()
                        })
                    }, i.prototype._detachPositioningHandler = function (i, n) {
                        var s = "scroll.select2." + n.id,
                            o = "resize.select2." + n.id,
                            r = "orientationchange.select2." + n.id;
                        this.$container.parents().filter(e.hasScroll).off(s), t(window).off(s + " " + o + " " + r)
                    }, i.prototype._positionDropdown = function () {
                        var e = t(window),
                            i = this.$dropdown.hasClass("select2-dropdown--above"),
                            n = this.$dropdown.hasClass("select2-dropdown--below"),
                            s = null,
                            o = this.$container.offset();
                        o.bottom = o.top + this.$container.outerHeight(!1);
                        var r = {
                            height: this.$container.outerHeight(!1)
                        };
                        r.top = o.top, r.bottom = o.top + r.height;
                        var a = this.$dropdown.outerHeight(!1),
                            l = e.scrollTop(),
                            c = e.scrollTop() + e.height(),
                            h = l < o.top - a,
                            u = c > o.bottom + a,
                            d = {
                                left: o.left,
                                top: r.bottom
                            },
                            p = this.$dropdownParent;
                        "static" === p.css("position") && (p = p.offsetParent());
                        var f = p.offset();
                        d.top -= f.top, d.left -= f.left, i || n || (s = "below"), u || !h || i ? !h && u && i && (s = "below") : s = "above", ("above" == s || i && "below" !== s) && (d.top = r.top - f.top - a), null != s && (this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--" + s), this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--" + s)), this.$dropdownContainer.css(d)
                    }, i.prototype._resizeDropdown = function () {
                        var t = {
                            width: this.$container.outerWidth(!1) + "px"
                        };
                        this.options.get("dropdownAutoWidth") && (t.minWidth = t.width, t.position = "relative", t.width = "auto"), this.$dropdown.css(t)
                    }, i.prototype._showDropdown = function (t) {
                        this.$dropdownContainer.appendTo(this.$dropdownParent), this._positionDropdown(), this._resizeDropdown()
                    }, i
                }), e.define("select2/dropdown/minimumResultsForSearch", [], function () {
                    function t(t, e, i, n) {
                        this.minimumResultsForSearch = i.get("minimumResultsForSearch"), this.minimumResultsForSearch < 0 && (this.minimumResultsForSearch = 1 / 0), t.call(this, e, i, n)
                    }
                    return t.prototype.showSearch = function (t, e) {
                        return !(function t(e) {
                            for (var i = 0, n = 0; n < e.length; n++) {
                                var s = e[n];
                                s.children ? i += t(s.children) : i++
                            }
                            return i
                        }(e.data.results) < this.minimumResultsForSearch) && t.call(this, e)
                    }, t
                }), e.define("select2/dropdown/selectOnClose", ["../utils"], function (t) {
                    function e() {}
                    return e.prototype.bind = function (t, e, i) {
                        var n = this;
                        t.call(this, e, i), e.on("close", function (t) {
                            n._handleSelectOnClose(t)
                        })
                    }, e.prototype._handleSelectOnClose = function (e, i) {
                        if (i && null != i.originalSelect2Event) {
                            var n = i.originalSelect2Event;
                            if ("select" === n._type || "unselect" === n._type) return
                        }
                        var s = this.getHighlightedResults();
                        if (!(s.length < 1)) {
                            var o = t.GetData(s[0], "data");
                            null != o.element && o.element.selected || null == o.element && o.selected || this.trigger("select", {
                                data: o
                            })
                        }
                    }, e
                }), e.define("select2/dropdown/closeOnSelect", [], function () {
                    function t() {}
                    return t.prototype.bind = function (t, e, i) {
                        var n = this;
                        t.call(this, e, i), e.on("select", function (t) {
                            n._selectTriggered(t)
                        }), e.on("unselect", function (t) {
                            n._selectTriggered(t)
                        })
                    }, t.prototype._selectTriggered = function (t, e) {
                        var i = e.originalEvent;
                        i && i.ctrlKey || this.trigger("close", {
                            originalEvent: i,
                            originalSelect2Event: e
                        })
                    }, t
                }), e.define("select2/i18n/en", [], function () {
                    return {
                        errorLoading: function () {
                            return "The results could not be loaded."
                        },
                        inputTooLong: function (t) {
                            var e = t.input.length - t.maximum,
                                i = "Please delete " + e + " character";
                            return 1 != e && (i += "s"), i
                        },
                        inputTooShort: function (t) {
                            return "Please enter " + (t.minimum - t.input.length) + " or more characters"
                        },
                        loadingMore: function () {
                            return "Loading more results…"
                        },
                        maximumSelected: function (t) {
                            var e = "You can only select " + t.maximum + " item";
                            return 1 != t.maximum && (e += "s"), e
                        },
                        noResults: function () {
                            return "No results found"
                        },
                        searching: function () {
                            return "Searching…"
                        }
                    }
                }), e.define("select2/defaults", ["jquery", "require", "./results", "./selection/single", "./selection/multiple", "./selection/placeholder", "./selection/allowClear", "./selection/search", "./selection/eventRelay", "./utils", "./translation", "./diacritics", "./data/select", "./data/array", "./data/ajax", "./data/tags", "./data/tokenizer", "./data/minimumInputLength", "./data/maximumInputLength", "./data/maximumSelectionLength", "./dropdown", "./dropdown/search", "./dropdown/hidePlaceholder", "./dropdown/infiniteScroll", "./dropdown/attachBody", "./dropdown/minimumResultsForSearch", "./dropdown/selectOnClose", "./dropdown/closeOnSelect", "./i18n/en"], function (t, e, i, n, s, o, r, a, l, c, h, u, d, p, f, m, g, v, y, w, b, $, C, _, x, E, T, A, S) {
                    function I() {
                        this.reset()
                    }
                    return I.prototype.apply = function (u) {
                        if (null == (u = t.extend(!0, {}, this.defaults, u)).dataAdapter) {
                            if (null != u.ajax ? u.dataAdapter = f : null != u.data ? u.dataAdapter = p : u.dataAdapter = d, u.minimumInputLength > 0 && (u.dataAdapter = c.Decorate(u.dataAdapter, v)), u.maximumInputLength > 0 && (u.dataAdapter = c.Decorate(u.dataAdapter, y)), u.maximumSelectionLength > 0 && (u.dataAdapter = c.Decorate(u.dataAdapter, w)), u.tags && (u.dataAdapter = c.Decorate(u.dataAdapter, m)), null == u.tokenSeparators && null == u.tokenizer || (u.dataAdapter = c.Decorate(u.dataAdapter, g)), null != u.query) {
                                var S = e(u.amdBase + "compat/query");
                                u.dataAdapter = c.Decorate(u.dataAdapter, S)
                            }
                            if (null != u.initSelection) {
                                var I = e(u.amdBase + "compat/initSelection");
                                u.dataAdapter = c.Decorate(u.dataAdapter, I)
                            }
                        }
                        if (null == u.resultsAdapter && (u.resultsAdapter = i, null != u.ajax && (u.resultsAdapter = c.Decorate(u.resultsAdapter, _)), null != u.placeholder && (u.resultsAdapter = c.Decorate(u.resultsAdapter, C)), u.selectOnClose && (u.resultsAdapter = c.Decorate(u.resultsAdapter, T))), null == u.dropdownAdapter) {
                            if (u.multiple) u.dropdownAdapter = b;
                            else {
                                var D = c.Decorate(b, $);
                                u.dropdownAdapter = D
                            }
                            if (0 !== u.minimumResultsForSearch && (u.dropdownAdapter = c.Decorate(u.dropdownAdapter, E)), u.closeOnSelect && (u.dropdownAdapter = c.Decorate(u.dropdownAdapter, A)), null != u.dropdownCssClass || null != u.dropdownCss || null != u.adaptDropdownCssClass) {
                                var O = e(u.amdBase + "compat/dropdownCss");
                                u.dropdownAdapter = c.Decorate(u.dropdownAdapter, O)
                            }
                            u.dropdownAdapter = c.Decorate(u.dropdownAdapter, x)
                        }
                        if (null == u.selectionAdapter) {
                            if (u.multiple ? u.selectionAdapter = s : u.selectionAdapter = n, null != u.placeholder && (u.selectionAdapter = c.Decorate(u.selectionAdapter, o)), u.allowClear && (u.selectionAdapter = c.Decorate(u.selectionAdapter, r)), u.multiple && (u.selectionAdapter = c.Decorate(u.selectionAdapter, a)), null != u.containerCssClass || null != u.containerCss || null != u.adaptContainerCssClass) {
                                var k = e(u.amdBase + "compat/containerCss");
                                u.selectionAdapter = c.Decorate(u.selectionAdapter, k)
                            }
                            u.selectionAdapter = c.Decorate(u.selectionAdapter, l)
                        }
                        if ("string" == typeof u.language)
                            if (u.language.indexOf("-") > 0) {
                                var P = u.language.split("-")[0];
                                u.language = [u.language, P]
                            } else u.language = [u.language];
                        if (t.isArray(u.language)) {
                            var L = new h;
                            u.language.push("en");
                            for (var z = u.language, j = 0; j < z.length; j++) {
                                var N = z[j],
                                    R = {};
                                try {
                                    R = h.loadPath(N)
                                } catch (t) {
                                    try {
                                        N = this.defaults.amdLanguageBase + N, R = h.loadPath(N)
                                    } catch (t) {
                                        u.debug && window.console && console.warn && console.warn('Select2: The language file for "' + N + '" could not be automatically loaded. A fallback will be used instead.');
                                        continue
                                    }
                                }
                                L.extend(R)
                            }
                            u.translations = L
                        } else {
                            var M = h.loadPath(this.defaults.amdLanguageBase + "en"),
                                W = new h(u.language);
                            W.extend(M), u.translations = W
                        }
                        return u
                    }, I.prototype.reset = function () {
                        function e(t) {
                            return t.replace(/[^\u0000-\u007E]/g, function (t) {
                                return u[t] || t
                            })
                        }
                        this.defaults = {
                            amdBase: "./",
                            amdLanguageBase: "./i18n/",
                            closeOnSelect: !0,
                            debug: !1,
                            dropdownAutoWidth: !1,
                            escapeMarkup: c.escapeMarkup,
                            language: S,
                            matcher: function i(n, s) {
                                if ("" === t.trim(n.term)) return s;
                                if (s.children && s.children.length > 0) {
                                    for (var o = t.extend(!0, {}, s), r = s.children.length - 1; r >= 0; r--) null == i(n, s.children[r]) && o.children.splice(r, 1);
                                    return o.children.length > 0 ? o : i(n, o)
                                }
                                var a = e(s.text).toUpperCase(),
                                    l = e(n.term).toUpperCase();
                                return a.indexOf(l) > -1 ? s : null
                            },
                            minimumInputLength: 0,
                            maximumInputLength: 0,
                            maximumSelectionLength: 0,
                            minimumResultsForSearch: 0,
                            selectOnClose: !1,
                            sorter: function (t) {
                                return t
                            },
                            templateResult: function (t) {
                                return t.text
                            },
                            templateSelection: function (t) {
                                return t.text
                            },
                            theme: "default",
                            width: "resolve"
                        }
                    }, I.prototype.set = function (e, i) {
                        var n = {};
                        n[t.camelCase(e)] = i;
                        var s = c._convertData(n);
                        t.extend(!0, this.defaults, s)
                    }, new I
                }), e.define("select2/options", ["require", "jquery", "./defaults", "./utils"], function (t, e, i, n) {
                    function s(e, s) {
                        if (this.options = e, null != s && this.fromElement(s), this.options = i.apply(this.options), s && s.is("input")) {
                            var o = t(this.get("amdBase") + "compat/inputData");
                            this.options.dataAdapter = n.Decorate(this.options.dataAdapter, o)
                        }
                    }
                    return s.prototype.fromElement = function (t) {
                        var i = ["select2"];
                        null == this.options.multiple && (this.options.multiple = t.prop("multiple")), null == this.options.disabled && (this.options.disabled = t.prop("disabled")), null == this.options.language && (t.prop("lang") ? this.options.language = t.prop("lang").toLowerCase() : t.closest("[lang]").prop("lang") && (this.options.language = t.closest("[lang]").prop("lang"))), null == this.options.dir && (t.prop("dir") ? this.options.dir = t.prop("dir") : t.closest("[dir]").prop("dir") ? this.options.dir = t.closest("[dir]").prop("dir") : this.options.dir = "ltr"), t.prop("disabled", this.options.disabled), t.prop("multiple", this.options.multiple), n.GetData(t[0], "select2Tags") && (this.options.debug && window.console && console.warn && console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'), n.StoreData(t[0], "data", n.GetData(t[0], "select2Tags")), n.StoreData(t[0], "tags", !0)), n.GetData(t[0], "ajaxUrl") && (this.options.debug && window.console && console.warn && console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."), t.attr("ajax--url", n.GetData(t[0], "ajaxUrl")), n.StoreData(t[0], "ajax-Url", n.GetData(t[0], "ajaxUrl")));
                        var s = {};
                        s = e.fn.jquery && "1." == e.fn.jquery.substr(0, 2) && t[0].dataset ? e.extend(!0, {}, t[0].dataset, n.GetData(t[0])) : n.GetData(t[0]);
                        var o = e.extend(!0, {}, s);
                        for (var r in o = n._convertData(o)) e.inArray(r, i) > -1 || (e.isPlainObject(this.options[r]) ? e.extend(this.options[r], o[r]) : this.options[r] = o[r]);
                        return this
                    }, s.prototype.get = function (t) {
                        return this.options[t]
                    }, s.prototype.set = function (t, e) {
                        this.options[t] = e
                    }, s
                }), e.define("select2/core", ["jquery", "./options", "./utils", "./keys"], function (t, e, i, n) {
                    var s = function (t, n) {
                        null != i.GetData(t[0], "select2") && i.GetData(t[0], "select2").destroy(), this.$element = t, this.id = this._generateId(t), n = n || {}, this.options = new e(n, t), s.__super__.constructor.call(this);
                        var o = t.attr("tabindex") || 0;
                        i.StoreData(t[0], "old-tabindex", o), t.attr("tabindex", "-1");
                        var r = this.options.get("dataAdapter");
                        this.dataAdapter = new r(t, this.options);
                        var a = this.render();
                        this._placeContainer(a);
                        var l = this.options.get("selectionAdapter");
                        this.selection = new l(t, this.options), this.$selection = this.selection.render(), this.selection.position(this.$selection, a);
                        var c = this.options.get("dropdownAdapter");
                        this.dropdown = new c(t, this.options), this.$dropdown = this.dropdown.render(), this.dropdown.position(this.$dropdown, a);
                        var h = this.options.get("resultsAdapter");
                        this.results = new h(t, this.options, this.dataAdapter), this.$results = this.results.render(), this.results.position(this.$results, this.$dropdown);
                        var u = this;
                        this._bindAdapters(), this._registerDomEvents(), this._registerDataEvents(), this._registerSelectionEvents(), this._registerDropdownEvents(), this._registerResultsEvents(), this._registerEvents(), this.dataAdapter.current(function (t) {
                            u.trigger("selection:update", {
                                data: t
                            })
                        }), t.addClass("select2-hidden-accessible"), t.attr("aria-hidden", "true"), this._syncAttributes(), i.StoreData(t[0], "select2", this), t.data("select2", this)
                    };
                    return i.Extend(s, i.Observable), s.prototype._generateId = function (t) {
                        return "select2-" + (null != t.attr("id") ? t.attr("id") : null != t.attr("name") ? t.attr("name") + "-" + i.generateChars(2) : i.generateChars(4)).replace(/(:|\.|\[|\]|,)/g, "")
                    }, s.prototype._placeContainer = function (t) {
                        t.insertAfter(this.$element);
                        var e = this._resolveWidth(this.$element, this.options.get("width"));
                        null != e && t.css("width", e)
                    }, s.prototype._resolveWidth = function (t, e) {
                        var i = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
                        if ("resolve" == e) {
                            var n = this._resolveWidth(t, "style");
                            return null != n ? n : this._resolveWidth(t, "element")
                        }
                        if ("element" == e) {
                            var s = t.outerWidth(!1);
                            return s <= 0 ? "auto" : s + "px"
                        }
                        if ("style" == e) {
                            var o = t.attr("style");
                            if ("string" != typeof o) return null;
                            for (var r = o.split(";"), a = 0, l = r.length; a < l; a += 1) {
                                var c = r[a].replace(/\s/g, "").match(i);
                                if (null !== c && c.length >= 1) return c[1]
                            }
                            return null
                        }
                        return e
                    }, s.prototype._bindAdapters = function () {
                        this.dataAdapter.bind(this, this.$container), this.selection.bind(this, this.$container), this.dropdown.bind(this, this.$container), this.results.bind(this, this.$container)
                    }, s.prototype._registerDomEvents = function () {
                        var e = this;
                        this.$element.on("change.select2", function () {
                            e.dataAdapter.current(function (t) {
                                e.trigger("selection:update", {
                                    data: t
                                })
                            })
                        }), this.$element.on("focus.select2", function (t) {
                            e.trigger("focus", t)
                        }), this._syncA = i.bind(this._syncAttributes, this), this._syncS = i.bind(this._syncSubtree, this), this.$element[0].attachEvent && this.$element[0].attachEvent("onpropertychange", this._syncA);
                        var n = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
                        null != n ? (this._observer = new n(function (i) {
                            t.each(i, e._syncA), t.each(i, e._syncS)
                        }), this._observer.observe(this.$element[0], {
                            attributes: !0,
                            childList: !0,
                            subtree: !1
                        })) : this.$element[0].addEventListener && (this.$element[0].addEventListener("DOMAttrModified", e._syncA, !1), this.$element[0].addEventListener("DOMNodeInserted", e._syncS, !1), this.$element[0].addEventListener("DOMNodeRemoved", e._syncS, !1))
                    }, s.prototype._registerDataEvents = function () {
                        var t = this;
                        this.dataAdapter.on("*", function (e, i) {
                            t.trigger(e, i)
                        })
                    }, s.prototype._registerSelectionEvents = function () {
                        var e = this,
                            i = ["toggle", "focus"];
                        this.selection.on("toggle", function () {
                            e.toggleDropdown()
                        }), this.selection.on("focus", function (t) {
                            e.focus(t)
                        }), this.selection.on("*", function (n, s) {
                            -1 === t.inArray(n, i) && e.trigger(n, s)
                        })
                    }, s.prototype._registerDropdownEvents = function () {
                        var t = this;
                        this.dropdown.on("*", function (e, i) {
                            t.trigger(e, i)
                        })
                    }, s.prototype._registerResultsEvents = function () {
                        var t = this;
                        this.results.on("*", function (e, i) {
                            t.trigger(e, i)
                        })
                    }, s.prototype._registerEvents = function () {
                        var t = this;
                        this.on("open", function () {
                            t.$container.addClass("select2-container--open")
                        }), this.on("close", function () {
                            t.$container.removeClass("select2-container--open")
                        }), this.on("enable", function () {
                            t.$container.removeClass("select2-container--disabled")
                        }), this.on("disable", function () {
                            t.$container.addClass("select2-container--disabled")
                        }), this.on("blur", function () {
                            t.$container.removeClass("select2-container--focus")
                        }), this.on("query", function (e) {
                            t.isOpen() || t.trigger("open", {}), this.dataAdapter.query(e, function (i) {
                                t.trigger("results:all", {
                                    data: i,
                                    query: e
                                })
                            })
                        }), this.on("query:append", function (e) {
                            this.dataAdapter.query(e, function (i) {
                                t.trigger("results:append", {
                                    data: i,
                                    query: e
                                })
                            })
                        }), this.on("keypress", function (e) {
                            var i = e.which;
                            t.isOpen() ? i === n.ESC || i === n.TAB || i === n.UP && e.altKey ? (t.close(), e.preventDefault()) : i === n.ENTER ? (t.trigger("results:select", {}), e.preventDefault()) : i === n.SPACE && e.ctrlKey ? (t.trigger("results:toggle", {}), e.preventDefault()) : i === n.UP ? (t.trigger("results:previous", {}), e.preventDefault()) : i === n.DOWN && (t.trigger("results:next", {}), e.preventDefault()) : (i === n.ENTER || i === n.SPACE || i === n.DOWN && e.altKey) && (t.open(), e.preventDefault())
                        })
                    }, s.prototype._syncAttributes = function () {
                        this.options.set("disabled", this.$element.prop("disabled")), this.options.get("disabled") ? (this.isOpen() && this.close(), this.trigger("disable", {})) : this.trigger("enable", {})
                    }, s.prototype._syncSubtree = function (t, e) {
                        var i = !1,
                            n = this;
                        if (!t || !t.target || "OPTION" === t.target.nodeName || "OPTGROUP" === t.target.nodeName) {
                            if (e)
                                if (e.addedNodes && e.addedNodes.length > 0)
                                    for (var s = 0; s < e.addedNodes.length; s++) {
                                        e.addedNodes[s].selected && (i = !0)
                                    } else e.removedNodes && e.removedNodes.length > 0 && (i = !0);
                                else i = !0;
                            i && this.dataAdapter.current(function (t) {
                                n.trigger("selection:update", {
                                    data: t
                                })
                            })
                        }
                    }, s.prototype.trigger = function (t, e) {
                        var i = s.__super__.trigger,
                            n = {
                                open: "opening",
                                close: "closing",
                                select: "selecting",
                                unselect: "unselecting",
                                clear: "clearing"
                            };
                        if (void 0 === e && (e = {}), t in n) {
                            var o = n[t],
                                r = {
                                    prevented: !1,
                                    name: t,
                                    args: e
                                };
                            if (i.call(this, o, r), r.prevented) return void(e.prevented = !0)
                        }
                        i.call(this, t, e)
                    }, s.prototype.toggleDropdown = function () {
                        this.options.get("disabled") || (this.isOpen() ? this.close() : this.open())
                    }, s.prototype.open = function () {
                        this.isOpen() || this.trigger("query", {})
                    }, s.prototype.close = function () {
                        this.isOpen() && this.trigger("close", {})
                    }, s.prototype.isOpen = function () {
                        return this.$container.hasClass("select2-container--open")
                    }, s.prototype.hasFocus = function () {
                        return this.$container.hasClass("select2-container--focus")
                    }, s.prototype.focus = function (t) {
                        this.hasFocus() || (this.$container.addClass("select2-container--focus"), this.trigger("focus", {}))
                    }, s.prototype.enable = function (t) {
                        this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'), null != t && 0 !== t.length || (t = [!0]);
                        var e = !t[0];
                        this.$element.prop("disabled", e)
                    }, s.prototype.data = function () {
                        this.options.get("debug") && arguments.length > 0 && window.console && console.warn && console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');
                        var t = [];
                        return this.dataAdapter.current(function (e) {
                            t = e
                        }), t
                    }, s.prototype.val = function (e) {
                        if (this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'), null == e || 0 === e.length) return this.$element.val();
                        var i = e[0];
                        t.isArray(i) && (i = t.map(i, function (t) {
                            return t.toString()
                        })), this.$element.val(i).trigger("change")
                    }, s.prototype.destroy = function () {
                        this.$container.remove(), this.$element[0].detachEvent && this.$element[0].detachEvent("onpropertychange", this._syncA), null != this._observer ? (this._observer.disconnect(), this._observer = null) : this.$element[0].removeEventListener && (this.$element[0].removeEventListener("DOMAttrModified", this._syncA, !1), this.$element[0].removeEventListener("DOMNodeInserted", this._syncS, !1), this.$element[0].removeEventListener("DOMNodeRemoved", this._syncS, !1)), this._syncA = null, this._syncS = null, this.$element.off(".select2"), this.$element.attr("tabindex", i.GetData(this.$element[0], "old-tabindex")), this.$element.removeClass("select2-hidden-accessible"), this.$element.attr("aria-hidden", "false"), i.RemoveData(this.$element[0]), this.$element.removeData("select2"), this.dataAdapter.destroy(), this.selection.destroy(), this.dropdown.destroy(), this.results.destroy(), this.dataAdapter = null, this.selection = null, this.dropdown = null, this.results = null
                    }, s.prototype.render = function () {
                        var e = t('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');
                        return e.attr("dir", this.options.get("dir")), this.$container = e, this.$container.addClass("select2-container--" + this.options.get("theme")), i.StoreData(e[0], "element", this.$element), e
                    }, s
                }), e.define("jquery-mousewheel", ["jquery"], function (t) {
                    return t
                }), e.define("jquery.select2", ["jquery", "jquery-mousewheel", "./select2/core", "./select2/defaults", "./select2/utils"], function (t, e, i, n, s) {
                    if (null == t.fn.select2) {
                        var o = ["open", "close", "destroy"];
                        t.fn.select2 = function (e) {
                            if ("object" == typeof (e = e || {})) return this.each(function () {
                                var n = t.extend(!0, {}, e);
                                new i(t(this), n)
                            }), this;
                            if ("string" == typeof e) {
                                var n, r = Array.prototype.slice.call(arguments, 1);
                                return this.each(function () {
                                    var t = s.GetData(this, "select2");
                                    null == t && window.console && console.error && console.error("The select2('" + e + "') method was called on an element that is not using Select2."), n = t[e].apply(t, r)
                                }), t.inArray(e, o) > -1 ? this : n
                            }
                            throw new Error("Invalid arguments for Select2: " + e)
                        }
                    }
                    return null == t.fn.select2.defaults && (t.fn.select2.defaults = n), i
                }), {
                    define: e.define,
                    require: e.require
                }
            }(),
            i = e.require("jquery.select2");
        return t.fn.select2.amd = e, i
    }), "function" != typeof Object.create && (Object.create = function (t) {
        function e() {}
        return e.prototype = t, new e
    }),
    function (t, e, i) {
        var n = {
            init: function (e, i) {
                this.$elem = t(i), this.options = t.extend({}, t.fn.owlCarousel.options, this.$elem.data(), e), this.userOptions = e, this.loadContent()
            },
            loadContent: function () {
                var e, i = this;
                "function" == typeof i.options.beforeInit && i.options.beforeInit.apply(this, [i.$elem]), "string" == typeof i.options.jsonPath ? (e = i.options.jsonPath, t.getJSON(e, function (t) {
                    var e, n = "";
                    if ("function" == typeof i.options.jsonSuccess) i.options.jsonSuccess.apply(this, [t]);
                    else {
                        for (e in t.owl) t.owl.hasOwnProperty(e) && (n += t.owl[e].item);
                        i.$elem.html(n)
                    }
                    i.logIn()
                })) : i.logIn()
            },
            logIn: function () {
                this.$elem.data("owl-originalStyles", this.$elem.attr("style")), this.$elem.data("owl-originalClasses", this.$elem.attr("class")), this.$elem.css({
                    opacity: 0
                }), this.orignalItems = this.options.items, this.checkBrowser(), this.wrapperWidth = 0, this.checkVisible = null, this.setVars()
            },
            setVars: function () {
                if (0 === this.$elem.children().length) return !1;
                this.baseClass(), this.eventTypes(), this.$userItems = this.$elem.children(), this.itemsAmount = this.$userItems.length, this.wrapItems(), this.$owlItems = this.$elem.find(".owl-item"), this.$owlWrapper = this.$elem.find(".owl-wrapper"), this.playDirection = "next", this.prevItem = 0, this.prevArr = [0], this.currentItem = 0, this.customEvents(), this.onStartup()
            },
            onStartup: function () {
                this.updateItems(), this.calculateAll(), this.buildControls(), this.updateControls(), this.response(), this.moveEvents(), this.stopOnHover(), this.owlStatus(), !1 !== this.options.transitionStyle && this.transitionTypes(this.options.transitionStyle), !0 === this.options.autoPlay && (this.options.autoPlay = 5e3), this.play(), this.$elem.find(".owl-wrapper").css("display", "block"), this.$elem.is(":visible") ? this.$elem.css("opacity", 1) : this.watchVisibility(), this.onstartup = !1, this.eachMoveUpdate(), "function" == typeof this.options.afterInit && this.options.afterInit.apply(this, [this.$elem])
            },
            eachMoveUpdate: function () {
                !0 === this.options.lazyLoad && this.lazyLoad(), !0 === this.options.autoHeight && this.autoHeight(), this.onVisibleItems(), "function" == typeof this.options.afterAction && this.options.afterAction.apply(this, [this.$elem])
            },
            updateVars: function () {
                "function" == typeof this.options.beforeUpdate && this.options.beforeUpdate.apply(this, [this.$elem]), this.watchVisibility(), this.updateItems(), this.calculateAll(), this.updatePosition(), this.updateControls(), this.eachMoveUpdate(), "function" == typeof this.options.afterUpdate && this.options.afterUpdate.apply(this, [this.$elem])
            },
            reload: function () {
                var t = this;
                e.setTimeout(function () {
                    t.updateVars()
                }, 0)
            },
            watchVisibility: function () {
                var t = this;
                if (!1 !== t.$elem.is(":visible")) return !1;
                t.$elem.css({
                    opacity: 0
                }), e.clearInterval(t.autoPlayInterval), e.clearInterval(t.checkVisible), t.checkVisible = e.setInterval(function () {
                    t.$elem.is(":visible") && (t.reload(), t.$elem.animate({
                        opacity: 1
                    }, 200), e.clearInterval(t.checkVisible))
                }, 500)
            },
            wrapItems: function () {
                this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>'), this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">'), this.wrapperOuter = this.$elem.find(".owl-wrapper-outer"), this.$elem.css("display", "block")
            },
            baseClass: function () {
                var t = this.$elem.hasClass(this.options.baseClass),
                    e = this.$elem.hasClass(this.options.theme);
                t || this.$elem.addClass(this.options.baseClass), e || this.$elem.addClass(this.options.theme)
            },
            updateItems: function () {
                var e, i;
                if (!1 === this.options.responsive) return !1;
                if (!0 === this.options.singleItem) return this.options.items = this.orignalItems = 1, this.options.itemsCustom = !1, this.options.itemsDesktop = !1, this.options.itemsDesktopSmall = !1, this.options.itemsTablet = !1, this.options.itemsTabletSmall = !1, this.options.itemsMobile = !1;
                if ((e = t(this.options.responsiveBaseWidth).width()) > (this.options.itemsDesktop[0] || this.orignalItems) && (this.options.items = this.orignalItems), !1 !== this.options.itemsCustom)
                    for (this.options.itemsCustom.sort(function (t, e) {
                            return t[0] - e[0]
                        }), i = 0; i < this.options.itemsCustom.length; i += 1) this.options.itemsCustom[i][0] <= e && (this.options.items = this.options.itemsCustom[i][1]);
                else e <= this.options.itemsDesktop[0] && !1 !== this.options.itemsDesktop && (this.options.items = this.options.itemsDesktop[1]), e <= this.options.itemsDesktopSmall[0] && !1 !== this.options.itemsDesktopSmall && (this.options.items = this.options.itemsDesktopSmall[1]), e <= this.options.itemsTablet[0] && !1 !== this.options.itemsTablet && (this.options.items = this.options.itemsTablet[1]), e <= this.options.itemsTabletSmall[0] && !1 !== this.options.itemsTabletSmall && (this.options.items = this.options.itemsTabletSmall[1]), e <= this.options.itemsMobile[0] && !1 !== this.options.itemsMobile && (this.options.items = this.options.itemsMobile[1]);
                this.options.items > this.itemsAmount && !0 === this.options.itemsScaleUp && (this.options.items = this.itemsAmount)
            },
            response: function () {
                var i, n, s = this;
                if (!0 !== s.options.responsive) return !1;
                n = t(e).width(), s.resizer = function () {
                    t(e).width() !== n && (!1 !== s.options.autoPlay && e.clearInterval(s.autoPlayInterval), e.clearTimeout(i), i = e.setTimeout(function () {
                        n = t(e).width(), s.updateVars()
                    }, s.options.responsiveRefreshRate))
                }, t(e).resize(s.resizer)
            },
            updatePosition: function () {
                this.jumpTo(this.currentItem), !1 !== this.options.autoPlay && this.checkAp()
            },
            appendItemsSizes: function () {
                var e = this,
                    i = 0,
                    n = e.itemsAmount - e.options.items;
                e.$owlItems.each(function (s) {
                    var o = t(this);
                    o.css({
                        width: e.itemWidth
                    }).data("owl-item", Number(s)), 0 != s % e.options.items && s !== n || s > n || (i += 1), o.data("owl-roundPages", i)
                })
            },
            appendWrapperSizes: function () {
                this.$owlWrapper.css({
                    width: this.$owlItems.length * this.itemWidth * 2,
                    left: 0
                }), this.appendItemsSizes()
            },
            calculateAll: function () {
                this.calculateWidth(), this.appendWrapperSizes(), this.loops(), this.max()
            },
            calculateWidth: function () {
                this.itemWidth = Math.round(this.$elem.width() / this.options.items)
            },
            max: function () {
                var t = -1 * (this.itemsAmount * this.itemWidth - this.options.items * this.itemWidth);
                return this.options.items > this.itemsAmount ? this.maximumPixels = t = this.maximumItem = 0 : (this.maximumItem = this.itemsAmount - this.options.items, this.maximumPixels = t), t
            },
            min: function () {
                return 0
            },
            loops: function () {
                var e, i, n = 0,
                    s = 0;
                for (this.positionsInArray = [0], this.pagesInArray = [], e = 0; e < this.itemsAmount; e += 1) s += this.itemWidth, this.positionsInArray.push(-s), !0 === this.options.scrollPerPage && ((i = (i = t(this.$owlItems[e])).data("owl-roundPages")) !== n && (this.pagesInArray[n] = this.positionsInArray[e], n = i))
            },
            buildControls: function () {
                !0 !== this.options.navigation && !0 !== this.options.pagination || (this.owlControls = t('<div class="owl-controls"/>').toggleClass("clickable", !this.browser.isTouch).appendTo(this.$elem)), !0 === this.options.pagination && this.buildPagination(), !0 === this.options.navigation && this.buildButtons()
            },
            buildButtons: function () {
                var e = this,
                    i = t('<div class="owl-buttons"/>');
                e.owlControls.append(i), e.buttonPrev = t("<div/>", {
                    class: "owl-prev",
                    html: e.options.navigationText[0] || ""
                }), e.buttonNext = t("<div/>", {
                    class: "owl-next",
                    html: e.options.navigationText[1] || ""
                }), i.append(e.buttonPrev).append(e.buttonNext), i.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function (t) {
                    t.preventDefault()
                }), i.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function (i) {
                    i.preventDefault(), t(this).hasClass("owl-next") ? e.next() : e.prev()
                })
            },
            buildPagination: function () {
                var e = this;
                e.paginationWrapper = t('<div class="owl-pagination"/>'), e.owlControls.append(e.paginationWrapper), e.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function (i) {
                    i.preventDefault(), Number(t(this).data("owl-page")) !== e.currentItem && e.goTo(Number(t(this).data("owl-page")), !0)
                })
            },
            updatePagination: function () {
                var e, i, n, s, o, r;
                if (!1 === this.options.pagination) return !1;
                for (this.paginationWrapper.html(""), e = 0, i = this.itemsAmount - this.itemsAmount % this.options.items, s = 0; s < this.itemsAmount; s += 1) 0 == s % this.options.items && (e += 1, i === s && (n = this.itemsAmount - this.options.items), o = t("<div/>", {
                    class: "owl-page"
                }), r = t("<span></span>", {
                    text: !0 === this.options.paginationNumbers ? e : "",
                    class: !0 === this.options.paginationNumbers ? "owl-numbers" : ""
                }), o.append(r), o.data("owl-page", i === s ? n : s), o.data("owl-roundPages", e), this.paginationWrapper.append(o));
                this.checkPagination()
            },
            checkPagination: function () {
                var e = this;
                if (!1 === e.options.pagination) return !1;
                e.paginationWrapper.find(".owl-page").each(function () {
                    t(this).data("owl-roundPages") === t(e.$owlItems[e.currentItem]).data("owl-roundPages") && (e.paginationWrapper.find(".owl-page").removeClass("active"), t(this).addClass("active"))
                })
            },
            checkNavigation: function () {
                if (!1 === this.options.navigation) return !1;
                !1 === this.options.rewindNav && (0 === this.currentItem && 0 === this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.addClass("disabled")) : 0 === this.currentItem && 0 !== this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.removeClass("disabled")) : this.currentItem === this.maximumItem ? (this.buttonPrev.removeClass("disabled"), this.buttonNext.addClass("disabled")) : 0 !== this.currentItem && this.currentItem !== this.maximumItem && (this.buttonPrev.removeClass("disabled"), this.buttonNext.removeClass("disabled")))
            },
            updateControls: function () {
                this.updatePagination(), this.checkNavigation(), this.owlControls && (this.options.items >= this.itemsAmount ? this.owlControls.hide() : this.owlControls.show())
            },
            destroyControls: function () {
                this.owlControls && this.owlControls.remove()
            },
            next: function (t) {
                if (this.isTransition) return !1;
                if (this.currentItem += !0 === this.options.scrollPerPage ? this.options.items : 1, this.currentItem > this.maximumItem + (!0 === this.options.scrollPerPage ? this.options.items - 1 : 0)) {
                    if (!0 !== this.options.rewindNav) return this.currentItem = this.maximumItem, !1;
                    this.currentItem = 0, t = "rewind"
                }
                this.goTo(this.currentItem, t)
            },
            prev: function (t) {
                if (this.isTransition) return !1;
                if (this.currentItem = !0 === this.options.scrollPerPage && 0 < this.currentItem && this.currentItem < this.options.items ? 0 : this.currentItem - (!0 === this.options.scrollPerPage ? this.options.items : 1), 0 > this.currentItem) {
                    if (!0 !== this.options.rewindNav) return this.currentItem = 0, !1;
                    this.currentItem = this.maximumItem, t = "rewind"
                }
                this.goTo(this.currentItem, t)
            },
            goTo: function (t, i, n) {
                var s = this;
                return !s.isTransition && ("function" == typeof s.options.beforeMove && s.options.beforeMove.apply(this, [s.$elem]), t >= s.maximumItem ? t = s.maximumItem : 0 >= t && (t = 0), s.currentItem = s.owl.currentItem = t, !1 !== s.options.transitionStyle && "drag" !== n && 1 === s.options.items && !0 === s.browser.support3d ? (s.swapSpeed(0), !0 === s.browser.support3d ? s.transition3d(s.positionsInArray[t]) : s.css2slide(s.positionsInArray[t], 1), s.afterGo(), s.singleItemTransition(), !1) : (t = s.positionsInArray[t], !0 === s.browser.support3d ? (s.isCss3Finish = !1, !0 === i ? (s.swapSpeed("paginationSpeed"), e.setTimeout(function () {
                    s.isCss3Finish = !0
                }, s.options.paginationSpeed)) : "rewind" === i ? (s.swapSpeed(s.options.rewindSpeed), e.setTimeout(function () {
                    s.isCss3Finish = !0
                }, s.options.rewindSpeed)) : (s.swapSpeed("slideSpeed"), e.setTimeout(function () {
                    s.isCss3Finish = !0
                }, s.options.slideSpeed)), s.transition3d(t)) : !0 === i ? s.css2slide(t, s.options.paginationSpeed) : "rewind" === i ? s.css2slide(t, s.options.rewindSpeed) : s.css2slide(t, s.options.slideSpeed), void s.afterGo()))
            },
            jumpTo: function (t) {
                "function" == typeof this.options.beforeMove && this.options.beforeMove.apply(this, [this.$elem]), t >= this.maximumItem || -1 === t ? t = this.maximumItem : 0 >= t && (t = 0), this.swapSpeed(0), !0 === this.browser.support3d ? this.transition3d(this.positionsInArray[t]) : this.css2slide(this.positionsInArray[t], 1), this.currentItem = this.owl.currentItem = t, this.afterGo()
            },
            afterGo: function () {
                this.prevArr.push(this.currentItem), this.prevItem = this.owl.prevItem = this.prevArr[this.prevArr.length - 2], this.prevArr.shift(0), this.prevItem !== this.currentItem && (this.checkPagination(), this.checkNavigation(), this.eachMoveUpdate(), !1 !== this.options.autoPlay && this.checkAp()), "function" == typeof this.options.afterMove && this.prevItem !== this.currentItem && this.options.afterMove.apply(this, [this.$elem])
            },
            stop: function () {
                this.apStatus = "stop", e.clearInterval(this.autoPlayInterval)
            },
            checkAp: function () {
                "stop" !== this.apStatus && this.play()
            },
            play: function () {
                var t = this;
                if (t.apStatus = "play", !1 === t.options.autoPlay) return !1;
                e.clearInterval(t.autoPlayInterval), t.autoPlayInterval = e.setInterval(function () {
                    t.next(!0)
                }, t.options.autoPlay)
            },
            swapSpeed: function (t) {
                "slideSpeed" === t ? this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)) : "paginationSpeed" === t ? this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)) : "string" != typeof t && this.$owlWrapper.css(this.addCssSpeed(t))
            },
            addCssSpeed: function (t) {
                return {
                    "-webkit-transition": "all " + t + "ms ease",
                    "-moz-transition": "all " + t + "ms ease",
                    "-o-transition": "all " + t + "ms ease",
                    transition: "all " + t + "ms ease"
                }
            },
            removeTransition: function () {
                return {
                    "-webkit-transition": "",
                    "-moz-transition": "",
                    "-o-transition": "",
                    transition: ""
                }
            },
            doTranslate: function (t) {
                return {
                    "-webkit-transform": "translate3d(" + t + "px, 0px, 0px)",
                    "-moz-transform": "translate3d(" + t + "px, 0px, 0px)",
                    "-o-transform": "translate3d(" + t + "px, 0px, 0px)",
                    "-ms-transform": "translate3d(" + t + "px, 0px, 0px)",
                    transform: "translate3d(" + t + "px, 0px,0px)"
                }
            },
            transition3d: function (t) {
                this.$owlWrapper.css(this.doTranslate(t))
            },
            css2move: function (t) {
                this.$owlWrapper.css({
                    left: t
                })
            },
            css2slide: function (t, e) {
                var i = this;
                i.isCssFinish = !1, i.$owlWrapper.stop(!0, !0).animate({
                    left: t
                }, {
                    duration: e || i.options.slideSpeed,
                    complete: function () {
                        i.isCssFinish = !0
                    }
                })
            },
            checkBrowser: function () {
                var t = i.createElement("div");
                t.style.cssText = "  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)", t = t.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g), this.browser = {
                    support3d: null !== t && 1 === t.length,
                    isTouch: "ontouchstart" in e || e.navigator.msMaxTouchPoints
                }
            },
            moveEvents: function () {
                !1 === this.options.mouseDrag && !1 === this.options.touchDrag || (this.gestures(), this.disabledEvents())
            },
            eventTypes: function () {
                var t = ["s", "e", "x"];
                this.ev_types = {}, !0 === this.options.mouseDrag && !0 === this.options.touchDrag ? t = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] : !1 === this.options.mouseDrag && !0 === this.options.touchDrag ? t = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : !0 === this.options.mouseDrag && !1 === this.options.touchDrag && (t = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]), this.ev_types.start = t[0], this.ev_types.move = t[1], this.ev_types.end = t[2]
            },
            disabledEvents: function () {
                this.$elem.on("dragstart.owl", function (t) {
                    t.preventDefault()
                }), this.$elem.on("mousedown.disableTextSelect", function (e) {
                    return t(e.target).is("input, textarea, select, option")
                })
            },
            gestures: function () {
                function n(t) {
                    if (void 0 !== t.touches) return {
                        x: t.touches[0].pageX,
                        y: t.touches[0].pageY
                    };
                    if (void 0 === t.touches) {
                        if (void 0 !== t.pageX) return {
                            x: t.pageX,
                            y: t.pageY
                        };
                        if (void 0 === t.pageX) return {
                            x: t.clientX,
                            y: t.clientY
                        }
                    }
                }

                function s(e) {
                    "on" === e ? (t(i).on(a.ev_types.move, o), t(i).on(a.ev_types.end, r)) : "off" === e && (t(i).off(a.ev_types.move), t(i).off(a.ev_types.end))
                }

                function o(s) {
                    s = s.originalEvent || s || e.event, a.newPosX = n(s).x - l.offsetX, a.newPosY = n(s).y - l.offsetY, a.newRelativeX = a.newPosX - l.relativePos, "function" == typeof a.options.startDragging && !0 !== l.dragging && 0 !== a.newRelativeX && (l.dragging = !0, a.options.startDragging.apply(a, [a.$elem])), (8 < a.newRelativeX || -8 > a.newRelativeX) && !0 === a.browser.isTouch && (void 0 !== s.preventDefault ? s.preventDefault() : s.returnValue = !1, l.sliding = !0), (10 < a.newPosY || -10 > a.newPosY) && !1 === l.sliding && t(i).off("touchmove.owl"), a.newPosX = Math.max(Math.min(a.newPosX, a.newRelativeX / 5), a.maximumPixels + a.newRelativeX / 5), !0 === a.browser.support3d ? a.transition3d(a.newPosX) : a.css2move(a.newPosX)
                }

                function r(i) {
                    var n;
                    (i = i.originalEvent || i || e.event).target = i.target || i.srcElement, l.dragging = !1, !0 !== a.browser.isTouch && a.$owlWrapper.removeClass("grabbing"), a.dragDirection = 0 > a.newRelativeX ? a.owl.dragDirection = "left" : a.owl.dragDirection = "right", 0 !== a.newRelativeX && (n = a.getNewPosition(), a.goTo(n, !1, "drag"), l.targetElement === i.target && !0 !== a.browser.isTouch && (t(i.target).on("click.disable", function (e) {
                        e.stopImmediatePropagation(), e.stopPropagation(), e.preventDefault(), t(e.target).off("click.disable")
                    }), n = (i = t._data(i.target, "events").click).pop(), i.splice(0, 0, n))), s("off")
                }
                var a = this,
                    l = {
                        offsetX: 0,
                        offsetY: 0,
                        baseElWidth: 0,
                        relativePos: 0,
                        position: null,
                        minSwipe: null,
                        maxSwipe: null,
                        sliding: null,
                        dargging: null,
                        targetElement: null
                    };
                a.isCssFinish = !0, a.$elem.on(a.ev_types.start, ".owl-wrapper", function (i) {
                    var o;
                    if (3 === (i = i.originalEvent || i || e.event).which) return !1;
                    if (!(a.itemsAmount <= a.options.items)) {
                        if (!1 === a.isCssFinish && !a.options.dragBeforeAnimFinish || !1 === a.isCss3Finish && !a.options.dragBeforeAnimFinish) return !1;
                        !1 !== a.options.autoPlay && e.clearInterval(a.autoPlayInterval), !0 === a.browser.isTouch || a.$owlWrapper.hasClass("grabbing") || a.$owlWrapper.addClass("grabbing"), a.newPosX = 0, a.newRelativeX = 0, t(this).css(a.removeTransition()), o = t(this).position(), l.relativePos = o.left, l.offsetX = n(i).x - o.left, l.offsetY = n(i).y - o.top, s("on"), l.sliding = !1, l.targetElement = i.target || i.srcElement
                    }
                })
            },
            getNewPosition: function () {
                var t = this.closestItem();
                return t > this.maximumItem ? t = this.currentItem = this.maximumItem : 0 <= this.newPosX && (this.currentItem = t = 0), t
            },
            closestItem: function () {
                var e = this,
                    i = !0 === e.options.scrollPerPage ? e.pagesInArray : e.positionsInArray,
                    n = e.newPosX,
                    s = null;
                return t.each(i, function (o, r) {
                    n - e.itemWidth / 20 > i[o + 1] && n - e.itemWidth / 20 < r && "left" === e.moveDirection() ? (s = r, e.currentItem = !0 === e.options.scrollPerPage ? t.inArray(s, e.positionsInArray) : o) : n + e.itemWidth / 20 < r && n + e.itemWidth / 20 > (i[o + 1] || i[o] - e.itemWidth) && "right" === e.moveDirection() && (!0 === e.options.scrollPerPage ? (s = i[o + 1] || i[i.length - 1], e.currentItem = t.inArray(s, e.positionsInArray)) : (s = i[o + 1], e.currentItem = o + 1))
                }), e.currentItem
            },
            moveDirection: function () {
                var t;
                return 0 > this.newRelativeX ? (t = "right", this.playDirection = "next") : (t = "left", this.playDirection = "prev"), t
            },
            customEvents: function () {
                var t = this;
                t.$elem.on("owl.next", function () {
                    t.next()
                }), t.$elem.on("owl.prev", function () {
                    t.prev()
                }), t.$elem.on("owl.play", function (e, i) {
                    t.options.autoPlay = i, t.play(), t.hoverStatus = "play"
                }), t.$elem.on("owl.stop", function () {
                    t.stop(), t.hoverStatus = "stop"
                }), t.$elem.on("owl.goTo", function (e, i) {
                    t.goTo(i)
                }), t.$elem.on("owl.jumpTo", function (e, i) {
                    t.jumpTo(i)
                })
            },
            stopOnHover: function () {
                var t = this;
                !0 === t.options.stopOnHover && !0 !== t.browser.isTouch && !1 !== t.options.autoPlay && (t.$elem.on("mouseover", function () {
                    t.stop()
                }), t.$elem.on("mouseout", function () {
                    "stop" !== t.hoverStatus && t.play()
                }))
            },
            lazyLoad: function () {
                var e, i, n, s;
                if (!1 === this.options.lazyLoad) return !1;
                for (e = 0; e < this.itemsAmount; e += 1) "loaded" !== (i = t(this.$owlItems[e])).data("owl-loaded") && (n = i.data("owl-item"), "string" != typeof (s = i.find(".lazyOwl")).data("src") ? i.data("owl-loaded", "loaded") : (void 0 === i.data("owl-loaded") && (s.hide(), i.addClass("loading").data("owl-loaded", "checked")), (!0 !== this.options.lazyFollow || n >= this.currentItem) && n < this.currentItem + this.options.items && s.length && this.lazyPreload(i, s)))
            },
            lazyPreload: function (t, i) {
                function n() {
                    t.data("owl-loaded", "loaded").removeClass("loading"), i.removeAttr("data-src"), "fade" === o.options.lazyEffect ? i.fadeIn(400) : i.show(), "function" == typeof o.options.afterLazyLoad && o.options.afterLazyLoad.apply(this, [o.$elem])
                }
                var s, o = this,
                    r = 0;
                "DIV" === i.prop("tagName") ? (i.css("background-image", "url(" + i.data("src") + ")"), s = !0) : i[0].src = i.data("src"),
                    function t() {
                        r += 1, o.completeImg(i.get(0)) || !0 === s ? n() : 100 >= r ? e.setTimeout(t, 100) : n()
                    }()
            },
            autoHeight: function () {
                function i() {
                    var i = t(s.$owlItems[s.currentItem]).height();
                    s.wrapperOuter.css("height", i + "px"), s.wrapperOuter.hasClass("autoHeight") || e.setTimeout(function () {
                        s.wrapperOuter.addClass("autoHeight")
                    }, 0)
                }
                var n, s = this,
                    o = t(s.$owlItems[s.currentItem]).find("img");
                void 0 !== o.get(0) ? (n = 0, function t() {
                    n += 1, s.completeImg(o.get(0)) ? i() : 100 >= n ? e.setTimeout(t, 100) : s.wrapperOuter.css("height", "")
                }()) : i()
            },
            completeImg: function (t) {
                return !(!t.complete || void 0 !== t.naturalWidth && 0 === t.naturalWidth)
            },
            onVisibleItems: function () {
                var e;
                for (!0 === this.options.addClassActive && this.$owlItems.removeClass("active"), this.visibleItems = [], e = this.currentItem; e < this.currentItem + this.options.items; e += 1) this.visibleItems.push(e), !0 === this.options.addClassActive && t(this.$owlItems[e]).addClass("active");
                this.owl.visibleItems = this.visibleItems
            },
            transitionTypes: function (t) {
                this.outClass = "owl-" + t + "-out", this.inClass = "owl-" + t + "-in"
            },
            singleItemTransition: function () {
                var t = this,
                    e = t.outClass,
                    i = t.inClass,
                    n = t.$owlItems.eq(t.currentItem),
                    s = t.$owlItems.eq(t.prevItem),
                    o = Math.abs(t.positionsInArray[t.currentItem]) + t.positionsInArray[t.prevItem],
                    r = Math.abs(t.positionsInArray[t.currentItem]) + t.itemWidth / 2;
                t.isTransition = !0, t.$owlWrapper.addClass("owl-origin").css({
                    "-webkit-transform-origin": r + "px",
                    "-moz-perspective-origin": r + "px",
                    "perspective-origin": r + "px"
                }), s.css({
                    position: "relative",
                    left: o + "px"
                }).addClass(e).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function () {
                    t.endPrev = !0, s.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend"), t.clearTransStyle(s, e)
                }), n.addClass(i).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function () {
                    t.endCurrent = !0, n.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend"), t.clearTransStyle(n, i)
                })
            },
            clearTransStyle: function (t, e) {
                t.css({
                    position: "",
                    left: ""
                }).removeClass(e), this.endPrev && this.endCurrent && (this.$owlWrapper.removeClass("owl-origin"), this.isTransition = this.endCurrent = this.endPrev = !1)
            },
            owlStatus: function () {
                this.owl = {
                    userOptions: this.userOptions,
                    baseElement: this.$elem,
                    userItems: this.$userItems,
                    owlItems: this.$owlItems,
                    currentItem: this.currentItem,
                    prevItem: this.prevItem,
                    visibleItems: this.visibleItems,
                    isTouch: this.browser.isTouch,
                    browser: this.browser,
                    dragDirection: this.dragDirection
                }
            },
            clearEvents: function () {
                this.$elem.off(".owl owl mousedown.disableTextSelect"), t(i).off(".owl owl"), t(e).off("resize", this.resizer)
            },
            unWrap: function () {
                0 !== this.$elem.children().length && (this.$owlWrapper.unwrap(), this.$userItems.unwrap().unwrap(), this.owlControls && this.owlControls.remove()), this.clearEvents(), this.$elem.attr("style", this.$elem.data("owl-originalStyles") || "").attr("class", this.$elem.data("owl-originalClasses"))
            },
            destroy: function () {
                this.stop(), e.clearInterval(this.checkVisible), this.unWrap(), this.$elem.removeData()
            },
            reinit: function (e) {
                e = t.extend({}, this.userOptions, e), this.unWrap(), this.init(e, this.$elem)
            },
            addItem: function (t, e) {
                var i;
                return !!t && (0 === this.$elem.children().length ? (this.$elem.append(t), this.setVars(), !1) : (this.unWrap(), (i = void 0 === e || -1 === e ? -1 : e) >= this.$userItems.length || -1 === i ? this.$userItems.eq(-1).after(t) : this.$userItems.eq(i).before(t), void this.setVars()))
            },
            removeItem: function (t) {
                if (0 === this.$elem.children().length) return !1;
                t = void 0 === t || -1 === t ? -1 : t, this.unWrap(), this.$userItems.eq(t).remove(), this.setVars()
            }
        };
        t.fn.owlCarousel = function (e) {
            return this.each(function () {
                if (!0 === t(this).data("owl-init")) return !1;
                t(this).data("owl-init", !0);
                var i = Object.create(n);
                i.init(e, this), t.data(this, "owlCarousel", i)
            })
        }, t.fn.owlCarousel.options = {
            items: 5,
            itemsCustom: !1,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 2],
            itemsTabletSmall: !1,
            itemsMobile: [479, 1],
            singleItem: !1,
            itemsScaleUp: !1,
            slideSpeed: 200,
            paginationSpeed: 800,
            rewindSpeed: 1e3,
            autoPlay: !1,
            stopOnHover: !1,
            navigation: !1,
            navigationText: ["prev", "next"],
            rewindNav: !0,
            scrollPerPage: !1,
            pagination: !0,
            paginationNumbers: !1,
            responsive: !0,
            responsiveRefreshRate: 200,
            responsiveBaseWidth: e,
            baseClass: "owl-carousel",
            theme: "owl-theme",
            lazyLoad: !1,
            lazyFollow: !0,
            lazyEffect: "fade",
            autoHeight: !1,
            jsonPath: !1,
            jsonSuccess: !1,
            dragBeforeAnimFinish: !0,
            mouseDrag: !0,
            touchDrag: !0,
            addClassActive: !1,
            transitionStyle: !1,
            beforeUpdate: !1,
            afterUpdate: !1,
            beforeInit: !1,
            afterInit: !1,
            beforeMove: !1,
            afterMove: !1,
            afterAction: !1,
            startDragging: !1,
            afterLazyLoad: !1
        }
    }(jQuery, window, document),
    function (t) {
        if ("object" == typeof exports && "undefined" != typeof module) module.exports = t();
        else if ("function" == typeof define && define.amd) define([], t);
        else {
            ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).Drift = t()
        }
    }(function () {
        return function t(e, i, n) {
            function s(r, a) {
                if (!i[r]) {
                    if (!e[r]) {
                        var l = "function" == typeof require && require;
                        if (!a && l) return l(r, !0);
                        if (o) return o(r, !0);
                        var c = new Error("Cannot find module '" + r + "'");
                        throw c.code = "MODULE_NOT_FOUND", c
                    }
                    var h = i[r] = {
                        exports: {}
                    };
                    e[r][0].call(h.exports, function (t) {
                        var i = e[r][1][t];
                        return s(i || t)
                    }, h, h.exports, t, e, i, n)
                }
                return i[r].exports
            }
            for (var o = "function" == typeof require && require, r = 0; r < n.length; r++) s(n[r]);
            return s
        }({
            1: [function (t, e, i) {
                "use strict";
                Object.defineProperty(i, "__esModule", {
                    value: !0
                });
                var n = function () {
                        function t(t, e) {
                            for (var i = 0; i < e.length; i++) {
                                var n = e[i];
                                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                            }
                        }
                        return function (e, i, n) {
                            return i && t(e.prototype, i), n && t(e, n), e
                        }
                    }(),
                    s = function (t) {
                        return t && t.__esModule ? t : {
                            default: t
                        }
                    }(t("./util/throwIfMissing")),
                    o = t("./util/dom"),
                    r = function () {
                        function t(e) {
                            (function (t, e) {
                                if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                            })(this, t), this.isShowing = !1;
                            var i = e.namespace,
                                n = void 0 === i ? null : i,
                                o = e.zoomFactor,
                                r = void 0 === o ? (0, s.default)() : o,
                                a = e.containerEl,
                                l = void 0 === a ? (0, s.default)() : a;
                            this.settings = {
                                namespace: n,
                                zoomFactor: r,
                                containerEl: l
                            }, this.openClasses = this._buildClasses("open"), this._buildElement()
                        }
                        return n(t, [{
                            key: "_buildClasses",
                            value: function (t) {
                                var e = ["drift-" + t],
                                    i = this.settings.namespace;
                                return i && e.push(i + "-" + t), e
                            }
                        }, {
                            key: "_buildElement",
                            value: function () {
                                this.el = document.createElement("div"), (0, o.addClasses)(this.el, this._buildClasses("bounding-box"))
                            }
                        }, {
                            key: "show",
                            value: function (t, e) {
                                this.isShowing = !0, this.settings.containerEl.appendChild(this.el);
                                var i = this.el.style;
                                i.width = Math.round(t / this.settings.zoomFactor) + "px", i.height = Math.round(e / this.settings.zoomFactor) + "px", (0, o.addClasses)(this.el, this.openClasses)
                            }
                        }, {
                            key: "hide",
                            value: function () {
                                this.isShowing && this.settings.containerEl.removeChild(this.el), this.isShowing = !1, (0, o.removeClasses)(this.el, this.openClasses)
                            }
                        }, {
                            key: "setPosition",
                            value: function (t, e, i) {
                                var n = window.pageXOffset,
                                    s = window.pageYOffset,
                                    o = i.left + t * i.width - this.el.clientWidth / 2 + n,
                                    r = i.top + e * i.height - this.el.clientHeight / 2 + s;
                                this.el.getBoundingClientRect(), o < i.left + n ? o = i.left + n : o + this.el.clientWidth > i.left + i.width + n && (o = i.left + i.width - this.el.clientWidth + n), r < i.top + s ? r = i.top + s : r + this.el.clientHeight > i.top + i.height + s && (r = i.top + i.height - this.el.clientHeight + s), this.el.style.left = o + "px", this.el.style.top = r + "px"
                            }
                        }]), t
                    }();
                i.default = r
            }, {
                "./util/dom": 6,
                "./util/throwIfMissing": 7
            }],
            2: [function (t, e, i) {
                "use strict";

                function n(t) {
                    return t && t.__esModule ? t : {
                        default: t
                    }
                }
                var s = function () {
                        function t(t, e) {
                            for (var i = 0; i < e.length; i++) {
                                var n = e[i];
                                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                            }
                        }
                        return function (e, i, n) {
                            return i && t(e.prototype, i), n && t(e, n), e
                        }
                    }(),
                    o = t("./util/dom"),
                    r = n(t("./injectBaseStylesheet")),
                    a = n(t("./Trigger")),
                    l = n(t("./ZoomPane"));
                e.exports = function () {
                    function t(e) {
                        var i = this,
                            n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        if (function (t, e) {
                                if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                            }(this, t), this.VERSION = "1.2.0", this.destroy = function () {
                                i.trigger._unbindEvents()
                            }, this.triggerEl = e, !(0, o.isDOMElement)(this.triggerEl)) throw new TypeError("`new Drift` requires a DOM element as its first argument.");
                        var s = n.namespace,
                            a = void 0 === s ? null : s,
                            l = n.showWhitespaceAtEdges,
                            c = void 0 !== l && l,
                            h = n.containInline,
                            u = void 0 !== h && h,
                            d = n.inlineOffsetX,
                            p = void 0 === d ? 0 : d,
                            f = n.inlineOffsetY,
                            m = void 0 === f ? 0 : f,
                            g = n.inlineContainer,
                            v = void 0 === g ? document.body : g,
                            y = n.sourceAttribute,
                            w = void 0 === y ? "data-zoom" : y,
                            b = n.zoomFactor,
                            $ = void 0 === b ? 3 : b,
                            C = n.paneContainer,
                            _ = void 0 === C ? document.body : C,
                            x = n.inlinePane,
                            E = void 0 === x ? 375 : x,
                            T = n.handleTouch,
                            A = void 0 === T || T,
                            S = n.onShow,
                            I = void 0 === S ? null : S,
                            D = n.onHide,
                            O = void 0 === D ? null : D,
                            k = n.injectBaseStyles,
                            P = void 0 === k || k,
                            L = n.hoverDelay,
                            z = void 0 === L ? 0 : L,
                            j = n.touchDelay,
                            N = void 0 === j ? 0 : j,
                            R = n.hoverBoundingBox,
                            M = void 0 !== R && R,
                            W = n.touchBoundingBox,
                            U = void 0 !== W && W;
                        if (!0 !== E && !(0, o.isDOMElement)(_)) throw new TypeError("`paneContainer` must be a DOM element when `inlinePane !== true`");
                        if (!(0, o.isDOMElement)(v)) throw new TypeError("`inlineContainer` must be a DOM element");
                        this.settings = {
                            namespace: a,
                            showWhitespaceAtEdges: c,
                            containInline: u,
                            inlineOffsetX: p,
                            inlineOffsetY: m,
                            inlineContainer: v,
                            sourceAttribute: w,
                            zoomFactor: $,
                            paneContainer: _,
                            inlinePane: E,
                            handleTouch: A,
                            onShow: I,
                            onHide: O,
                            injectBaseStyles: P,
                            hoverDelay: z,
                            touchDelay: N,
                            hoverBoundingBox: M,
                            touchBoundingBox: U
                        }, this.settings.injectBaseStyles && (0, r.default)(), this._buildZoomPane(), this._buildTrigger()
                    }
                    return s(t, [{
                        key: "_buildZoomPane",
                        value: function () {
                            this.zoomPane = new l.default({
                                container: this.settings.paneContainer,
                                zoomFactor: this.settings.zoomFactor,
                                showWhitespaceAtEdges: this.settings.showWhitespaceAtEdges,
                                containInline: this.settings.containInline,
                                inline: this.settings.inlinePane,
                                namespace: this.settings.namespace,
                                inlineOffsetX: this.settings.inlineOffsetX,
                                inlineOffsetY: this.settings.inlineOffsetY,
                                inlineContainer: this.settings.inlineContainer
                            })
                        }
                    }, {
                        key: "_buildTrigger",
                        value: function () {
                            this.trigger = new a.default({
                                el: this.triggerEl,
                                zoomPane: this.zoomPane,
                                handleTouch: this.settings.handleTouch,
                                onShow: this.settings.onShow,
                                onHide: this.settings.onHide,
                                sourceAttribute: this.settings.sourceAttribute,
                                hoverDelay: this.settings.hoverDelay,
                                touchDelay: this.settings.touchDelay,
                                hoverBoundingBox: this.settings.hoverBoundingBox,
                                touchBoundingBox: this.settings.touchBoundingBox,
                                namespace: this.settings.namespace,
                                zoomFactor: this.settings.zoomFactor
                            })
                        }
                    }, {
                        key: "setZoomImageURL",
                        value: function (t) {
                            this.zoomPane._setImageURL(t)
                        }
                    }, {
                        key: "disable",
                        value: function () {
                            this.trigger.enabled = !1
                        }
                    }, {
                        key: "enable",
                        value: function () {
                            this.trigger.enabled = !0
                        }
                    }, {
                        key: "isShowing",
                        get: function () {
                            return this.zoomPane.isShowing
                        }
                    }, {
                        key: "zoomFactor",
                        get: function () {
                            return this.settings.zoomFactor
                        },
                        set: function (t) {
                            this.settings.zoomFactor = t, this.zoomPane.settings.zoomFactor = t
                        }
                    }]), t
                }()
            }, {
                "./Trigger": 3,
                "./ZoomPane": 4,
                "./injectBaseStylesheet": 5,
                "./util/dom": 6
            }],
            3: [function (t, e, i) {
                "use strict";

                function n(t) {
                    return t && t.__esModule ? t : {
                        default: t
                    }
                }
                Object.defineProperty(i, "__esModule", {
                    value: !0
                });
                var s = function () {
                        function t(t, e) {
                            for (var i = 0; i < e.length; i++) {
                                var n = e[i];
                                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                            }
                        }
                        return function (e, i, n) {
                            return i && t(e.prototype, i), n && t(e, n), e
                        }
                    }(),
                    o = n(t("./util/throwIfMissing")),
                    r = n(t("./BoundingBox")),
                    a = function () {
                        function t() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            (function (t, e) {
                                if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                            })(this, t), l.call(this);
                            var i = e.el,
                                n = void 0 === i ? (0, o.default)() : i,
                                s = e.zoomPane,
                                a = void 0 === s ? (0, o.default)() : s,
                                c = e.sourceAttribute,
                                h = void 0 === c ? (0, o.default)() : c,
                                u = e.handleTouch,
                                d = void 0 === u ? (0, o.default)() : u,
                                p = e.onShow,
                                f = void 0 === p ? null : p,
                                m = e.onHide,
                                g = void 0 === m ? null : m,
                                v = e.hoverDelay,
                                y = void 0 === v ? 0 : v,
                                w = e.touchDelay,
                                b = void 0 === w ? 0 : w,
                                $ = e.hoverBoundingBox,
                                C = void 0 === $ ? (0, o.default)() : $,
                                _ = e.touchBoundingBox,
                                x = void 0 === _ ? (0, o.default)() : _,
                                E = e.namespace,
                                T = void 0 === E ? null : E,
                                A = e.zoomFactor,
                                S = void 0 === A ? (0, o.default)() : A;
                            this.settings = {
                                el: n,
                                zoomPane: a,
                                sourceAttribute: h,
                                handleTouch: d,
                                onShow: f,
                                onHide: g,
                                hoverDelay: y,
                                touchDelay: b,
                                hoverBoundingBox: C,
                                touchBoundingBox: x,
                                namespace: T,
                                zoomFactor: S
                            }, (this.settings.hoverBoundingBox || this.settings.touchBoundingBox) && (this.boundingBox = new r.default({
                                namespace: this.settings.namespace,
                                zoomFactor: this.settings.zoomFactor,
                                containerEl: this.settings.el.offsetParent
                            })), this.enabled = !0, this._bindEvents()
                        }
                        return s(t, [{
                            key: "_bindEvents",
                            value: function () {
                                this.settings.el.addEventListener("mouseenter", this._handleEntry, !1), this.settings.el.addEventListener("mouseleave", this._hide, !1), this.settings.el.addEventListener("mousemove", this._handleMovement, !1), this.settings.handleTouch && (this.settings.el.addEventListener("touchstart", this._handleEntry, !1), this.settings.el.addEventListener("touchend", this._hide, !1), this.settings.el.addEventListener("touchmove", this._handleMovement, !1))
                            }
                        }, {
                            key: "_unbindEvents",
                            value: function () {
                                this.settings.el.removeEventListener("mouseenter", this._handleEntry, !1), this.settings.el.removeEventListener("mouseleave", this._hide, !1), this.settings.el.removeEventListener("mousemove", this._handleMovement, !1), this.settings.handleTouch && (this.settings.el.removeEventListener("touchstart", this._handleEntry, !1), this.settings.el.removeEventListener("touchend", this._hide, !1), this.settings.el.removeEventListener("touchmove", this._handleMovement, !1))
                            }
                        }, {
                            key: "isShowing",
                            get: function () {
                                return this.settings.zoomPane.isShowing
                            }
                        }]), t
                    }(),
                    l = function () {
                        var t = this;
                        this._handleEntry = function (e) {
                            e.preventDefault(), t._lastMovement = e, "mouseenter" == e.type && t.settings.hoverDelay ? t.entryTimeout = setTimeout(t._show, t.settings.hoverDelay) : t.settings.touchDelay ? t.entryTimeout = setTimeout(t._show, t.settings.touchDelay) : t._show()
                        }, this._show = function () {
                            if (t.enabled) {
                                var e = t.settings.onShow;
                                if (e && "function" == typeof e && e(), t.settings.zoomPane.show(t.settings.el.getAttribute(t.settings.sourceAttribute), t.settings.el.clientWidth, t.settings.el.clientHeight), t._lastMovement) {
                                    var i = t._lastMovement.touches;
                                    (i && t.settings.touchBoundingBox || !i && t.settings.hoverBoundingBox) && t.boundingBox.show(t.settings.zoomPane.el.clientWidth, t.settings.zoomPane.el.clientHeight)
                                }
                                t._handleMovement()
                            }
                        }, this._hide = function (e) {
                            e.preventDefault(), t._lastMovement = null, t.entryTimeout && clearTimeout(t.entryTimeout), t.boundingBox && t.boundingBox.hide();
                            var i = t.settings.onHide;
                            i && "function" == typeof i && i(), t.settings.zoomPane.hide()
                        }, this._handleMovement = function (e) {
                            if (e) e.preventDefault(), t._lastMovement = e;
                            else {
                                if (!t._lastMovement) return;
                                e = t._lastMovement
                            }
                            var i = void 0,
                                n = void 0;
                            if (e.touches) {
                                var s = e.touches[0];
                                i = s.clientX, n = s.clientY
                            } else i = e.clientX, n = e.clientY;
                            var o = t.settings.el.getBoundingClientRect(),
                                r = i - o.left,
                                a = n - o.top,
                                l = r / t.settings.el.clientWidth,
                                c = a / t.settings.el.clientHeight;
                            t.boundingBox && t.boundingBox.setPosition(l, c, o), t.settings.zoomPane.setPosition(l, c, o)
                        }
                    };
                i.default = a
            }, {
                "./BoundingBox": 1,
                "./util/throwIfMissing": 7
            }],
            4: [function (t, e, i) {
                "use strict";
                Object.defineProperty(i, "__esModule", {
                    value: !0
                });
                var n = function () {
                        function t(t, e) {
                            for (var i = 0; i < e.length; i++) {
                                var n = e[i];
                                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                            }
                        }
                        return function (e, i, n) {
                            return i && t(e.prototype, i), n && t(e, n), e
                        }
                    }(),
                    s = function (t) {
                        return t && t.__esModule ? t : {
                            default: t
                        }
                    }(t("./util/throwIfMissing")),
                    o = t("./util/dom"),
                    r = document.createElement("div").style,
                    a = "undefined" != typeof document && ("animation" in r || "webkitAnimation" in r),
                    l = function () {
                        function t() {
                            var e = this,
                                i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            (function (t, e) {
                                if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                            })(this, t), this._completeShow = function () {
                                e.el.removeEventListener("animationend", e._completeShow, !1), e.el.removeEventListener("webkitAnimationEnd", e._completeShow, !1), (0, o.removeClasses)(e.el, e.openingClasses)
                            }, this._completeHide = function () {
                                e.el.removeEventListener("animationend", e._completeHide, !1), e.el.removeEventListener("webkitAnimationEnd", e._completeHide, !1), (0, o.removeClasses)(e.el, e.openClasses), (0, o.removeClasses)(e.el, e.closingClasses), (0, o.removeClasses)(e.el, e.inlineClasses), e.el.setAttribute("style", ""), e.el.parentElement === e.settings.container ? e.settings.container.removeChild(e.el) : e.el.parentElement === e.settings.inlineContainer && e.settings.inlineContainer.removeChild(e.el)
                            }, this._handleLoad = function () {
                                e.imgEl.removeEventListener("load", e._handleLoad, !1), (0, o.removeClasses)(e.el, e.loadingClasses)
                            }, this.isShowing = !1;
                            var n = i.container,
                                r = void 0 === n ? null : n,
                                a = i.zoomFactor,
                                l = void 0 === a ? (0, s.default)() : a,
                                c = i.inline,
                                h = void 0 === c ? (0, s.default)() : c,
                                u = i.namespace,
                                d = void 0 === u ? null : u,
                                p = i.showWhitespaceAtEdges,
                                f = void 0 === p ? (0, s.default)() : p,
                                m = i.containInline,
                                g = void 0 === m ? (0, s.default)() : m,
                                v = i.inlineOffsetX,
                                y = void 0 === v ? 0 : v,
                                w = i.inlineOffsetY,
                                b = void 0 === w ? 0 : w,
                                $ = i.inlineContainer,
                                C = void 0 === $ ? document.body : $;
                            this.settings = {
                                container: r,
                                zoomFactor: l,
                                inline: h,
                                namespace: d,
                                showWhitespaceAtEdges: f,
                                containInline: g,
                                inlineOffsetX: y,
                                inlineOffsetY: b,
                                inlineContainer: C
                            }, this.openClasses = this._buildClasses("open"), this.openingClasses = this._buildClasses("opening"), this.closingClasses = this._buildClasses("closing"), this.inlineClasses = this._buildClasses("inline"), this.loadingClasses = this._buildClasses("loading"), this._buildElement()
                        }
                        return n(t, [{
                            key: "_buildClasses",
                            value: function (t) {
                                var e = ["drift-" + t],
                                    i = this.settings.namespace;
                                return i && e.push(i + "-" + t), e
                            }
                        }, {
                            key: "_buildElement",
                            value: function () {
                                this.el = document.createElement("div"), (0, o.addClasses)(this.el, this._buildClasses("zoom-pane"));
                                var t = document.createElement("div");
                                (0, o.addClasses)(t, this._buildClasses("zoom-pane-loader")), this.el.appendChild(t), this.imgEl = document.createElement("img"), this.el.appendChild(this.imgEl)
                            }
                        }, {
                            key: "_setImageURL",
                            value: function (t) {
                                this.imgEl.setAttribute("src", t)
                            }
                        }, {
                            key: "_setImageSize",
                            value: function (t, e) {
                                this.imgEl.style.width = t * this.settings.zoomFactor + "px", this.imgEl.style.height = e * this.settings.zoomFactor + "px"
                            }
                        }, {
                            key: "setPosition",
                            value: function (t, e, i) {
                                var n = -(this.imgEl.clientWidth * t - this.el.clientWidth / 2),
                                    s = -(this.imgEl.clientHeight * e - this.el.clientHeight / 2),
                                    o = -(this.imgEl.clientWidth - this.el.clientWidth),
                                    r = -(this.imgEl.clientHeight - this.el.clientHeight);
                                if (this.el.parentElement === this.settings.inlineContainer) {
                                    var a = window.pageXOffset,
                                        l = window.pageYOffset,
                                        c = i.left + t * i.width - this.el.clientWidth / 2 + this.settings.inlineOffsetX + a,
                                        h = i.top + e * i.height - this.el.clientHeight / 2 + this.settings.inlineOffsetY + l;
                                    this.settings.containInline && (this.el.getBoundingClientRect(), c < i.left + a ? c = i.left + a : c + this.el.clientWidth > i.left + i.width + a && (c = i.left + i.width - this.el.clientWidth + a), h < i.top + l ? h = i.top + l : h + this.el.clientHeight > i.top + i.height + l && (h = i.top + i.height - this.el.clientHeight + l)), this.el.style.left = c + "px", this.el.style.top = h + "px"
                                }
                                this.settings.showWhitespaceAtEdges || (n > 0 ? n = 0 : n < o && (n = o), s > 0 ? s = 0 : s < r && (s = r)), this.imgEl.style.transform = "translate(" + n + "px, " + s + "px)", this.imgEl.style.webkitTransform = "translate(" + n + "px, " + s + "px)"
                            }
                        }, {
                            key: "_removeListenersAndResetClasses",
                            value: function () {
                                this.el.removeEventListener("animationend", this._completeShow, !1), this.el.removeEventListener("animationend", this._completeHide, !1), this.el.removeEventListener("webkitAnimationEnd", this._completeShow, !1), this.el.removeEventListener("webkitAnimationEnd", this._completeHide, !1), (0, o.removeClasses)(this.el, this.openClasses), (0, o.removeClasses)(this.el, this.closingClasses)
                            }
                        }, {
                            key: "show",
                            value: function (t, e, i) {
                                this._removeListenersAndResetClasses(), this.isShowing = !0, (0, o.addClasses)(this.el, this.openClasses), (0, o.addClasses)(this.el, this.loadingClasses), this.imgEl.addEventListener("load", this._handleLoad, !1), this._setImageURL(t), this._setImageSize(e, i), this._isInline ? this._showInline() : this._showInContainer(), a && (this.el.addEventListener("animationend", this._completeShow, !1), this.el.addEventListener("webkitAnimationEnd", this._completeShow, !1), (0, o.addClasses)(this.el, this.openingClasses))
                            }
                        }, {
                            key: "_showInline",
                            value: function () {
                                this.settings.inlineContainer.appendChild(this.el), (0, o.addClasses)(this.el, this.inlineClasses)
                            }
                        }, {
                            key: "_showInContainer",
                            value: function () {
                                this.settings.container.appendChild(this.el)
                            }
                        }, {
                            key: "hide",
                            value: function () {
                                this._removeListenersAndResetClasses(), this.isShowing = !1, a ? (this.el.addEventListener("animationend", this._completeHide, !1), this.el.addEventListener("webkitAnimationEnd", this._completeHide, !1), (0, o.addClasses)(this.el, this.closingClasses)) : ((0, o.removeClasses)(this.el, this.openClasses), (0, o.removeClasses)(this.el, this.inlineClasses))
                            }
                        }, {
                            key: "_isInline",
                            get: function () {
                                var t = this.settings.inline;
                                return !0 === t || "number" == typeof t && window.innerWidth <= t
                            }
                        }]), t
                    }();
                i.default = l
            }, {
                "./util/dom": 6,
                "./util/throwIfMissing": 7
            }],
            5: [function (t, e, i) {
                "use strict";
                Object.defineProperty(i, "__esModule", {
                    value: !0
                }), i.default = function () {
                    if (!document.querySelector(".drift-base-styles")) {
                        var t = document.createElement("style");
                        t.type = "text/css", t.classList.add("drift-base-styles"), t.appendChild(document.createTextNode(n));
                        var e = document.head;
                        e.insertBefore(t, e.firstChild)
                    }
                };
                var n = "\n@keyframes noop {\n  0% { zoom: 1; }\n}\n\n@-webkit-keyframes noop {\n  0% { zoom: 1; }\n}\n\n.drift-zoom-pane.drift-open {\n  display: block;\n}\n\n.drift-zoom-pane.drift-opening, .drift-zoom-pane.drift-closing {\n  animation: noop 1ms;\n  -webkit-animation: noop 1ms;\n}\n\n.drift-zoom-pane {\n  position: absolute;\n  overflow: hidden;\n  width: 100%;\n  height: 100%;\n  top: 0;\n  left: 0;\n  pointer-events: none;\n}\n\n.drift-zoom-pane-loader {\n  display: none;\n}\n\n.drift-zoom-pane img {\n  position: absolute;\n  display: block;\n  max-width: none;\n  max-height: none;\n}\n\n.drift-bounding-box {\n  position: absolute;\n  pointer-events: none;\n}\n"
            }, {}],
            6: [function (t, e, i) {
                "use strict";
                var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (t) {
                    return typeof t
                } : function (t) {
                    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
                };
                Object.defineProperty(i, "__esModule", {
                    value: !0
                });
                var s = "function" == typeof Symbol && "symbol" === n(Symbol.iterator) ? function (t) {
                    return void 0 === t ? "undefined" : n(t)
                } : function (t) {
                    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : void 0 === t ? "undefined" : n(t)
                };
                i.isDOMElement = function (t) {
                    return o ? t instanceof HTMLElement : t && "object" === (void 0 === t ? "undefined" : s(t)) && null !== t && 1 === t.nodeType && "string" == typeof t.nodeName
                }, i.addClasses = function (t, e) {
                    e.forEach(function (e) {
                        t.classList.add(e)
                    })
                }, i.removeClasses = function (t, e) {
                    e.forEach(function (e) {
                        t.classList.remove(e)
                    })
                };
                var o = "object" === ("undefined" == typeof HTMLElement ? "undefined" : s(HTMLElement))
            }, {}],
            7: [function (t, e, i) {
                "use strict";
                Object.defineProperty(i, "__esModule", {
                    value: !0
                }), i.default = function () {
                    throw new Error("Missing parameter")
                }
            }, {}]
        }, {}, [2])(2)
    });




    