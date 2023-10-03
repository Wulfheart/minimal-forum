<?php
/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:3.16.0|configurator
 * you can change this configuration by importing this file.
 */
$config = new PhpCsFixer\Config();
return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        '@PSR2' => true,
        // Each line of multi-line DocComments must have an asterisk [PSR-5] and must be aligned with the first one.
        'align_multiline_comment' => true,
        // Each element of an array must be indented exactly once.
        'array_indentation' => true,
        // PHP arrays should be declared using the configured syntax.
        'array_syntax' => true,
        // Use the null coalescing assignment operator `??=` where possible.
        'assign_null_coalescing_to_coalesce_equal' => true,
        // A single space or none should be between cast and variable.
        'cast_spaces' => true,
        // Whitespace around the keywords of a class, trait, enum or interfaces definition should be one space.
        'class_definition' => true,
        // Namespace must not contain spacing, comments or PHPDoc.
        'clean_namespace' => true,
        // Using `isset($var) &&` multiple times should be done in one call.
        'combine_consecutive_issets' => true,
        // Calling `unset` on multiple items should be done in one call.
        'combine_consecutive_unsets' => true,
        // Concatenation should be spaced according to configuration.
        'concat_space' => ['spacing'=>'one'],
        // There must not be spaces around `declare` statement parentheses.
        'declare_parentheses' => true,
        // Transforms imported FQCN parameters and return types in function arguments to short version.
        'fully_qualified_strict_types' => true,
        // Ensure single space between function's argument and its typehint.
        'function_typehint_space' => true,
        // Imports or fully qualifies global classes/functions/constants.
        'global_namespace_import' => true,
        // Heredoc/nowdoc content must be properly indented. Requires PHP >= 7.3.
        'heredoc_indentation' => true,
        // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
        'include' => true,
        // Magic constants should be referred to using the correct casing.
        'magic_constant_casing' => true,
        // Magic method definitions and calls must be using the correct casing.
        'magic_method_casing' => true,
        // DocBlocks must start with two asterisks, multiline comments must start with a single asterisk, after the opening slash. Both must end with a single asterisk before the closing slash.
        'multiline_comment_opening_closing' => true,
        // Function defined by PHP should be called using the correct casing.
        'native_function_casing' => true,
        // There should not be blank lines between docblock and the documented element.
        'no_blank_lines_after_phpdoc' => true,
        // Remove useless (semicolon) statements.
        'no_empty_statement' => true,
        // The namespace declaration line shouldn't contain leading whitespace.
        'no_leading_namespace_whitespace' => true,
        // Operator `=>` should not be surrounded by multi-line whitespaces.
        'no_multiline_whitespace_around_double_arrow' => true,
        // Short cast `bool` using double exclamation mark should not be used.
        'no_short_bool_cast' => true,
        // Single-line whitespace before closing semicolon are prohibited.
        'no_singleline_whitespace_before_semicolons' => true,
        // There MUST NOT be spaces around offset braces.
        'no_spaces_around_offset' => true,
        // Unused `use` statements must be removed.
        'no_unused_imports' => true,
        // In array declaration, there MUST NOT be a whitespace before each comma.
        'no_whitespace_before_comma_in_array' => true,
        // Array index should always be written by using square braces.
        'normalize_index_brace' => true,
        // There should not be space before or after object operators `->` and `?->`.
        'object_operator_without_whitespace' => true,
        // Operators - when multiline - must always be at the beginning or at the end of the line.
        'operator_linebreak' => true,
        // Ordering `use` statements.
        'ordered_imports' => ['sort_algorithm'=>'alpha'],
        // Calls to `PHPUnit\Framework\TestCase` static methods must all be of the same type, either `$this->`, `self::` or `static::`.
        'php_unit_test_case_static_method_calls' => ['call_type'=>'this'],
        // Annotations in PHPDoc should be ordered in defined sequence.
        'phpdoc_order' => true,
        // The correct case must be used for standard PHP types in PHPDoc.
        'phpdoc_types' => true,
        // Replace all `<>` with `!=`.
        'standardize_not_equals' => true,
        // Switch case must not be ended with `continue` but with `break`.
        'switch_continue_to_break' => true,
        // Multi-line arrays, arguments list, parameters list and `match` expressions must have a trailing comma.
        'trailing_comma_in_multiline' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        // ->exclude('folder-to-exclude') // if you want to exclude some folders, you can do it like this!
        ->in(__DIR__. '/app')
        ->in(__DIR__. '/config')
        ->in(__DIR__. '/resources')
        ->in(__DIR__. '/routes')
        ->in(__DIR__. '/tools')
    )
    ;
