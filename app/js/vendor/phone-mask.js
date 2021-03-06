!(function (a) {
  typeof define === 'function' && define.amd ? define(['jquery'], a) : a(typeof exports === 'object' ? require('jquery') : jQuery);
}((a) => {
  let b; const c = navigator.userAgent;
  const d = /iphone/i.test(c);
  const e = /chrome/i.test(c);
  const f = /android/i.test(c);
  a.mask = {
    definitions: {
      9   : '[0-9]',
      a   : '[A-Za-z]',
      '*' : '[A-Za-z0-9]'
    },
    autoclear   : !0,
    dataName    : 'rawMaskFn',
    placeholder : '_'
  }, a.fn.extend({
    caret(a, b) {
      let c;
      if (this.length !== 0 && !this.is(':hidden')) {
        return typeof a === 'number' ? (b = typeof b === 'number' ? b : a, this.each(function () {
          this.setSelectionRange ? this.setSelectionRange(a, b) : this.createTextRange && (c = this.createTextRange(), c.collapse(!0), c.moveEnd('character', b), c.moveStart('character', a), c.select());
        })) : (this[0].setSelectionRange ? (a = this[0].selectionStart, b = this[0].selectionEnd) : document.selection && document.selection.createRange && (c = document.selection.createRange(), a = 0 - c.duplicate().moveStart('character', -1e5), b = a + c.text.length), {
          begin : a,
          end   : b
        });
      }
    },
    unmask() {
      return this.trigger('unmask');
    },
    mask(c, g) {
      let h; let i; let j; let k; let l; let m; let n; let
        o;
      if (!c && this.length > 0) {
        h = a(this[0]);
        const p = h.data(a.mask.dataName);
        return p ? p() : void 0;
      }
      return g = a.extend({
        autoclear   : a.mask.autoclear,
        placeholder : a.mask.placeholder,
        completed   : null
      }, g), i = a.mask.definitions, j = [], k = n = c.length, l = null, a.each(c.split(''), (a, b) => {
        b == '?' ? (n--, k = a) : i[b] ? (j.push(new RegExp(i[b])), l === null && (l = j.length - 1), k > a && (m = j.length - 1)) : j.push(null);
      }), this.trigger('unmask').each(function () {
        function h() {
          if (g.completed) {
            for (let a = l; m >= a; a++) { if (j[a] && C[a] === p(a)) return; }
            g.completed.call(B);
          }
        }

        function p(a) {
          return g.placeholder.charAt(a < g.placeholder.length ? a : 0);
        }

        function q(a) {
          for (; ++a < n && !j[a];);
          return a;
        }

        function r(a) {
          for (; --a >= 0 && !j[a];);
          return a;
        }

        function s(a, b) {
          let c; let
            d;
          if (!(a < 0)) {
            for (c = a, d = q(b); n > c; c++) {
              if (j[c]) {
                if (!(n > d && j[c].test(C[d]))) break;
                C[c] = C[d], C[d] = p(d), d = q(d);
              }
            }
            z(), B.caret(Math.max(l, a));
          }
        }

        function t(a) {
          let b; let c; let d; let
            e;
          for (b = a, c = p(a); n > b; b++) {
            if (j[b]) {
              if (d = q(b), e = C[b], C[b] = c, !(n > d && j[d].test(e))) break;
              c = e;
            }
          }
        }
        function u() {
          const a = B.val();
          const b = B.caret();
          if (a.length < o.length) {
            for (A(!0); b.begin > 0 && !j[b.begin - 1];) b.begin--;
            if (b.begin === 0) { for (; b.begin < l && !j[b.begin];) b.begin++; }
            B.caret(b.begin, b.begin);
          } else {
            for (A(!0); b.begin < n && !j[b.begin];) b.begin++;
            B.caret(b.begin, b.begin);
          }
          h();
        }

        function v() {
          A(), B.val() != E && B.change();
        }

        function w(a) {
          if (!B.prop('readonly')) {
            let b; let c; let e; const
              f = a.which || a.keyCode;
            o = B.val(), f === 8 || f === 46 || d && f === 127 ? (b = B.caret(), c = b.begin, e = b.end, e - c === 0 && (c = f !== 46 ? r(c) : e = q(c - 1), e = f === 46 ? q(e) : e), y(c, e), s(c, e - 1), a.preventDefault()) : f === 13 ? v.call(this, a) : f === 27 && (B.val(E), B.caret(0, A()), a.preventDefault());
          }
        }

        function x(b) {
          if (!B.prop('readonly')) {
            let c; let d; let e; const g = b.which || b.keyCode;
            const i = B.caret();
            if (!(b.ctrlKey || b.altKey || b.metaKey || g < 32) && g && g !== 13) {
              if (i.end - i.begin !== 0 && (y(i.begin, i.end), s(i.begin, i.end - 1)), c = q(i.begin - 1), n > c && (d = String.fromCharCode(g), j[c].test(d))) {
                if (t(c), C[c] = d, z(), e = q(c), f) {
                  const k = function () {
                    a.proxy(a.fn.caret, B, e)();
                  };
                  setTimeout(k, 0);
                } else B.caret(e);
                i.begin <= m && h();
              }
              b.preventDefault();
            }
          }
        }

        function y(a, b) {
          let c;
          for (c = a; b > c && n > c; c++) j[c] && (C[c] = p(c));
        }

        function z() {
          B.val(C.join(''));
        }
        function A(a) {
          let b; let c; let d; const e = B.val();
          let f = -1;
          for (b = 0, d = 0; n > b; b++) {
            if (j[b]) {
              for (C[b] = p(b); d++ < e.length;) {
                if (c = e.charAt(d - 1), j[b].test(c)) {
                  C[b] = c, f = b;
                  break;
                }
              }
              if (d > e.length) {
                y(b + 1, n);
                break;
              }
            } else C[b] === e.charAt(d) && d++, k > b && (f = b);
          }
          return a ? z() : k > f + 1 ? g.autoclear || C.join('') === D ? (B.val() && B.val(''), y(0, n)) : z() : (z(), B.val(B.val().substring(0, f + 1))), k ? b : l;
        }
        var B = a(this);
        var C = a.map(c.split(''), (a, b) => (a != '?' ? i[a] ? p(b) : a : void 0));
        var D = C.join('');
        var E = B.val();
        B.data(a.mask.dataName, () => a.map(C, (a, b) => (j[b] && a != p(b) ? a : null)).join('')), B.one('unmask', () => {
          B.off('.mask').removeData(a.mask.dataName);
        }).on('focus.mask', () => {
          if (!B.prop('readonly')) {
            clearTimeout(b);
            let a;
            E = B.val(), a = A(), b = setTimeout(() => {
              z(), a == c.replace('?', '').length ? B.caret(0, a) : B.caret(a);
            }, 10);
          }
        }).on('blur.mask', v).on('keydown.mask', w)
          .on('keypress.mask', x)
          .on('input.mask paste.mask', () => {
            B.prop('readonly') || setTimeout(() => {
              const a = A(!0);
              B.caret(a), h();
            }, 0);
          }), e && f && B.off('input.mask').on('input.mask', u), A();
      });
    }
  });
}));
