<?php
/*
 * Create a column. And maybe remove some of the default ones
 * @param array $columns Array of all user table columns {column ID} => {column Name} 
 */
add_filter( 'manage_users_columns', 'rudr_modify_user_table' );
 
function rudr_modify_user_table( $columns ) {
 
  // unset( $columns['posts'] ); // maybe you would like to remove default columns
  $columns['registration_date'] = 'Registration date'; // add new
 
  return $columns;
 
}
 
/*
 * Fill our new column with the registration dates of the users
 * @param string $row_output text/HTML output of a table cell
 * @param string $column_id_attr column ID
 * @param int $user user ID (in fact - table row ID)
 */
add_filter( 'manage_users_custom_column', 'rudr_modify_user_table_row', 10, 3 );
 
function rudr_modify_user_table_row( $row_output, $column_id_attr, $user ) {
 
  $date_format = 'j M, Y H:i';
 
  switch ( $column_id_attr ) {
    case 'registration_date' :
      return date( $date_format, strtotime( get_the_author_meta( 'registered', $user ) ) );
      break;
    default:
  }
 
  return $row_output;
 
}
 
/*
 * Make our "Registration date" column sortable
 * @param array $columns Array of all user sortable columns {column ID} => {orderby GET-param} 
 */
add_filter( 'manage_users_sortable_columns', 'rudr_make_registered_column_sortable' );
 
function rudr_make_registered_column_sortable( $columns ) {
  return wp_parse_args( array( 'registration_date' => 'registered' ), $columns );
}
?>