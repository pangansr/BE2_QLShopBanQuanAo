<?php

namespace Laravel\Prompts\Concerns;

use Laravel\Prompts\Key;

trait TypedValue
{
    /**
     * The value that has been typed.
     */
    protected string $typedValue = '';

    /**
     * The position of the virtual cursor.
     */
    protected int $cursorPosition = 0;

    /**
     * Track the value as the user types.
     */
<<<<<<< HEAD
    protected function trackTypedValue(string $default = '', bool $submit = true, ?callable $ignore = null): void
=======
    protected function trackTypedValue(string $default = '', bool $submit = true, ?callable $ignore = null, bool $allowNewLine = false): void
>>>>>>> 6-view_delete
    {
        $this->typedValue = $default;

        if ($this->typedValue) {
            $this->cursorPosition = mb_strlen($this->typedValue);
        }

<<<<<<< HEAD
        $this->on('key', function ($key) use ($submit, $ignore) {
=======
        $this->on('key', function ($key) use ($submit, $ignore, $allowNewLine) {
>>>>>>> 6-view_delete
            if ($key[0] === "\e" || in_array($key, [Key::CTRL_B, Key::CTRL_F, Key::CTRL_A, Key::CTRL_E])) {
                if ($ignore !== null && $ignore($key)) {
                    return;
                }

                match ($key) {
                    Key::LEFT, Key::LEFT_ARROW, Key::CTRL_B => $this->cursorPosition = max(0, $this->cursorPosition - 1),
                    Key::RIGHT, Key::RIGHT_ARROW, Key::CTRL_F => $this->cursorPosition = min(mb_strlen($this->typedValue), $this->cursorPosition + 1),
                    Key::oneOf([Key::HOME, Key::CTRL_A], $key) => $this->cursorPosition = 0,
                    Key::oneOf([Key::END, Key::CTRL_E], $key) => $this->cursorPosition = mb_strlen($this->typedValue),
                    Key::DELETE => $this->typedValue = mb_substr($this->typedValue, 0, $this->cursorPosition).mb_substr($this->typedValue, $this->cursorPosition + 1),
                    default => null,
                };

                return;
            }

            // Keys may be buffered.
            foreach (mb_str_split($key) as $key) {
                if ($ignore !== null && $ignore($key)) {
                    return;
                }

<<<<<<< HEAD
                if ($key === Key::ENTER && $submit) {
                    $this->submit();

                    return;
=======
                if ($key === Key::ENTER) {
                    if ($submit) {
                        $this->submit();

                        return;
                    }

                    if ($allowNewLine) {
                        $this->typedValue = mb_substr($this->typedValue, 0, $this->cursorPosition).PHP_EOL.mb_substr($this->typedValue, $this->cursorPosition);
                        $this->cursorPosition++;
                    }
>>>>>>> 6-view_delete
                } elseif ($key === Key::BACKSPACE || $key === Key::CTRL_H) {
                    if ($this->cursorPosition === 0) {
                        return;
                    }

                    $this->typedValue = mb_substr($this->typedValue, 0, $this->cursorPosition - 1).mb_substr($this->typedValue, $this->cursorPosition);
                    $this->cursorPosition--;
                } elseif (ord($key) >= 32) {
                    $this->typedValue = mb_substr($this->typedValue, 0, $this->cursorPosition).$key.mb_substr($this->typedValue, $this->cursorPosition);
                    $this->cursorPosition++;
                }
            }
        });
    }

    /**
     * Get the value of the prompt.
     */
    public function value(): string
    {
        return $this->typedValue;
    }

    /**
     * Add a virtual cursor to the value and truncate if necessary.
     */
<<<<<<< HEAD
    protected function addCursor(string $value, int $cursorPosition, int $maxWidth): string
=======
    protected function addCursor(string $value, int $cursorPosition, ?int $maxWidth = null): string
>>>>>>> 6-view_delete
    {
        $before = mb_substr($value, 0, $cursorPosition);
        $current = mb_substr($value, $cursorPosition, 1);
        $after = mb_substr($value, $cursorPosition + 1);

<<<<<<< HEAD
        $cursor = mb_strlen($current) ? $current : ' ';

        $spaceBefore = $maxWidth - mb_strwidth($cursor) - (mb_strwidth($after) > 0 ? 1 : 0);
=======
        $cursor = mb_strlen($current) && $current !== PHP_EOL ? $current : ' ';

        $spaceBefore = $maxWidth < 0 || $maxWidth === null ? mb_strwidth($before) : $maxWidth - mb_strwidth($cursor) - (mb_strwidth($after) > 0 ? 1 : 0);
>>>>>>> 6-view_delete
        [$truncatedBefore, $wasTruncatedBefore] = mb_strwidth($before) > $spaceBefore
            ? [$this->trimWidthBackwards($before, 0, $spaceBefore - 1), true]
            : [$before, false];

<<<<<<< HEAD
        $spaceAfter = $maxWidth - ($wasTruncatedBefore ? 1 : 0) - mb_strwidth($truncatedBefore) - mb_strwidth($cursor);
=======
        $spaceAfter = $maxWidth < 0 || $maxWidth === null ? mb_strwidth($after) : $maxWidth - ($wasTruncatedBefore ? 1 : 0) - mb_strwidth($truncatedBefore) - mb_strwidth($cursor);
>>>>>>> 6-view_delete
        [$truncatedAfter, $wasTruncatedAfter] = mb_strwidth($after) > $spaceAfter
            ? [mb_strimwidth($after, 0, $spaceAfter - 1), true]
            : [$after, false];

        return ($wasTruncatedBefore ? $this->dim('…') : '')
            .$truncatedBefore
            .$this->inverse($cursor)
<<<<<<< HEAD
=======
            .($current === PHP_EOL ? PHP_EOL : '')
>>>>>>> 6-view_delete
            .$truncatedAfter
            .($wasTruncatedAfter ? $this->dim('…') : '');
    }

    /**
     * Get a truncated string with the specified width from the end.
     */
    private function trimWidthBackwards(string $string, int $start, int $width): string
    {
        $reversed = implode('', array_reverse(mb_str_split($string, 1)));

        $trimmed = mb_strimwidth($reversed, $start, $width);

        return implode('', array_reverse(mb_str_split($trimmed, 1)));
    }
}
